<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCiclosrequest;
use App\Http\Requests\UpdateCiclosRequest;
use App\Models\Academia_ciclo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class academia_cicloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $ciclos = Academia_ciclo::get();
        // la variable ciclos se puede usar en la vista
        return view('ciclos.ciclos-impulsa',['ciclos'=>$ciclos]);
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
    public function store(storeCiclosrequest $request)
    {
        //validacion de datos (validacion en la clase form request)
        //dd($request);
        try{
            DB::beginTransaction();
            $ciclos = Academia_ciclo::create($request->validated());
            DB::commit();


        }catch(Exception $e){
            DB::rollBack();
        }
        return redirect()->route('ciclos.index')->with('success','Ciclo Registrado');
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
    //instancia al modelo categoria
    public function edit(Academia_ciclo $ciclo)
    {
        //enviar el registro// dd($ciclo);
       
         // Obtener todos los ciclos para mantener la lista en la vista
        return view('ciclos.edit-impulsa', ['ciclo' => $ciclo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCiclosRequest $request, Academia_ciclo $ciclo)
    {
        try {
            DB::beginTransaction();
            $ciclo->update($request->validated());
            DB::commit();
            return redirect()->route('ciclos.index')->with('success', 'Ciclo Editado');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('ciclos.index')->with('error', 'Error al editar el ciclo');
        }
    }
    //UPDATE
    /*
    
        $ciclo = $this->route('ciclo');
        $cicloid = ($ciclo);
        
        return [
            //reglas las mismas que al crear uidado con los valores unicos
            'nombre_ciclo' =>'required|max:80|unique:academia_ciclos,nombre_ciclo,'.$cicloid,
            'fecha_inicio'=>'required|date',
            'costo' => 'required|numeric|min:0',
            'estado' => 'nullable'
        ];*/
       
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Encuentra el registro por su ID
            $ciclo = Academia_ciclo::findOrFail($id);
    
            // Elimina el registro
            $ciclo->delete();
    
            // Redirecciona con un mensaje de éxito
            return redirect()->route('ciclos.index')->with('success', 'Ciclo Eliminado');
        } catch (Exception $e) {
            // Maneja cualquier excepción que pueda ocurrir
            return redirect()->route('ciclos.index')->with('error', 'Error al eliminar el ciclo');
        }
    }
}
