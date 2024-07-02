<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ciclos - Academia Impulsa</title>
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
                        <li class="breadcrumb-item active">Ciclos</li>
                    </ol>

                    <!-- Segunda mitad -->
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">CICLOS REGISTRADOS</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-end">
                                    <a href="{{route ('ciclos.create')}}" class="btn btn-primary-impulsa">Agregar nuevo ciclo</a>
                                </div>
                                <hr>
                                <!-- Contenido de la segunda mitad -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre del Ciclo</th>
                                                <th>Fecha de inicio del ciclo</th>
                                                <th>Fecha de finalizacion</th>
                                                <th>Precio del ciclo</th>
                                                <th>Sucursal</th>
                                                <th>Direccion de la sucursal</th>
                                                <th>Referencias de la sucursal</th>
                                                <th>Personal responsable del ciclo</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ciclos as $ciclo)
                                            <tr>
                                                <td>{{$ciclo->nombre_ciclo}}</td>
                                                <td>{{\Carbon\Carbon::parse($ciclo->fecha_inicio)->format('d-m-Y')}}</td>
                                                <td>{{\Carbon\Carbon::parse($ciclo->fecha_finalizacion)->format('d-m-Y')}}</td>
                                                <td>S/. {{$ciclo->costo}} .0</td>
                                                <td>{{$ciclo->campus}}</td>
                                                <td>{{$ciclo->direccion_campus}}</td>
                                                <td>{{$ciclo->referencia_campus}}</td>
                                                <td>{{$ciclo->empleado->nombres ?? ''}} {{$ciclo->empleado->apellidos ?? '' }}</td>
                                                <td>
                                                    @if ($ciclo->estado==1)
                                                    <span class="fw-bolder p-1 rounded bg-warning text-black d-flex justify-content-center align-items-center" style="height: 35px; width: 70px;">Activo</span>
                                                    @else
                                                    <span class="fw-bolder p-1 rounded bg-info text-black d-flex justify-content-center align-items-center" style="height: 35px; width: 70px;">Inactivo</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- BOTONES DE EDITAR ELIMINAR -->
                                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                        <form action="{{route ('ciclos.edit', ['ciclo'=>$ciclo])}}" method="get">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success" title="Editar"><i class="fas fa-edit"></i></button>
                                                        </form>
                                                        <form action="" method="post">
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$ciclo->id}}" title="Eliminar"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- ALERTA DE ELIMINAR REGISTRO -->
                                            <div class="modal fade" id="confirmModal-{{$ciclo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="exampleModalLabel">Mensaje de confirmacion</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Seguro quieres eliminar el ciclo?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-ciclos" data-bs-dismiss="modal">Cancelar</button>
                                                            <form class="delete_ciclo" action="{{route('ciclos.destroy',['ciclo'=>$ciclo->id])}}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-ciclos">Confirmar</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2023</span>
                    </div>
                </div>
            </footer>
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
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para irte?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="login.html">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>

    <!-- BstrapJS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset ('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset ('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset ('js/scripts.js')}}"></script>
    <script src="{{asset ('js/ciclos.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>


</body>

</html>