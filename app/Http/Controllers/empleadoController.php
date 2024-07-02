<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeEmpleadosRequest;
use App\Http\Requests\UpdateEmpleadosRequest;
use App\Models\area;
use App\Models\empleado;
use App\Models\Role;
use App\Models\usuario;
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
        $empleados = empleado::get();
        $areas = area::where('estado', 1)->get();
        $usuarios = usuario::where('estado', 1)->get();
        //$usuarios = Usuario::all();
        //$roles = Role::all();
        $roles = Role::where('estado', 0)->get();
        // return view('personal.personal',['empleados'=>$empleados]);
        return view('personal.personal', ['empleados' => $empleados], compact('usuarios', 'roles', 'areas'));
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
            $empleados = empleado::create($request->validated());
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
            return response()->json(['success' => 'Personal Editado', 'empleado' => $empleado], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'No se pudo editar el personal.'], 500);
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
            return response()->json(['success' => 'Personal Eliminado'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'No se pudo eliminar el personal.'], 500);
        }
    }
}
