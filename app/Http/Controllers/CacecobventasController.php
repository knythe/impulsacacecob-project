<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCacecob_ventasRequest;
use App\Http\Requests\UpdateCacecob_ventasRequest;
use App\Models\cacecob_cliente;
use App\Models\cacecob_evento;
use App\Models\cacecob_pagos;
use App\Models\cacecob_venta;
use App\Models\comprobante;
use App\Models\empleado;
use App\Models\usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CacecobventasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cacecob_ventas = cacecob_venta::get();
        //PAGOS
        $ultimo_pagocacecob = cacecob_pagos::latest()->first();
        $pago_id = $ultimo_pagocacecob ? $ultimo_pagocacecob->id : null;

        // ULTIMO CLIENTE
        $ultimo_cliente = cacecob_cliente::latest()->first();
        $cliente_id = $ultimo_cliente ? $ultimo_cliente->id : null;

        //usuarios
        $usuarios = usuario::where('estado', 1)->get();
        //ciclos
        $cacecob_eventos = cacecob_evento::where('estado', 1)->get();
        //empleados
        $empleados = Empleado::where('estado', 1)
            ->whereHas('usuario', function ($query) {
                $query->where('role_id', 9);
            })
            ->with('usuario')
            ->get();


        return view(
            'asesor_cacecob.registro-venta-cacecob',
            compact(
                'cacecob_ventas',
                'pago_id',
                'empleados',
                'cacecob_eventos',
                'ultimo_pagocacecob',
                'ultimo_cliente',
                'cliente_id'

            )
        );
    }

    public function registrarventacacecobreincripcion()
    {
        //
        $cacecob_ventas = cacecob_venta::get();
        //PAGOS
        $ultimo_pagocacecob = cacecob_pagos::latest()->first();
        $pago_id = $ultimo_pagocacecob ? $ultimo_pagocacecob->id : null;

        //usuarios
        $usuarios = usuario::where('estado', 1)->get();
        //ciclos
        $cacecob_eventos = cacecob_evento::where('estado', 1)->get();
        //empleados
        $empleados = Empleado::where('estado', 1)
            ->whereHas('usuario', function ($query) {
                $query->where('role_id', 9);
            })
            ->with('usuario')
            ->get();


        return view(
            'asesor_cacecob.registro-venta-cacecob-reinscripcion',
            compact(
                'cacecob_ventas',
                'pago_id',
                'empleados',
                'cacecob_eventos',
                'ultimo_pagocacecob',
            )
        );
    }

    public function ventascacecobAsesor()
    {
        $ventascacecob = cacecob_venta::get();
        $empleados = empleado::get();
        return view('registros_cacecob.registros-ventas-cacecob-asesor', ['ventascacecob' => $ventascacecob], compact( 'empleados'));
    }

    public function ventascacecobAdministrador()
    {
        $ventascacecob = cacecob_venta::get();
        $empleados = empleado::get();
        return view('registros_cacecob.registros-ventas-cacecob', ['ventascacecob' => $ventascacecob], compact( 'empleados'));
    }

    public function reporteventascacecob()
    {
        $ventascacecob = cacecob_venta::get();
        $empleados = Empleado::where('estado', 1)
            ->whereHas('usuario', function ($query) {
                $query->where('role_id', 9);
            })
            ->with('usuario')
            ->get();
        $clientes = cacecob_cliente::get();
        $eventos= cacecob_evento::get();


        return view('administrador.reportes-ventas-cacecob', ['ventascacecob' => $ventascacecob], compact('clientes', 'empleados','eventos'));
    }


/**toque lo de cliente a aqui */



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
    public function store(storeCacecob_ventasRequest $request)
    {
        try {
            DB::beginTransaction();
            $venta = cacecob_venta::create($request->validated());
            DB::commit();
            return response()->json($venta, 200);
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(['success' => 'Error al registrar venta cacecob'], 200);
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
    public function update(UpdateCacecob_ventasRequest $request, cacecob_venta $cacecobventa)
    {
        {
            //

            try {
                DB::beginTransaction();
                $cacecobventa->update($request->validated());
                DB::commit();
                return response()->json(['success' => 'Venta editada', 'cacecobventa' => $cacecobventa], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json(['error' => 'No se pudo editar el cliente.'], 500);
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
