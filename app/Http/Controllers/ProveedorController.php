<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Proveedor();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedorList = $this->model->GetAll();

        return view('proveedor.list', [
            'proveedorList' => $proveedorList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion de los datos ingresados
        $rules = [
            'name' => 'required|string|max:80',
            'address' => 'required|string|max:200',
            'phone' => 'required|string|max:20'
        ];

        //Validacion de los datos ingresados
        $customMessages = [
            'name.max' => 'El nombre no debe de tener mas de 80 caracteres',
            'name.required' => 'Digite el nombre',
            'address.max' => 'La direccion no debe de tener mas de 200 caracteres',
            'address.required' => 'Digite la direccion',
            'phone.max' => 'El telefono no debe de tener mas de 20 caracteres',
            'phone.required' => 'Digite el telefono'
        ];

        $request->validate($rules, $customMessages);

        //Instancia del modelo e insercion de datos a la DB
        //Utilizando try y catch con sweetalert personalizados en caso de exito o error.
        $obj = new Proveedor([
            'name' => $request->post('name'),
            'address' => $request->post('address'),
            'phone' => $request->post('phone')
        ]);


        try{
            $this->model->create($obj);

            return redirect('/proveedor/list')->with('success', 'Proveedor registrado con exito');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Ocurrio un error al guardar el registro');
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
        $proveedor = $this->model->GetId($id);

        return view('proveedor.edit', [
            'proveedor' => $proveedor
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
            'address' => 'required|string|max:200',
            'phone' => 'required|string|max:20'
        ];

        //Validacion de los datos ingresados
        $customMessages = [
            'name.max' => 'El nombre no debe de tener mas de 80 caracteres',
            'name.required' => 'Digite el nombre',
            'address.max' => 'La direccion no debe de tener mas de 200 caracteres',
            'address.required' => 'Digite la direccion',
            'phone.max' => 'El telefono no debe de tener mas de 20 caracteres',
            'phone.required' => 'Digite el telefono'
        ];

        $request->validate($rules, $customMessages);
    
        try{
            //Obtener el id y luego intentar insertar los nuevos datos.
            $proveedor = $this->model->GetId($id);

            $proveedor->name = $request->post('name');
            $proveedor->address = $request->post('address');
            $proveedor->phone = $request->post('phone');

            $this->model->create($proveedor);

            return redirect('/proveedor/list')->with('success', 'Proveedor actualizado con exito');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Ocurrio un error al actualizar el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            //Obteniendo el id
            $proveedor = $this->model->GetId($id);

            $this->model->Eliminar($proveedor);
            
            return redirect('/proveedor/list')->with('success', 'Proveedor eliminada con éxito'); 
        }
        catch(\Exception $e){
            return redirect('/proveedor/list')->with('error', 'Ocurrió un error al eliminar el registro');
        }

    }
}
