<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCacecob_clientesRequest;
use App\Http\Requests\UpdateCacecob_clientesRequest;
use App\Models\cacecob_cliente;
use App\Models\cacecob_evento;
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
        return view('asesor_cacecob.registro-cliente-cacecob', ['clientes'=>$clientes]);
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
    {
        
        {
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
