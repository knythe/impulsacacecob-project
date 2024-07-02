<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeEventosRequest;
use App\Http\Requests\UpdateEventosRequest;
use App\Models\Cacecob_evento;
use App\Models\Cacecob_venta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cacecob_eventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Cacecob_evento::get();
        //
        return view('eventos.eventos-cacecob',['eventos'=>$eventos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('eventos.registrar-eventos-cacecob');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeEventosRequest $request)
    {
        try{
            DB::beginTransaction();
            $eventos= Cacecob_evento::create($request->validated());
            DB::commit();


        }catch(Exception $e){
            DB::rollBack();
        }
        return redirect()->route('eventos.index')->with('success','Evento Registrado');
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
    public function edit(Cacecob_evento $evento)
    {
        //
        return view('eventos.eventos-edit', ['evento' => $evento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventosRequest $request, Cacecob_evento $evento)
    {
        //
        try {
            DB::beginTransaction();
            $evento->update($request->validated());
            DB::commit();
            return response()->json(['success' => 'Rol Editado', 'evento' => $evento], 200);
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
        try {
            // Encuentra el registro por su ID
            $evento = Cacecob_evento::findOrFail($id);
    
            // Elimina el registro
            $evento->delete();
    
            // Redirecciona con un mensaje de éxito
            return response()->json(['success' => 'Evento Eliminado'], 200);
        } catch (Exception $e) {
            // Maneja cualquier excepción que pueda ocurrir
            return response()->json(['error' => 'No se pudo eliminar el evento.'], 500);
        }
    }
}
