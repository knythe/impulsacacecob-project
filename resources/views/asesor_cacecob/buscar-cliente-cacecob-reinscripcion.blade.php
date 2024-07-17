<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REGISTRAR VENTA - CACECOB EIRL</title>
    <link rel="website icon" type="png" href="{{asset ('img/logo-cacecob.png')}}">
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
        <x-navigation-menu-asesor-cacecob></x-navigation-menu-asesor-cacecob>
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
                        <img src="{{ asset('img/fonto-abogados.jpg') }}" alt="Logo Impulsa">
                    </div>

                    <div class="form-container-impulsa">
                        <form id="busquedaEstudianteForm" action="{{ route('buscarCliente') }}" method="POST" class="w-100">
                            <div class="col-sm-12">
                                @csrf
                                <div class="form-group row">
                                    <div class="form-group col-sm-8">
                                        <input type="text" class="form-control text-center" id="documento_identidad" name="documento_identidad" placeholder="Ingrese D.N.I o R.U.C" maxlength="11" required>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <button type="submit" class="btn btn-primary-asesor-cacecob btn-ciclos btn-block">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="" method="post">
                                @csrf
                                <!-- DATOS ESTUDIANTE -->
                                <h1 class="h4 text-gray-900 mb-1 text-center">DATOS DEL CLIENTE</h1>
                                <hr>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                        <label for="nombres">Nombres del cliente:</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" style="background-color: white;" value="{{$cliente->nombres ?? ''}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="apellidos">Apellidos del cliente:</label>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" style="background-color: white;" value="{{$cliente->apellidos ?? ''}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                        <label for="dni">Documento de identidad:</label>
                                        <input type="text" class="form-control" id="dni" name="dni" style="background-color: white;" value="{{$cliente->documento_identidad ?? ''}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="telefono">Telefono del cliente:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" style="background-color: white;" value="{{$cliente->telefono ?? 'S/N'}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-8">
                                        <label for="email">Email del cliente:</label>
                                        <input type="text" class="form-control" id="email" name="email" style="background-color: white;" value="{{$cliente->email ?? 'S/E'}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="sede">Nacionalidad:</label>
                                        <input type="text" class="form-control" style="background-color: white;" value="{{$cliente->nacionalidad ?? ''}}" readonly>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="direccion">Direccion del estudiante:</label>
                                        <textarea name="" id="" class="form-control" style="background-color: white;" readonly>{{$cliente->direccion}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-4">
                                    </div>
                                    <div class="form-group col-sm-4">
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <a href="/cacecobeirl/search/information/customers/nuevo/comprobante" style="padding-left: 40px; padding-right:40px" class="btn btn-primary-cacecob">Siguiente</a>
                                    </div>
                                </div>
                                <!-- END DATOS ESTUDIANTE -->
                            </form>

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