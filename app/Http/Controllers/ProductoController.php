<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class ProductoController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Producto();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productoList = Producto::with('GetCategory')->get();

        return view('producto.list', [
            'productoList' => $productoList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new Categoria();

        $categorias = $model->GetAll();

        return view('producto.create', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion de los datos ingresados
        $rules = [
            'name' => 'required|string|max:80',
            'code' => 'required|string|max:20',
            'description' => 'required|string|max:200',
            'category' => 'required',
        ];

        // Mensajes personalizados
        $customMessages = [
            'name.max' => 'El nombre no debe tener mas de 80 caracteres',
            'name.required' => 'Digite el nombre',
            'code.max' => 'El codigo no debe tener mas de 20 caracteres',
            'code.required' => 'Digite el codigo',
            'description' => 'La descripcion no debe tener mas de 200 caracteres',
            'description.required' => 'Digite la descripcion',
            'category.required' => 'Complete todos los campos',
        ];

        $request->validate($rules, $customMessages);

        //Onteniendo el nombre de la imagen para guardar la ruta en la BD 
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = $imagen->getClientOriginalName();

            //Guardando la imagen en public/img
            $imagen->move(public_path('img'), $nombreImagen);

        //Instancia del modelo e insercion de datos a la DB
        //Utilizando try y catch con sweetalert personalizados en caso de exito o error.
            $obj = new Producto([
                'name' => $request->post('name'),
                'code' => $request->post('code'),
                'description' => $request->post('description'),
                'id_category' => $request->post('category'),
                'img' => 'img/' . $nombreImagen, 
            ]);

            try {
                $this->model->create($obj);
                return redirect('/producto/list')->with('success', 'Producto guardado con éxito');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Ocurrió un error al guardar el registro');
            }
        } else {
            return redirect()->back()->with('error', 'Debe seleccionar una imagen');
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
    public function edit(string $id)
    {

        $model = new Categoria();

        $categorias = $model->GetAll();

        $producto = $this->model->GetId($id);

        return view('producto.edit', [
            'producto' => $producto,
            'categorias' => $categorias
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //Validacion de los datos ingresados
        $rules = [
            'name' => 'required|string|max:80',
            'code' => 'required|string|max:20',
            'description' => 'required|string|max:200',
            'category' => 'required'
        ];

        //Validacion de los datos ingresados
        $customMessages = [
            'name.max' => 'El nombre no debe tener mas de 80 caracteres',
            'name.required' => 'Digite el nombre',
            'code.max' => 'El codigo no debe tener mas de 20 caracteres',
            'code.required' => 'Digite el codigo',
            'description' => 'La descripcion no debe tener mas de 200 caracteres',
            'description.required' => 'Digite la descripcion',
            'category.required' => 'Complete todos los campos'
        ];

        $request->validate($rules, $customMessages);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = $imagen->getClientOriginalName();

            
            $imagen->move(public_path('img'), $nombreImagen);

            try {
                //Buscar id y actualizar datos
                $producto = $this->model->GetId($id);

                $producto->id_category = $request->post('category');
                $producto->name = $request->post('name');
                $producto->code = $request->post('code');
                $producto->description = $request->post('description');
                $producto->img = 'img/' .$nombreImagen;

                $this->model->Editar($producto);

                return redirect('/producto/list')->with('success', 'Producto actualizado con éxito');
            } 
            catch (\Exception $e) {
                return redirect()->back()->with('error', 'Ocurrió un error al actualizar el registro');
            }
        }
        else {
            return redirect()->back()->with('error', 'Debe seleccionar una imagen');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try{
            //Obteniendo el id
            $producto = $this->model->GetId($id);

            $this->model->Eliminar($producto);
            
            return redirect('/producto/list')->with('success', 'Producto eliminado con éxito'); 
        }
        catch(\Exception $e){
            return redirect('/producto/list')->with('error', 'Ocurrió un error al eliminar el registro');
        }
    }
}
