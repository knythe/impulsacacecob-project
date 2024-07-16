<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REGISTRAR VENTA - CACECOB EIRL</title>
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
        <x-navigation-menu-asesor-cacecob></x-navigation-menu-asesor-cacecob>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-navigation-header></x-navigation-header>
                <!-- End of Topbar -->
                <div class="container">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a class="text-primary-cacecob">Registrar Cliente</a></li>
                        <li class="breadcrumb-item">Registrar Comprobante</li>
                        <li class="breadcrumb-item">Registrar Venta</li>
                    </ol>
                </div>
                <!-- Begin Page Content -->
                <div class="container-impulsa">

                    <div class="image-containerimpulsa">
                        <img src="{{ asset('img/fonto-abogados.jpg') }}" alt="Logo Impulsa">
                    </div>

                    <div class="form-container-impulsa">
                        <form id="create_cliente" action="{{ route('clientes.store') }}" method="post">
                            @csrf
                            <!-- DATOS ESTUDIANTE -->
                            <h1 class="h4 text-gray-900 mb-1 text-center">DATOS DEL CLIENTE</h1>
                            <hr>

                            <!-- DATOS APODERADO -->

                            <div class="form-group">
                                <div class="form-group row">
                                    <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                        <label for="nombres">Nombres del cliente:</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese nombres del cliente" oninput="soloLetras(this)" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="apellidos">Apellidos del cliente:</label>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos del cliente" oninput="soloLetras(this)" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6">
                                        <label for="telefono">Telefono del cliente:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="999-999-999" maxlength="9" oninput="soloNumeros(this)" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="documento_identidad">Documento de identidad del cliente:</label>
                                        <input type="text" class="form-control" id="documento_identidad" name="documento_identidad" placeholder="D.N.I o R.U.C" maxlength="11" oninput="soloNumeros(this)" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6">
                                        <label for="nacionalidad">Nacionalidad del cliente:</label>
                                        <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="example: Colombiana" maxlength="15" oninput="soloLetras(this)">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="email">Correo electronico:</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com">
                                        <label for="email" class="center-text-label text-primary-cacecob">*completar en caso sea necesario*</label>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="direccion">Direccion:</label>
                                        <textarea name="direccion" id="direccion" class="form-control" placeholder="Ingrese direccion del cliente" rows="2" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn btn-primary-asesor-cacecob btn-ciclos w-50" title="Siguiente">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                            <!-- END DATOS ESTUDIANTE -->
                        </form>

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



    <!-- -->
    <!-- BstrapJS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset ('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset ('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset ('js/scripts.js')}}"></script>
    <script src="{{asset ('js/apoderados.js')}}"></script>
    <script src="{{asset ('js/cacecobclientes.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>

</body>

</html>