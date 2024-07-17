<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeAcademia_ventasRequest;
use App\Http\Requests\UpdateAcademia_ventasRequest;
use App\Models\Academia_ciclo;
use App\Models\Academia_venta;
use App\Models\Apoderado;
use App\Models\area;
use App\Models\Comprobante;
use App\Models\Empleado;
use App\Models\Estudiante;
use App\Models\pago;
use App\Models\Role;
use App\Models\Usuario;
use DateTime;
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
        //PAGOS
        $ultimo_pago = pago::latest()->first();
        $pago_id = $ultimo_pago ? $ultimo_pago->id : null;


        //usuarios
        $usuarios = Usuario::where('estado', 1)->get();
        //ciclos
        $ciclos = Academia_ciclo::where('estado', 1)->get();
        //empleados
        $empleados = Empleado::where('estado', 1)
        ->whereHas('usuario', function ($query) {
            $query->where('role_id', 7);
        })
        ->with('usuario')
        ->get();


        return view(
            'asesor_impulsa.ventas-impulsa',
            compact(
                'academia_ventas',
                'pago_id',
                'empleados',
                'ciclos',
                'ultimo_pago',

            )
        );
    }

    public function registrarventareincripcion()
    {
        //
        $academia_ventas = Academia_venta::get();
        //PAGOS
        $ultimo_pago = pago::latest()->first();
        $pago_id = $ultimo_pago ? $ultimo_pago->id : null;


        //usuarios
        $usuarios = Usuario::where('estado', 1)->get();
        //ciclos
        $ciclos = Academia_ciclo::where('estado', 1)->get();
        //empleados
        $empleados = Empleado::where('estado', 1)->with('usuario')->get();


        return view(
            'asesor_impulsa.registro-ventas-impulsa-reinscripcion',
            compact(
                'academia_ventas',
                'pago_id',
                'empleados',
                'ciclos',
                'ultimo_pago',

            )
        );
    }





    public function ventasAsesor()
    {
        $ventasimpulsa = Academia_venta::get();
        $empleados = empleado::get();
        $estudiantes = Estudiante::get();


        return view('registros.registros-ventas-impulsa-asesor', ['ventasimpulsa' => $ventasimpulsa], compact('estudiantes', 'empleados'));
    }

    public function ventasAsesorAdministrador()
    {
        $ventasimpulsa = Academia_venta::get();
        $empleados = empleado::get();
        $estudiantes = Estudiante::get();


        return view('registros.registros-impulsa', ['ventasimpulsa' => $ventasimpulsa], compact('estudiantes', 'empleados'));
    }

    public function reporteventasimpulsa()
    {
        $ventasimpulsa = Academia_venta::get();
        $empleados = Empleado::where('estado', 1)
            ->whereHas('usuario', function ($query) {
                $query->where('role_id', 7);
            })
            ->with('usuario')
            ->get();
        $estudiantes = Estudiante::get();
        $ciclos = Academia_ciclo::get();


        return view('administrador.reportes-ventas-impulsa', ['ventasimpulsa' => $ventasimpulsa], compact('estudiantes', 'empleados','ciclos'));
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
    public function update(UpdateAcademia_ventasRequest $request, Academia_venta $academia_venta)
    {

        try {
            DB::beginTransaction();
            $academia_venta->update($request->validated());
            DB::commit();
            return response()->json(['success' => 'Venta actualizada correctamente', 'academia_venta' => $academia_venta], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'No se pudo actualizar la venta. Por favor, inténtelo de nuevo.'], 500);
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

    public function dashboard()
    {
        // Consulta para obtener las ventas por mes
        $ventasPorMes = DB::table('academia_ventas')
            ->select(DB::raw('MONTH(fecha_registro) as mes'), DB::raw('COUNT(estudiante_id) as total_ventas'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Consulta para obtener las ventas por estado para el mes actual
        $mesActual = date('m');
        $ventasPorEstado = DB::table('academia_ventas')
            ->select('estado', DB::raw('COUNT(*) as total'))
            ->whereMonth('fecha_registro', $mesActual)
            ->groupBy('estado')
            ->get();

        // Mapeo de estados
        $estadosMap = [
            1 => 'DEUDORES',
            2 => 'PAGADOS',
            3 => 'RETIRADOS',
            4 => 'RESERVADOS'
        ];

        // Transformar datos para el gráfico de línea (ventas por mes)
        $ventasPorMes->transform(function ($venta) {
            $venta->mes = DateTime::createFromFormat('!m', $venta->mes)->format('F');
            return $venta;
        });

        // Transformar datos para el gráfico de pastel (ventas por estado)
        $ventasPorEstado->transform(function ($venta) use ($estadosMap) {
            $venta->estado = $estadosMap[$venta->estado];
            return $venta;
        });
        $nombreMesActual = DateTime::createFromFormat('!m', $mesActual)->format('F');


        return view('panel.index', compact('ventasPorMes', 'ventasPorEstado', 'mesActual','nombreMesActual'));
    }
}
