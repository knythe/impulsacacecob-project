<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCacecob_clientesRequest;
use App\Http\Requests\UpdateCacecob_clientesRequest;
use App\Models\cacecob_cliente;
use App\Models\cacecob_evento;
use App\Models\cacecob_pagos;
use App\Models\cacecob_venta;
use App\Models\empleado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CacecobClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = cacecob_cliente::get();
        return view('asesor_cacecob.registro-cliente-cacecob', ['clientes' => $clientes]);
    }

    public function buscarCliente(Request $request)
    {
        $documento_identidad = $request->input('documento_identidad');

        // Validar el input
        if (!$documento_identidad) {
            return redirect()->back()->with('error', 'DNI es requerido');
        }

        // Buscar el estudiante por su DNI
        $cliente = cacecob_cliente::where('documento_identidad', $documento_identidad)->first();

        // Verificar si se encontró el estudiante
        if (!$cliente) {
            return redirect()->back()->with('error', 'Cliente no encontrado');
        }

        // Guardar la información del estudiante en la sesión
        session(['clientereinscribir' => $cliente]);

        // Pasar la información del estudiante a la vista
        return view('asesor_cacecob.buscar-cliente-cacecob-reinscripcion', compact('cliente'));
    }

    public function busquedaCliente(Request $request)
    {
        $dni = $request->input('documento_identidad');
        $cliente = cacecob_cliente::where('documento_identidad', $dni)->first();

        if ($cliente) {
            $cacecobVenta = cacecob_venta::where('clientecacecob_id', $cliente->id)->first();
            if ($cacecobVenta) {
                $evento = cacecob_evento::find($cacecobVenta->evento_id);
                $empleado = empleado::find($cacecobVenta->empleado_id);
                $pagos = cacecob_pagos::where('clientecacecob_id', $cliente->id)->get();

                session([
                    'cliente' => $cliente,
                    'detalle_pago' => $pagos,
                    'ciclo_contratado' => $evento->nombre_evento,
                    'evento' => $evento,
                    'asesor' => $empleado->usuario->user,
                    'cacecobventa' => $cacecobVenta,
                ]);

                if ($pagos->isEmpty()) {
                    session(['message' => 'No se encontraron pagos para el estudiante']);
                } else {
                    session()->forget('message');
                }

                return view('pagos_cacecob.informacion-pagos-cliente-cacecob', [
                   'cliente' => $cliente,
                    'detalle_pago' => $pagos,
                    'ciclo_contratado' => $evento->nombre_evento,
                    'evento' => $evento,
                    'asesor' => $empleado->usuario->user,
                    'cacecobventa' => $cacecobVenta,
                    'message' => session('message')
                ]);
            } else {
                session(['message' => 'No se encontraron ventas para el estudiante']);
                return view('pagos_impulsa.pagos-impulsa', ['message' => 'No se encontraron ventas para el estudiante']);
            }
        } else {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
    }

    public function controlpagoscacecob(Request $request)
    {
        $dni = $request->input('documento_identidad');
        $cliente = cacecob_cliente::where('documento_identidad', $dni)->first();

        if ($cliente) {
            $cacecobVenta = cacecob_venta::where('clientecacecob_id', $cliente->id)->first();
            if ($cacecobVenta) {
                $evento = cacecob_evento::find($cacecobVenta->evento_id);
                $empleado = empleado::find($cacecobVenta->empleado_id);
                $pagos = cacecob_pagos::where('clientecacecob_id', $cliente->id)->get();

                session([
                    'cliente' => $cliente,
                    'detalle_pago' => $pagos,
                    'ciclo_contratado' => $evento->nombre_evento,
                    'evento' => $evento,
                    'asesor' => $empleado->usuario->user,
                    'cacecobventa' => $cacecobVenta,
                ]);

                if ($pagos->isEmpty()) {
                    session(['message' => 'No se encontraron pagos para el estudiante']);
                } else {
                    session()->forget('message');
                }

                return view('administrador.historial-pagos-cacecob', [
                   'cliente' => $cliente,
                    'detalle_pago' => $pagos,
                    'ciclo_contratado' => $evento->nombre_evento,
                    'evento' => $evento,
                    'asesor' => $empleado->usuario->user,
                    'cacecobventa' => $cacecobVenta,
                    'message' => session('message')
                ]);
            } else {
                session(['message' => 'No se encontraron ventas para el estudiante']);
                return view('administrador.historial-pagos-cacecob', ['message' => 'No se encontraron ventas para el estudiante']);
            }
        } else {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
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
    public function store(storeCacecob_clientesRequest $request)

    {
        try {
            DB::beginTransaction();
            $clientes = cacecob_cliente::create($request->validated());
            DB::commit();
            return response()->json($clientes, 200);
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(['success' => 'Error al registrar cliente'], 200);
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
    public function update(UpdateCacecob_clientesRequest $request, cacecob_cliente $cliente)
    { {
            //

            try {
                DB::beginTransaction();
                $cliente->update($request->validated());
                DB::commit();
                return response()->json(['success' => 'Cliente Editado', 'cliente' => $cliente], 200);
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
