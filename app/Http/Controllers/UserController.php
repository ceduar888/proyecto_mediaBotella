<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userList = User::with('GetRole')->get();

        return view('usuario.list', [
            'userList' => $userList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new Role();

        $roleList = $model->GetAll();

        return view('usuario.create', [
            'roleList' => $roleList
        ]);

    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try{
            $model = new User();

            $usuario = $model->GetId($id);

            $model->Eliminar($usuario);
            return redirect('/usuario/list')->with('success', 'Usuario eliminado con éxito'); 
        }
        catch(\Exception $e){
            return redirect('/usuario/list')->with('error', 'Ocurrió un error al eliminar el registro');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

   
}
