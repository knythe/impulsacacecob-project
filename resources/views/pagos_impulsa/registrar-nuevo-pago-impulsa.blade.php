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
    <!--END ALERTA-->
    <!-- Bstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="{{asset ('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset ('css/template.css')}}" rel="stylesheet">

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

                <div class="container-impulsa">
                    <div class="image-containerimpulsa">
                        <img src="{{ asset('img/fondo-detalle-pagos.jpg') }}" alt="Logo Impulsa">
                    </div>

                    <div class="form-container-impulsa">
                        <div class="row">
                        <form action="{{ route('pago.store') }}" id="create_nuevo_pago" method="post">
                                        @csrf
                                        <!-- DATOS DE INSCRIPCION -->
                                        <h1 class="h4 text-gray-900 mb-1 text-center">DETALLES DE PAGO</h1>
                                        <hr>
                                        <div class="form-group">
                                            <div class="form-group row">
                                                <div class="form-group col-sm-5">
                                                    <label for="codigo_operacion">Codigo de operacion:</label>
                                                    <input type="text" class="form-control" id="codigo_operacion" name="codigo_operacion" placeholder="Ingrese codigo de operacion" value="{{ session('ultimo_comprobante')->codigo_operacion ?? '' }}" readonly>
                                                </div>
                                                <div class="form-group col-sm-5">
                                                    <label for="numero_comprobante">Numero de comprobante:</label>
                                                    <input type="text" class="form-control" id="numero_comprobante" name="numero_comprobante" placeholder="Ingrese el numero de comprobante" value="{{ session('ultimo_comprobante')->numero_comprobante ?? '' }}" readonly>
                                                </div>
                                                <div class="form-group col-sm-2 mb-3 mb-sm-0" role="group" aria-label="Basic mixed styles example">
                                                    <hr>
                                                    <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#editModalComprobante" title="Editar"><i class="fas fa-edit"></i></button>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="tipo_pago">Tipo de pago:</label>
                                                    <input type="text" class="form-control" id="numero_comprobante" name="numero_comprobante" placeholder="Ingrese el numero de comprobante" value="{{ session('ultimo_comprobante')->tipo_pago ?? '' }}" readonly>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="fecha_pago">Fecha de pago:</label>
                                                    <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="{{ session('ultimo_comprobante')->fecha_pago ?? '' }}" readonly>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="monto">Monto cancelado:</label>
                                                    <input type="number" class="form-control" id="monto" name="monto" placeholder="Ingrese monto cancelado" step="0.01" min="0" maxlength="3" value="{{ session('ultimo_comprobante')->monto ?? '' }}" readonly>
                                                </div>
                                                <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                                    <label for="observaciones">Observaciones:</label>
                                                    <textarea class="form-control" name="observaciones" id="observaciones" title="Solo alfanumericos" placeholder="Ingresa observaciones" readonly>{{ session('ultimo_comprobante')->observaciones ?? '' }}</textarea>
                                                </div>
                                                <hr>
                                                <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                                    <label for="apoderado_id">Datos del apoderado:</label>
                                                    <input type="text" class="form-control" id="apoderado" name="apoderado" placeholder="Ingrese nombres del apoderado" value="{{ session('estudiante')->apoderado->nombres ?? '' }} {{ session('estudiante')->apoderado->apellidos ?? '' }}" readonly>
                                                    <input type="hidden" id="comprobante_id" name="comprobante_id" value="{{ session('ultimo_comprobante')->id ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                                    <label for="estudiante_id">Datos del estudiante:</label>
                                                    <input type="text" class="form-control" id="estudiante" name="estudiante" placeholder="Ingrese nombres del apoderado" value="{{ session('estudiante')->nombres ?? '' }} {{ session('estudiante')->apellidos ?? '' }}" readonly>
                                                    <input type="hidden" id="estudiante_id" name="estudiante_id" value="{{ session('estudiante')->id ?? '' }}">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <div class="form-group col-sm-4">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <button type="submit" class="btn btn-primary-impulsa-estudiante btn-ciclos w-100" title="Siguiente">Siguiente</button>

                                                </div>
                                            </div>
                                            <!-- END DATOS DE INSCRIPCION-->




                                    </form>
                           
                        </div>
                    </div>
                </div>

                <!-- Begin Page Content -->
                

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
    <!--Edit Modal comprobante -->
    <div class="modal fade" id="editModalComprobante}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Editar datos del comprobante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header and Body -->
                <div class="modal-body">


                </div>

            </div>
        </div>
    </div>
    <!-- End Edit Modal -->

    <!-- End Edit Modal -->
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



    <!-- -->
    <!-- BstrapJS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset ('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset ('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset ('js/scripts.js')}}"></script>
    <script src="{{asset ('js/comprobantes.js')}}"></script>
    <script src="{{asset ('js/estudiantes.js')}}"></script>
    <script src="{{asset ('js/pagos.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>

</body>

</html>