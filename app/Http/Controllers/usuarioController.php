<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = Usuario::get();
        //
        return view('auth.usuarios',['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUsuariosRequest $request)
    {
        //
        try{
            DB::beginTransaction();
            $usuarios= Usuario::create($request->validated());
            DB::commit();


        }catch(Exception $e){
            DB::rollBack();
        }
        return redirect()->route('usuarios.index')->with('success','Usuario Registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
        return view('auth.usuarios', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuariosRequest $request, Usuario $usuario)
    {
        //
        try {
            DB::beginTransaction();
            $usuario->update($request->validated());
            DB::commit();
            return redirect()->route('usuarios.index')->with('success', 'Usuario Editado');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('usuarios.index')->with('error', 'Error al editar el usuario');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $usuario = Usuario::findOrFail($id);
            $usuario->delete();
            return redirect()->route('usuarios.index')->with('success', 'Usuario Eliminado');
        } catch (Exception $e) {
            return redirect()->route('usuarios.index')->with('error', 'Error al eliminar el rol');
        }

    }
}
