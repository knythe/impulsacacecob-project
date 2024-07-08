<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeApoderadosRequest;
use App\Http\Requests\UpdateApoderadosRequest;
use App\Models\apoderado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $apoderados = Apoderado::get();
        return view('asesor_impulsa.registro-apoderado', ['eventos'=>$apoderados]);
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
    public function store(storeApoderadosRequest $request)
    {
        //

        try {
            DB::beginTransaction();
            $apoderado = apoderado::create($request->validated());
            DB::commit();
            return response()->json($apoderado, 200);
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(['success' => 'Error al registrar apoderado'], 200);
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
    public function edit(apoderado $apoderado)
    {
        return view('asesor_impulsa.registro-estudiante', ['apoderado' => $apoderado]);
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApoderadosRequest $request, apoderado $apoderado)
    {
         try {
            DB::beginTransaction();
            $apoderado->update($request->validated());
            DB::commit();
            return response()->json(['success' => 'Rol Editado', 'role' => $apoderado], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'No se pudo editar el rol.'], 500);
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
    }
}
