<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar Ciclos - Academia Impulsa</title>
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
        <x-navigation-menu></x-navigation-menu>
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
                    <h1 class="h3 mb-2 text-gray-800">CICLOS - Academia Impulsa</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a class="text-primary-impulsa" href="{{route ('panel')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a class="text-primary-impulsa" href="{{route ('ciclos.index')}}">Ciclos</a></li>
                        <li class="breadcrumb-item active">Editar Ciclos</li>

                    </ol>
                    <div class="row">
                        <!-- Primera mitad -->
                        <div class="col-lg-5 mx-auto">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Editar Ciclo</h6>
                                </div>
                                <div class="card-body">
                                    <!--<form action="{{route ('ciclos.update',['ciclo'=>'$ciclo'])}}" method="post">-->
                                    <form action="{{ route('ciclos.update', $ciclo->id) }}" method="POST">
                                        <!--ROUTES-->
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="form-group">
                                            <label for="nombre_ciclo"> Nombre del ciclo:</label>
                                            <input type="text" class="form-control" name="nombre_ciclo" id="nombre_ciclo" title="Solo alfanumericos" placeholder="Ingresa el nombre del ciclo" value="{{($ciclo->nombre_ciclo)}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha_inicio"> Fecha de inicio:</label>
                                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" title="Formato Fecha" placeholder="Ingresar fecha de inicio" value="{{($ciclo->fecha_inicio)}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="costo"> Costo del ciclo:</label>
                                            <input type="number" class="form-control" name="costo" id="costo" placeholder="Ingrese el costo del ciclo" step="0.01" min="0" value="{{($ciclo->costo)}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="estado"> Estado:</label>
                                            <select class="form-control" id="estado" name="estado" required>
                                                <option value="">--Seleccionar--</option>
                                                <option value="0">Activo</option>
                                                <option value="1">Inactivo</option>
                                            </select>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary-impulsa btn-ciclos btn-block">Actualizar</button>
                                            <button type="reset" class="btn btn-secundary btn-ciclos btn-block">Reiniciar</button>
                                        </div>

                                        <!---<a href="index.html" class="btn btn-primary btn-ciclos btn-block">
                                            Login
                                        </a>-->
                                        <hr>

                                    </form>

                                    <!--<form action="" method="post">
                                    <div class="row g-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control">
                                    </div>
        


                                    </form>-->




                                    <!-- Contenido de la primera mitad -->
                                    <!--<div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">#Aquivaunformularioderegistro</h1>
                                        </div>
                                        <form class="user">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                            </div>
                                            <a href="index.html" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </a>
                                            <hr>
                                        </form>
                                        <hr>
                                    </div>-->
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
    @if (session('success'))
    <script>
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
            title: "Registro Exitoso"
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
    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>

</body>

</html>