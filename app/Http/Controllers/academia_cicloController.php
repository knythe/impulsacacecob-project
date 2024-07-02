<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCiclosrequest;
use App\Http\Requests\UpdateCiclosRequest;
use App\Models\academia_ciclo;
use App\Models\empleado;
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
       $ciclos = academia_ciclo::get();
       
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
        $empleados = empleado::where('estado', 1)->get(); 
        return view('ciclos.registrar-ciclos-impulsa',compact('empleados'));
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
            $ciclos = academia_ciclo::create($request->validated());
            DB::commit();


        }catch(Exception $e){
            DB::rollBack();
        }
        return redirect()->route('ciclos.index');
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
    public function edit(academia_ciclo $ciclo)
    {
        //enviar el registro// dd($ciclo);
        /*En esta sentencia hago el llamado al modelo empleado, el cual me esta devolviendo solo los registros
        que se encuentran en estado 1 osea en estado activo*/
        $empleados = empleado::where('estado', 1)->get(); 
         // Obtener todos los ciclos para mantener la lista en la vista
        return view('ciclos.edit-impulsa', ['ciclo' => $ciclo],compact('empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCiclosRequest $request, academia_ciclo $ciclo)
    {
        try {
            DB::beginTransaction();
            $ciclo->update($request->validated());
            DB::commit();
            return response()->json(['success' => 'Rol Editado', 'role' => $ciclo], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'No se pudo editar el rol.'], 500);
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
            $ciclo = academia_ciclo::findOrFail($id);
    
            // Elimina el registro
            $ciclo->delete();
    
            // Redirecciona con un mensaje de éxito
            return response()->json(['success' => 'Rol Eliminado'], 200);
        } catch (Exception $e) {
            // Maneja cualquier excepción que pueda ocurrir
            return response()->json(['error' => 'No se pudo eliminar el rol.'], 500);
        }
    }
}
