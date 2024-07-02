<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;
use App\Models\role;
use App\Models\usuario;
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
        $usuarios = usuario::get();
        $roles = role::where('estado', 1)->get();
        //
        return view('auth.usuarios',['usuarios'=>$usuarios],compact('roles'));
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
            $usuarios= usuario::create($request->validated());
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
            return response()->json(['success' => 'Usuario Editado', 'usuario' => $usuario], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'No se pudo editar el usuario.'], 500);
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
            return response()->json(['success' => 'Usuario Eliminado'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'No se pudo eliminar el usuario.'], 500);
        }

    }
}
