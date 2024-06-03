<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    private $modelCompras;
    private $modelProveedor;
    private $modelProducto;

    public function __construct()
    {
        //Instancias de los modelos a utilizar
        $this->modelCompras = new Compras();
        $this->modelProveedor = new Proveedor();
        $this->modelProducto = new Producto();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $comprasList = Compras::with('GetProduct', 'GetSupplier')->get();

        return view('compra.list', [
            'comprasList' => $comprasList
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Obteniendo todos los datos de proveedor y producto para enviarlos al regitro de compras.
        $proveedores = $this->modelProveedor->GetAll();

        $productos = $this->modelProducto->GetAll();
        
        return view('compra.create', [
            'proveedores' => $proveedores, 
            'productos' => $productos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion de los datos a ingresar
        $rules = [
            'producto' => 'required',
            'proveedor' => 'required',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric'
        ];

        //Mesajes personalizados
        $customMessages = [
            'id_product.required' => 'Seleccione un producto',
            'id_supplier.required' => 'Seleccione un proveedor',
            'quantity.required' => 'Digite una cantidad',
            'quantity.integer' => 'La cantidad debe ser un número entero',
            'price.required' => 'Digite un precio',
            'price.numeric' => 'El precio debe ser un número',
        ];

        $request->validate($rules, $customMessages);

        //Instancia del modelo para insertar los datos
        $obj = new Compras([
            'id_product' => $request->post('producto'),
            'id_supplier' => $request->post('proveedor'),
            'quantity' => $request->post('cantidad'),
            'price'=> $request->post('precio')
        ]);

        try{
            $this->modelCompras->create($obj);
            return redirect('/compras/list')->with('success', 'Compra guardada con éxito');
        }
        catch(\Exception $e){
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
        $compras = $this->modelCompras->GetId($id);
        $productos = $this->modelProducto->GetAll();
        $proveedores = $this->modelProveedor->GetAll();

        return view('compra.edit',[
            'compras' => $compras,
            'productos' => $productos,
            'proveedores' => $proveedores,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //Validacion de los datos a ingresar
        $rules = [
            'producto' => 'required',
            'proveedor' => 'required',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric'
        ];

        //Mesajes personalizados
        $customMessages = [
            'id_product.required' => 'Seleccione un producto',
            'id_supplier.required' => 'Seleccione un proveedor',
            'quantity.required' => 'Digite una cantidad',
            'quantity.integer' => 'La cantidad debe ser un número entero',
            'price.required' => 'Digite un precio',
            'price.numeric' => 'El precio debe ser un número',
        ];

        $request->validate($rules, $customMessages);

        try{
            $compras = $this->modelCompras->GetId($id);

            $compras->id_product = $request->post('producto');
            $compras->id_supplier = $request->post('proveedor');
            $compras->quantity = $request->post('cantidad');
            $compras->price = $request->post('precio');

            $this->modelCompras->Editar($compras);

            return redirect('/compras/list')->with('success', 'Compra actualizada con éxito');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try{
            $compras = $this->modelCompras->GetId($id);

            $this->modelCompras->Eliminar($compras);

            return redirect('/compras/list')->with('success', 'Compra eliminada con éxito');
        }
        catch(\Exception $e){
            return redirect('/compras/lits')->with('error', 'Ocurrió un error al eliminar el registro');
        }
    }
}
