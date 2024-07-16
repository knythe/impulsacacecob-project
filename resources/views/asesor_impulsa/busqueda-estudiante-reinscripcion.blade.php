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
                        <form id="busquedaEstudianteForm" action="{{ route('buscarEstudiante') }}" method="POST" class="w-100">
                            <div class="col-sm-12">
                                @csrf
                                <div class="form-group row">
                                    <div class="form-group col-sm-8">
                                        <input type="text" class="form-control text-center" id="dni" name="dni" placeholder="Ingrese DNI" maxlength="8" required>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <button type="submit" class="btn btn-primary-impulsa btn-ciclos btn-block">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <img src="{{ asset('img/fondo-estudiant.jpg') }}" alt="Logo Impulsa">
                    </div>

                    <div class="form-container-impulsa">
                        <div class="row">

                            <form action="" method="post">
                                @csrf
                                <!-- DATOS ESTUDIANTE -->
                                <h1 class="h4 text-gray-900 mb-1 text-center">DATOS DEL ESTUDIANTE</h1>
                                <hr>
                                <div class="form-group row">
                                    <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                        <label for="apoderado_id">Nombres del apoderado:</label>
                                        <input type="text" class="form-control" id="apoderadoss" name="apoderadoss" style="background-color: white;" value="{{$estudiante->apoderado->nombres ?? ''}} {{$estudiante->apoderado->apellidos ?? ''}}" readonly>
                                        <input type="hidden" id="apoderado_id" name="apoderado_id" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                        <label for="nombres">Nombres del estudiante:</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" style="background-color: white;" value="{{$estudiante->nombres ?? ''}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="apellidos">Apellidos del estudiante:</label>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" style="background-color: white;" value="{{$estudiante->apellidos ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                        <label for="dni">Documento de identidad del estudiante:</label>
                                        <input type="text" class="form-control" id="dni" name="dni" style="background-color: white;" value="{{$estudiante->dni ?? ''}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="telefono">Telefono del estudiante:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" style="background-color: white;" value="{{$estudiante->telefono ?? 'S/N'}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-8">
                                        <label for="email">Email del estudiante:</label>
                                        <input type="text" class="form-control" id="email" name="email" style="background-color: white;" value="{{$estudiante->email ?? 'S/E'}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="sede">Sede:</label>
                                        <input type="text" class="form-control" style="background-color: white;" value="{{$estudiante->sede ?? ''}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="form-group col-sm-12">
                                        <label for="direccion">Direccion del estudiante:</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" style="background-color: white;" value="{{$estudiante->direccion ?? ''}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-4">
                                    </div>
                                    <div class="form-group col-sm-4">
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <a href="/academiaimpulsa/buscar/estudiante/nuevo/comprobante" style="padding-left: 40px; padding-right:40px" class="btn btn-primary-impulsa">Siguiente</a>
                                    </div>
                                </div>
                                <!-- END DATOS ESTUDIANTE -->
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