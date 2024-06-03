<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //Variable para guardar la instancia del modelo
    private $model;

    public function __construct()
    {
        $this->model = new Categoria();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriaList = $this->model->GetAll();

        return view('categoria.list', [
            'categoriaList' => $categoriaList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion de los datos ingresados
        $rules = [
            'nombre-cat' => 'required|string|max:25',
        ];
        
        //Mensajes personalizados
        $customMessages = [
            'nombre-cat.max' => 'El nombre no debe contener mas de 25 caracteres',
            'nombre-cat.required' => 'Digite el nombre',
        ];
    
        $request->validate($rules, $customMessages);

        //Instancia del modelo e insercion de datos a la DB
        //Utilizando try y catch con sweetalert personalizados en caso de exito o error.
        $obj = new Categoria([
            'name' => $request->post('nombre-cat')
        ]);

        try {

            $this->model->create($obj);
            return redirect('/categoria/list')->with('success', 'Categoria guardada con éxito');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al guardar el registro');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //Obtenemos el id del registro que se quiere actualizar
        //Y se envia al formulario de actualizacion
        $categoria = $this->model->GetId($id);

        return view('categoria.edit', [
            'categoria' => $categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //Mensajes y excepciones
        $rules = [
            'nombre-cat' => 'required|string|max:25',
        ];
        
        $customMessages = [
            'nombre-cat.max' => 'El nombre no debe contener mas de 25 caracteres',
            'nombre-cat.required' => 'Digite el nombre',
        ];

        $request->validate($rules, $customMessages);

        try{
            //Actualizando datos
            $categoria = $this->model->GetId($id);

            $categoria->name = $request->post('nombre-cat');

            $this->model->Editar($categoria);
            return redirect('/categoria/list')->with('success', 'Categoria actualizada con éxito'); 
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            //Obteniendo el id
            $categoria = $this->model->GetId($id);

            $this->model->Eliminar($categoria);
            return redirect('/categoria/list')->with('success', 'Categoria eliminada con éxito'); 
        }
        catch(\Exception $e){
            return redirect('/categoria/list')->with('error', 'Ocurrió un error al eliminar el registro');
        }
    }
}
