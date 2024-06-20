<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeEmpleadosRequest;
use App\Http\Requests\UpdateEmpleadosRequest;
use App\Models\Empleado;
use App\Models\Role;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class empleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empleados = Empleado::get(); 
        $usuarios = Usuario::where('estado', 0)->get();
        //$usuarios = Usuario::all();
        //$roles = Role::all();
        $roles = Role::where('estado', 0)->get();
        // return view('personal.personal',['empleados'=>$empleados]);
        return view('personal.personal', compact('empleados', 'usuarios', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeEmpleadosRequest $request)
    {
        //
        try {
            DB::beginTransaction();
            $empleados = Empleado::create($request->validated());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('empleados.index')->with('success', 'Empleado Registrado');
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
    public function edit(Empleado $empleado)
    {
        //
        $usuarios = Usuario::where('estado', 0)->get();
        //$usuarios = Usuario::all();
        //$roles = Role::all();
        $roles = Role::where('estado', 0)->get();
        return view('personal.edit', compact('empleado', 'usuarios', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmpleadosRequest $request, Empleado $empleado)
    {

        //
        try {
            DB::beginTransaction();
            $empleado->update($request->validated());
            DB::commit();
            return redirect()->route('empleados.index')->with('success', 'Personal Editado');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('empleados.index')->with('error', 'Error al editar el evento');
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
            $empleado = Empleado::findOrFail($id);
            $empleado->delete();
            return redirect()->route('empleados.index')->with('success', 'Personal Eliminado');
        } catch (Exception $e) {
            return redirect()->route('empleados.index')->with('error', 'Error al eliminar el rol');
        }
    }
}
