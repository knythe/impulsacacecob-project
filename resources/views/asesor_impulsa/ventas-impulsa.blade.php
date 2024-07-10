<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REGISTRAR VENTA - Academia Impulsa</title>
    <link rel="website icon" type="png" href="{{asset ('img/logo-impulsa.png')}}">
    <!-- ALERTA-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

    <!--END ALERTA-->
    <!-- Bstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="{{asset ('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset ('css/template.css')}}" rel="stylesheet">
    <style>
       .hidden-during-pdf {
            display: none !important;
        }
        .pdf-friendly-input {
            background-color: white !important;
            border: 1px solid #ccc !important;
            box-shadow: none !important;
        }
    </style>



    <!-- Custom styles for this page -->
    <link href="{{asset ('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>
<!-- -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-navigation-menu-asesor-impulsa></x-navigation-menu-asesor-impulsa>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-navigation-header></x-navigation-header>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a class="text-primary-impulsa">Registrar Apoderado</a></li>
                        <li class="breadcrumb-item"><a class="text-primary-impulsa">Registrar Estudiante</a></li>
                        <li class="breadcrumb-item"><a class="text-primary-impulsa">Registrar Comprobante</a></li>
                        <li class="breadcrumb-item"><a class="text-primary-impulsa">Registrar Venta</a></li>
                    </ol>
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        
                        <div id="card-body-content" class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <form id="create_venta" action="{{ route('ventas.store') }}" class="user" method="post">
                                        @csrf
                                        <!-- DATOS ESTUDIANTE -->
                                        <h1 class="h4 text-gray-900 mb-1 text-center">DETALLES DE MATRICULA - ACADEMIA IMPULSA</h1>
                                        <hr>
                                        <div class="form-group">
                                            <div class="form-group row">
                                                <div class="form-group col-sm-4 mb-3 mb-sm-0">
                                                    <label for="apoderado_id">Datos del apoderado:</label>
                                                    <input type="text" class="form-control text-center" id="apoderado" name="apoderado" placeholder="Ingrese nombres del apoderado" value="{{ $ultimo_pago->estudiante->apoderado->nombres ?? ''}} {{ $ultimo_pago->estudiante->apoderado->apellidos ?? ''}}  " readonly>

                                                </div>
                                                <div class="form-group col-sm-4 mb-3 mb-sm-0">
                                                    <label for="telefono_apoderado">Telefono de contacto:</label>
                                                    <input type="text" class="form-control text-center" id="telefono_apoderado " name="telefono_apoderado" placeholder="Ingrese nombres del apoderado" value="{{ $ultimo_pago->estudiante->apoderado->telefono ?? ''}}  " readonly>

                                                </div>
                                                <div class="form-group col-sm-4 mb-3 mb-sm-0">
                                                    <label for="telefono_secundario_apoderado">Telefono secundario:</label>
                                                    <input type="text" class="form-control text-center" id="telefono_secundario_apoderado" name="telefono_secundario_apoderado" placeholder="Ingrese nombres del apoderado" value="{{ $ultimo_pago->estudiante->apoderado->telefono_secundario ?? ''}} " readonly>

                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="form-group col-sm-4 mb-3 mb-sm-0">
                                                    <label for="estudiante_id">Datos del estudiante:</label>
                                                    <input type="text" class="form-control text-center" id="estudiante" name="estudiante" placeholder="Ingrese nombres del apoderado" value="{{ $ultimo_pago->estudiante->nombres ?? ''}} {{ $ultimo_pago->estudiante->apellidos }}" readonly>
                                                    <input type="hidden" id="estudiante_id" name="estudiante_id" value="{{ $ultimo_pago->estudiante_id }}">
                                                </div>
                                                <div class="form-group col-sm-4 mb-3 mb-sm-0">
                                                    <label for="dni">Documento de identidad:</label>
                                                    <input type="text" class="form-control text-center" id="dni" name="dni" placeholder="Ingrese nombres del apoderado" value="{{ $ultimo_pago->estudiante->dni }}" readonly>
                                                </div>
                                                <div class="form-group col-sm-4 mb-3 mb-sm-0">
                                                    <label for="sede">Sede de matricula:</label>
                                                    <input type="text" class="form-control text-center" id="sede" name="sede" placeholder="Ingrese nombres del apoderado" value="{{ $ultimo_pago->estudiante->sede }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row" style="margin-bottom: 0px">
                                                <div class="form-group col-sm-6">
                                                    <label for="fecha_pago">Fecha de inscripcion:</label>
                                                    <input type="date" class="form-control text-center" id="fecha_pa" name="fecha_pago" placeholder="Celular" value="{{$ultimo_pago->comprobante->fecha_pago}}" readonly>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="tipo_pago">Tipo de pago:</label>
                                                    <input type="text" class="form-control text-center" id="tipo_pago" name="tipo_pago" placeholder="Celular" value="{{$ultimo_pago->comprobante->tipo_pago}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom: 0px">
                                                <div class="form-group col-sm-4 mb-3 mb-sm-0">
                                                    <label for="codigo_operacion">Codigo de operacion:</label>
                                                    <input type="text" class="form-control text-center" id="codigo_operacion" name="codigo_operacion" placeholder="Ingrese codigo de operacion" value="{{$ultimo_pago->comprobante->codigo_operacion}}" readonly>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="numero_comprobante">Numero de comprobante:</label>
                                                    <input type="text" class="form-control text-center" id="numero_comprobante" name="numero_comprobante" placeholder="Ingrese monto cancelado" value="{{$ultimo_pago->comprobante->numero_comprobante}}" readonly>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="monto">Monto cancelado:</label>
                                                    <input type="number" class="form-control text-center" id="monto" name="monto" placeholder="Ingrese monto cancelado" value="{{$ultimo_pago->comprobante->monto}}" readonly>
                                                    <input type="hidden" id="pago_id" name="pago_id" value="{{$pago_id}}">
                                                </div>

                                            </div>
                                            <div class="form-group row" style="margin-bottom: 0px">
                                                <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                                    <label for="observaciones">Observaciones:</label>
                                                    <textarea class="form-control" name="observaciones" id="observaciones" title="Solo alfanumericos" placeholder="Ingresa la descripcion del rol" oninput="soloLetrasNumeros(this)" readonly>{{($ultimo_pago->comprobante->observaciones)}}</textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <div class="form-group col-sm-4 mb-3 mb-sm-0">
                                                    <label for="ciclo_id">Ciclo:</label>
                                                    <select class="form-control" id="ciclo_id" name="ciclo_id" required>
                                                        @foreach($ciclos as $item)
                                                        <option value="{{ $item->id }}" class="text-center">{{ $item->nombre_ciclo }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-3 mb-3 mb-sm-0">
                                                    <label for="empleado_id">Asesor(a):</label>
                                                    <select class="form-control" id="empleado_id" name="empleado_id" required>
                                                        @foreach($empleados as $empleado)
                                                        <option value="{{ $empleado->id }}" class="text-center">{{ $empleado->usuario->user }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-3 mb-3 mb-sm-0">
                                                    <label for="prenda">Vestimenta:</label>
                                                    <select class="form-control" id="prenda" name="prenda" required>
                                                        <option value="1" class="text-center">RESERVAR</option>
                                                        <option value="2" class="text-center">NO RESERVAR</option>
                                                        <option value="3" class="text-center">ENTREGADO</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-2 mb-3 mb-sm-0">
                                                    <label for="cant_material">Material:</label>
                                                    <select class="form-control" id="cant_material" name="cant_material" required>
                                                        <option value="1" class="text-center">NO ENTREGO</option>
                                                        <option value="2" class="text-center">COMPLETO</option>
                                                        <option value="3" class="text-center">INCOMPLETO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <!-- END DATOS ESTUDIANTE -->
                                            <div>
                                                <!--<button type="submit" class="btn btn-primary-personal btn-ciclos">Siguiente</button>-->
                                                <button type="submit" class="btn btn-primary-impulsa-estudiante btn-ciclos hide-on-pdf" id="save-button" title="Eliminar">Registrar venta</button>                                             
                                            </div>
                                    </form>

                                    <hr>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
    @if (session('success'))
    <script>
        let message = "{{session('success')}}";
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: message
        });
    </script>
    @endif


    <!-- -->
    <!-- BstrapJS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset ('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset ('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset ('js/scripts.js')}}"></script>
    <script src="{{asset ('js/pdf-content.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>
  





</body>

</html>