<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CONTROL Y REGISTRO DE PAGOS - CACECOB EIRL</title>
    <link rel="icon" type="image/png" href="{{asset('img/logo-cacecob.png')}}">

    <!-- ALERTA -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- END ALERTA -->

    <!--GENERAN PDFS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="{{asset('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/template.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <x-navigation-menu-asesor-cacecob></x-navigation-menu-asesor-cacecob>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <x-navigation-header></x-navigation-header>

            <!-- Begin Page Content -->
            <div class="container-impulsa">
                <div class="image-containerimpulsa">
                    <form id="busquedaEstudianteForm" action="{{ route('busquedaCliente') }}" method="POST" class="w-100">
                        <div class="col-sm-12">
                            @csrf
                            <div class="form-group row">
                                <div class="form-group col-sm-8">
                                    <input type="text" class="form-control text-center" id="documento_identidad" name="documento_identidad" placeholder="Ingrese D.N.I o R.U.C" maxlength="8" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <button type="submit" class="btn btn-primary-asesor-cacecob btn-ciclos btn-block">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <img src="{{ asset('img/fondo-busqueda-clientes.jpg') }}" alt="Logo Impulsa">
                </div>

                <div class="form-container-impulsa">
                    <div class="row">
                        <!-- Inputs -->
                        <form action="{{ route('busquedaEstudiante') }}" method="POST" class="w-100">
                            <div class="col-sm-12">
                                @csrf
                                <label class="text-center form-group col-sm-12" style="color:#9F1423; font-weight:bold; font-size: 25px;" for="dni">CONTROL Y REGISTRO DE PAGOS</label>
                                <label class="text-center form-group col-sm-12" style="color:black; font-weight:bold" for="dni">INFORMACIÓN DEL CLIENTE</label>
                                <div class="form-group row">
                                    <div class="form-group col-sm-10">
                                        <label class="text-center" style="color:black; font-weight:bold" for="dni">Datos Personales</label>
                                        <input type="text" style="background-color: white; border:white" class="form-control text-center" id="datos_estudiante" name="datos_estudiante" value="{{ $cliente->nombres ?? '' }} {{$cliente->apellidos ?? ''}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <hr>
                                        <button type="button" class="btn btn-primary-asesor-cacecob w-100" data-bs-toggle="modal" data-bs-target="#view_cliente" title="Datos personales del estudiante"><i class="fa fa-eye"></i></button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-12">
                                        <label class="text-center" style="color:black; font-weight:bold">Ciclo contratado</label>
                                        <input type="text" style="background-color: white; border:white" class="form-control text-center" value="{{ $evento->tipo_evento ?? '' }} - {{ $evento->nombre_evento ?? '' }}" readonly>
                                    </div>
                                    <hr>
                                    <div class="form-group col-sm-4">
                                        <label class="text-center" style="color:black; font-weight:bold">Costo</label>
                                        <input type="text" style="background-color: white; border:white" class="form-control text-center" value="S/. {{ $evento->costo ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="text-center" style="color:black; font-weight:bold">Fecha de inscripción</label>
                                        <input type="text" style="background-color: white; border:white" class="form-control text-center" value="{{ isset($cacecobventa->fecha_registro) ? \Carbon\Carbon::parse($cacecobventa->fecha_registro)->format('d M y') : '' }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="text-center" style="color:black; font-weight:bold">Asesor responsable</label>
                                        <input type="text" style="background-color: white; border:white" class="form-control text-center" value="{{ $cacecobventa->empleado->usuario->user ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="/cacecobeirl/cliente/registrar/nuevo/comprobante" class="btn btn-primary-asesor-cacecob">Registrar pago |<i> </i><i class="fa fa-piggy-bank"></i></a>
                            <button id="generatePDF" class="btn btn-cacecob ml-2" style="background-color: red; color:white">Generar reporte |<i> </i><i class="fa fa-download"></i></button>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>FECHA DE PAGO</th>
                                        <th>CÓDIGO DE OPERACIÓN</th>
                                        <th>NÚMERO DE COMPROBANTE</th>
                                        <th>METODO DE PAGO</th>
                                        <th>MONTO</th>
                                        <th>OBSERVACIÓN</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($detalle_pago as $pago)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($pago->comprobante->fecha_pago)->format('d-m-Y')}}</td>
                                        <td>{{ $pago->comprobante->codigo_operacion ?? '' }}</td>
                                        <td>{{ $pago->comprobante->numero_comprobante ?? '' }}</td>
                                        <td>{{ $pago->comprobante->tipo_pago  ?? ''}}</td>
                                        <td>S/. {{ $pago->comprobante->monto  ?? ''}}</td>
                                        <td>{{ $pago->comprobante->observaciones  ?? ''}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-center">Total cancelado:</th>
                                        <th colspan="2" id="total_cancelado" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Total deuda:</th>
                                        <th colspan="2" id="total_adeudado" class="text-center"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <x-navigation-footer></x-navigation-footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!---view estudiante-->
    <div class="modal fade" id="view_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal">
            <div class="modal-content">
                <!-- Modal Header and Body -->
                <div class="modal-body">
                    <form class="" action="" method="post">
                        <!-- Form fields -->
                        <hr>
                        <hr>
                        <hr>
                        <div class="form-group">
                            <div class="form-group row">
                                <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                    <label style="color:black; font-weight:bold" class="text-center">Nombres y apellidos del cliente:</label>
                                    <input type="text" style="background-color: white; border:white" class="form-control text-center" value="{{ $cliente->nombres ?? '' }} {{$cliente->apellidos ?? ''}}" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                    <label style="color:black; font-weight:bold">Documento de identidad del cliente:</label>
                                    <input type="text" style="background-color: white; border:white" class="form-control text-center" value="{{$cliente->documento_identidad ?? ''}}" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label style="color:black; font-weight:bold">Telefono de contacto:</label>
                                <input type="text" style="background-color: white; border:white" class="form-control text-center" value="{{$cliente->telefono ?? 'S/N'}}" placeholder="" readonly>
                            </div>
                            <div class="form-group row">
                                <label style="color:black; font-weight:bold">Email de contacto:</label>
                                <input type="text" style="background-color: white; border:white" class="form-control text-center" value="{{$cliente->email ?? 'S/E'}}" placeholder="" readonly>
                            </div>

                            <div class="form-group row">
                                <label style="color:black; font-weight:bold">Direccion del cliente:</label>
                                <textarea rows="3" style="background-color: white; border:white" class="form-control text-center" readonly>{{$cliente->direccion ?? 'S/N'}} - {{$cliente->nacionalidad ?? ''}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---final view estudiante -->

    <!-- Logout Modal-->
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

    @if (isset($message))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Información',
            text: '{{ $message }}'
        });
    </script>
    @endif

    





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset ('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset ('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset ('js/scripts.js')}}"></script>
    <script src="{{asset ('js/estudiantes.js')}}"></script>
    <script src="{{asset ('js/apoderados.js')}}"></script>
    <script src="{{asset ('js/calculartotales.js')}}"></script>
    <script src="{{asset ('js/pdf_pagos_impulsa.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>





</body>

</html>