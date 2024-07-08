<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePagosrequest;
use App\Models\comprobante;
use App\Models\estudiante;
use App\Models\pago;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //datos del ultimo apoderado y estudiante
        $ultimo_estudiante = estudiante::latest()->first();
        $estudiante_id = $ultimo_estudiante ? $ultimo_estudiante->id : null;
        //datos del ultimo comprobante
        $ultimo_comprobante = comprobante::latest()->first();
        $comprobante_id = $ultimo_comprobante ? $ultimo_comprobante->id : null;


        return view ('asesor_impulsa.registro-pago-impulsa',compact(
            'ultimo_estudiante',
            'estudiante_id',
            'ultimo_comprobante',
            'comprobante_id'

        ));
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
    public function store(storePagosrequest $request)
    {
        //
        //dd($request);
        try {
            DB::beginTransaction();
            $pagos = pago::create($request->validated());
            DB::commit();
            return response()->json($pagos, 200);
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
    public function update(Request $request, $id)
    {
        //
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
