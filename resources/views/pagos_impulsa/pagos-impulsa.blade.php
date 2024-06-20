<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registros de pagos - Academia Impulsa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{asset ('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset ('css/template.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <x-navigation-menu-asesor-impulsa></x-navigation-menu-asesor-impulsa>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <x-navigation-header></x-navigation-header>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Registros de ventas - Academia Impulsa</h1>
                    <hr>
                    <!-- Busqueda de estudiante por documento de identidad -->
                    <div class="form-section">
                        <h6 class="m-0 font-weight-bold text-primary">BUSCAR ESTUDIANTE</h6>
                        <hr>
                        <div class="container">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Imputs -->
                                        <form action="{{ route('buscarPorDNI') }}" method="POST" class="w-100">
                                            <div class="col-sm-12">
                                                @csrf
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="form-group col-sm-4 mb-3 mb-sm-0">
                                                        <label for="dni">Documento de identidad del estudiante:</label>
                                                    </div>
                                                    <div class="form-group col-sm-8">
                                                        <input type="text" class="form-control text-center" id="dni" name="dni" placeholder="Ingrese documento de identidad">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group col-sm-12">
                                                        <label for="datos_estudiante">Datos del estudiante:</label>
                                                        <input type="text" class="form-control text-center" id="datos_estudiante" name="datos_estudiante" value="{{ $datos_estudiante->nombres ?? '' }} {{ $datos_estudiante->apellidos ?? '' }}" placeholder="" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label for="datos_apoderado">Datos del apoderado:</label>
                                                        <input type="text" class="form-control text-center" id="datos_apoderado" name="datos_apoderado" value="{{ $datos_apoderado->nombres ?? '' }} {{ $datos_apoderado->apellidos ?? '' }}" placeholder="" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="contacto_apoderado">Contacto del apoderado:</label>
                                                        <input type="text" class="form-control text-center" id="contacto_apoderado" name="contacto_apoderado" value="{{ $contacto_apoderado ?? '' }}" placeholder="" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="ciclo_contratado">Ciclo contratado:</label>
                                                        <input type="text" class="form-control text-center" id="ciclo_contratado" name="ciclo_contratado" value="{{ $ciclo_contratado ?? '' }}" placeholder="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="form-group col-sm-6">
                                                    <button type="submit" class="btn btn-primary-impulsa btn-ciclos btn-block">Buscar</button>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <button type="submit" class="btn btn-primary-pagos btn-ciclos btn-block">Registrar Pago</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        @if (isset($message))
                        <div class="alert alert-info">{{ $message }}</div>
                        @endif
                    </div>
                    <hr>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Control de pagos - Academia Impulsa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ASESOR</th>
                                            <th>ESTUDIANTE</th>
                                            <th>FECHA DE PAGO</th>
                                            <th>MONTO</th>
                                            <th>CODIGO DE OPERACION</th>
                                            <th>TIPO DE PAGO</th>
                                            <th>MONTO ABONADO</th>
                                            <th>MONTO RESTANTE</th>
                                            <th>OBSERVACION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$asesor}}</td>
                                            <td>{{$datos_estudiante->nombres ?? '' }} {{ $datos_estudiante->apellidos ?? '' }}</td>
                                            <td>{{$fecha_pago}}</td>
                                            <td>{{$monto}}</td>
                                            <td>{{$numero_operacion}}</td>
                                            <td>{{$tipo_pago}}</td>
                                            <td>{{$costo_ciclo}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-navigation-footer></x-navigation-footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>