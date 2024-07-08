<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeEstudiantesRequest;
use App\Http\Requests\UpdateEstudiantesRequest;
use App\Models\Academia_ciclo;
use App\Models\Academia_venta;
use App\Models\Apoderado;
use App\Models\Comprobante;
use App\Models\Empleado;
use App\Models\Estudiante;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $apoderado = Apoderado::get();
        $estudiantes = Estudiante::get();
        $ultimo_apoderado = Apoderado::latest()->first();

        $nombre_completo_apoderado = $ultimo_apoderado ? $ultimo_apoderado->nombres . ' ' . $ultimo_apoderado->apellidos : '';
        $apoderado_id = $ultimo_apoderado ? $ultimo_apoderado->id : null;
        return view('asesor_impulsa.registro-estudiante', compact('estudiantes', 'nombre_completo_apoderado', 'apoderado_id', 'apoderado', 'ultimo_apoderado'));
    }

    // Esta funcion me permitira buscar a los estudiantes por DNI
    public function buscarPorDNI(Request $request)
    {
        $dni = $request->input('dni');
        $estudiante = Estudiante::where('dni', $dni)->first();

        if ($estudiante) {
            $academiaVenta = Academia_venta::where('estudiante_id', $estudiante->id)->first();
            if ($academiaVenta) {
                $apoderado = Apoderado::find($academiaVenta->apoderado_id);
                $ciclo = Academia_ciclo::find($academiaVenta->ciclo_id);
                $comprobante = Comprobante::find($academiaVenta->comprobante_id);
                $empleado = Empleado::find($academiaVenta->empleado_id);


                return view('pagos_impulsa.pagos-impulsa', [
                    'datos_estudiante' => $estudiante,
                    'datos_apoderado' => $apoderado,
                    'contacto_apoderado' => $apoderado->telefono,
                    'ciclo_contratado' => $ciclo->nombre_ciclo,
                    'costo_ciclo' => $ciclo->costo,
                    'numero_operacion' => $comprobante->codigo_operacion,
                    'tipo_pago' => $comprobante->tipo_pago_texto,
                    'fecha_pago' => $comprobante->fecha_pago,
                    'asesor' => $empleado->usuario->user,
                    'monto' => $comprobante->monto,

                ]);
            } else {
                return view('buscar_estudiante', [
                    'message' => 'No se encontraron ventas para el estudiante'
                ]);
            }
        } else {
            return view('pagos_impulsa.pagos-impulsa', [
                'message' => 'Estudiante no encontrado'
            ]);
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
    public function store(storeEstudiantesRequest $request)
    {
        //

        //dd($request);
        try {
            DB::beginTransaction();
            $estudiantes = estudiante::create($request->validated());
            DB::commit();
            return response()->json($estudiantes, 200);
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
    public function update(UpdateEstudiantesRequest $request, Estudiante $estudiante)
    {
        //
 dd($request);
        {
            //
           
            try {
                DB::beginTransaction();
                $estudiante->update($request->validated());
                DB::commit();
                return response()->json(['success' => 'Comprobante Editado', 'role' => $estudiante], 200);
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
