<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeComprobantesRequest;
use App\Http\Requests\UpdateComprobantesRequest;
use App\Models\Academia_ciclo;
use App\Models\Comprobante;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ciclos = Academia_ciclo::where('estado', 0)->get();
        $usuarios = Usuario::where('estado', 0)->get();
        $comprobantes = Comprobante::get();
        return view('asesor_impulsa.registro_comprobantes', compact('comprobantes', 'ciclos', 'usuarios'));
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
    public function store(storeComprobantesRequest $request)
    {
        //
        try {
            DB::beginTransaction();
            $comprobantes = Comprobante::create($request->validated());
            DB::commit();
            return response()->json($comprobantes, 200);
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(['success' => 'Error al registrar comprobante'], 200);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComprobantesRequest $request, Comprobante $comprobante)
    { {
            //
            try {
                DB::beginTransaction();
                $comprobante->update($request->validated());
                DB::commit();
                return response()->json(['success' => 'Comprobante Editado', 'role' => $comprobante], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json(['error' => 'No se pudo editar el rol.'], 500);
            }
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
