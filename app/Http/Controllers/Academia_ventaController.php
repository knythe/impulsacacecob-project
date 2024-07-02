<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeAcademia_ventasRequest;
use App\Models\Academia_ciclo;
use App\Models\Academia_venta;
use App\Models\Apoderado;
use App\Models\Comprobante;
use App\Models\Empleado;
use App\Models\Estudiante;
use App\Models\Role;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Academia_ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $academia_ventas = Academia_venta::get();
        //apoderados
        $ultimo_apoderado = Apoderado::latest()->first();
        $nombre_completo_apoderado = $ultimo_apoderado ? $ultimo_apoderado->nombres . ' ' . $ultimo_apoderado->apellidos : '';
        $apoderado_id = $ultimo_apoderado ? $ultimo_apoderado->id : null;
        //estudiantes
        $ultimo_estudiante = Estudiante::latest()->first();
        $nombre_completo_estudiante = $ultimo_estudiante ? $ultimo_estudiante->nombres . ' ' . $ultimo_estudiante->apellidos : '';
        $estudiante_id = $ultimo_estudiante ? $ultimo_estudiante->id : null;
        //comprobantes
        $ultimo_comprobante = Comprobante::latest()->first();
        $fecha_inscripcion = $ultimo_comprobante ? $ultimo_comprobante->fecha_pago : null;
        $codigo_operacion = $ultimo_comprobante ? $ultimo_comprobante->codigo_operacion : null;
        $monto_cancelado = $ultimo_comprobante ? $ultimo_comprobante->monto : null;
        $tipo_pago_texto = $ultimo_comprobante ? $ultimo_comprobante->tipo_pago_texto : null;
        $comprobante_id = $ultimo_comprobante ? $ultimo_comprobante->id : null;
        //usuarios
        $usuarios = Usuario::where('estado', 0)->get();
        //ciclos
        $ciclos = Academia_ciclo::where('estado', 0)->get();
        //empleados
        $empleados = Empleado::where('estado', 0)->with('usuario')->get();


        return view(
            'asesor_impulsa.ventas-impulsa',
            compact(
                'academia_ventas',
                'nombre_completo_apoderado',
                'apoderado_id',
                'nombre_completo_estudiante',
                'estudiante_id',
                'comprobante_id',
                'fecha_inscripcion',
                'codigo_operacion',
                'monto_cancelado',
                'tipo_pago_texto',
                'empleados',
                'ciclos'
            )
        );
    }

    public function asesorSales()
    {
        //
        $academia_ventas = Academia_venta::get();

        $ventas = Academia_venta::with(['estudiante', 'empleado.usuario', 'apoderado'])->get();

        $ventas_data = $ventas->map(function ($venta) {
            return [
                'nombre_estudiante' => $venta->estudiante->nombres . ' ' . $venta->estudiante->apellidos, // Concatenamos nombres y apellidos
                'dni_estudiante' => $venta->estudiante->dni,
                'telefono_estudiante' => $venta->estudiante->telefono,
                'asesor' => $venta->empleado->usuario->user,
                'sede' => $venta->estudiante->sede,
                'sede_texto' => $venta->estudiante->sede_texto,
                'nombre_apoderado' => $venta->apoderado->nombres . '' . $venta->apoderado->apellidos,
                'parentesco' => $venta->apoderado->parentescos_texto,
                'telefono_apoderado' => $venta->apoderado->telefono,
                'estado_venta' => $venta->estado,

            ];
        });

        return view(
            'registros.registros-ventas-impulsa-asesor',
            compact(
                'academia_ventas',
                'ventas_data'
            )
        );
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
    public function store(storeAcademia_ventasRequest $request)
    {
        //

        //dd($request->all());
        try {
            DB::beginTransaction();
            $academia_ventas = Academia_venta::create($request->validated());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('apoderados.index')->with('success', 'Venta Registrada');
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
