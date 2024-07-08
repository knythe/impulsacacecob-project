<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeAcademia_ventasRequest;
use App\Models\Academia_ciclo;
use App\Models\Academia_venta;
use App\Models\Apoderado;
use App\Models\Comprobante;
use App\Models\Empleado;
use App\Models\Estudiante;
use App\Models\pago;
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
        //PAGOS
        $ultimo_pago= pago::latest()->first();
        $pago_id = $ultimo_pago ? $ultimo_pago->id : null;

        //usuarios
        $usuarios = Usuario::where('estado', 1)->get();
        //ciclos
        $ciclos = Academia_ciclo::where('estado', 1)->get();
        //empleados
        $empleados = Empleado::where('estado', 1)->with('usuario')->get();


        return view(
            'asesor_impulsa.ventas-impulsa',
            compact(
                'academia_ventas',
                'pago_id',
                'empleados',
                'ciclos',
                'ultimo_pago'
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
