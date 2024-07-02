<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eventos - CACECOB EIRL</title>
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
        <x-navigation-menu-cacecob></x-navigation-menu-cacecob>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-navigation-header></x-navigation-header>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">EVENTOS - CACECOB EIRL</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a class="text-primary-cacecob" href="{{route ('panel')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a class="text-primary-cacecob" href="{{route ('eventos.index')}}">Ciclos</a></li>
                        <li class="breadcrumb-item active">Registrar Eventos</li>
                        

                    </ol>
                    <div class="row">
                        <!-- Primera mitad -->
                        <div class="col-lg-10 mx-auto">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary-cacecob">REGISTRAR EVENTO CACECOB</h6>
                                </div>
                                <div class="card-body">
                                    <form class="edit_ciclo" action="{{ route('ciclos.store') }}" method="POST">
                                        <!--ROUTES-->
                                        @csrf
                                        
                                        <div class="form-group row">
                                            <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                                <label for="tipo_evento"> Tipo de evento:</label>
                                                <select class="form-control" id="estado" name="estado" required>
                                                    <option value="Seminario" selected class="text-center">Seminario</option>
                                                    <option value="Curso Especializado" class="text-center">Curso Especializado</option>
                                                    <option value="Diplomado" class="text-center">Diplomado</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="nombre_evento"> Nombre del evento:</label>
                                                <textarea class="form-control" name="nombre_evento" id="nombre_evento" title="Solo alfanumericos" placeholder="Ingresa el nombre del evento" oninput="soloLetrasNumeros(this)" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                                <label for="fecha_programada"> Fecha programada del evento:</label>
                                                <input type="date" class="form-control" id="fecha_programada" name="fecha_programada" title="Ingrese la fecha de programada del ciclo" placeholder="Ingresar fecha de inicio" value="" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                            <label for="fecha_finalizacion"> Fecha de finalizacion del evento:</label>
                                            <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion" title="Ingrese la fecha de finalizacion del ciclo" placeholder="Ingresar fecha de inicio" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                                <label for="empleado_id"> Personal responsable:</label>
                                                <select class="form-control" id="empleado_id" name="empleado_id" required>
                                                   
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="campus"> Sucursal:</label>
                                                <input type="text" class="form-control" name="campus" id="campus" placeholder="Ingrese la sucursal para el ciclo" oninput="soloLetrasNumeros(this)" required>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="form-group col-sm-12">
                                                <label for="direccion_campus"> Direccion de la sucursal:</label>
                                                <input type="text" class="form-control" name="direccion_campus" id="direccion_campus" placeholder="Ingrese direccion de la sucursal" oninput="soloLetrasNumeros(this)"  required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                                <label for="referencia_campus"> Referencia de la sucursal:</label>
                                                <input type="text" class="form-control" name="referencia_campus" id="referencia_campus" placeholder="Ingrese referencia de la sucursal" oninput="soloLetrasNumeros(this)" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                                <!-- Linea que me permite editar el estado en tiempo real-->
                                                <label for="estado"> Estado:</label>
                                                <select class="form-control" id="estado" name="estado" required>
                                                   
                                                </select>

                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary-cacecob btn-ciclos btn-block">Actualizar</button>
                                            <button type="reset" class="btn btn-secundary btn-ciclos btn-block">Reiniciar</button>
                                        </div>
                                    </form>



                                </div>
                            </div>
                        </div>
                        <!-- Segunda mitad -->

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
    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>

</body>

</html>