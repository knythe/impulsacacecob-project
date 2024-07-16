<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCacecob_pagosRequest;
use App\Models\cacecob_cliente;
use App\Models\cacecob_pagos;
use App\Models\comprobante;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CacecobpagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Datos del último cliente
        $ultimo_cliente = cacecob_cliente::latest()->first();
        $cliente_id = $ultimo_cliente ? $ultimo_cliente->id : null;

        // Datos del último comprobante
        $ultimo_comprobante = comprobante::latest()->first();
        $comprobante_id = $ultimo_comprobante ? $ultimo_comprobante->id : null;

        // Almacenar datos en la sesión
        session([
            'ultimo_cliente' => $ultimo_cliente,
            'cliente_id' => $cliente_id,
            'ultimo_comprobante' => $ultimo_comprobante,
            'comprobante_id' => $comprobante_id
        ]);

        return view('asesor_cacecob.registro-pago-cacecob', compact(
            'ultimo_cliente',
            'cliente_id',
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
    public function store(storeCacecob_pagosRequest $request)
    {
        try {
            DB::beginTransaction();
            $cacecobpagos = cacecob_pagos::create($request->validated());
            DB::commit();
            return response()->json($cacecobpagos, 200);
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(['success' => 'Error al registrar pago'], 200);
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
