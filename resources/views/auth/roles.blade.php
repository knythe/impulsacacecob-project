<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ROLES - CACECOB EIRL - IMPULSA</title>
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
        <x-navigation-menu-usuarios></x-navigation-menu-usuarios>
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
                    <h1 class="h3 mb-2 text-gray-800">ROLES - CACECOB EIRL - ACADEMIA IMPULSA</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a class="text-primary-usuarios" href="{{route ('panel')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Roles</li>

                    </ol>
                    <div class="row">
                        <!-- Primera mitad -->
                        <div class="col-lg-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary-usuarios">Crear nuevo rol</h6>
                                </div>
                                <div class="card-body">
                                    <form  id="createRoleForm" action="{{route ('roles.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name_rol"> Nombre del rol:</label>
                                            <input type="text" class="form-control" name="name_rol" id="name_rol" title="Solo alfanumericos" placeholder="Ingresa el nombre de usuario" required>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary-personal btn-eventos btn-block">Guardar</button>
                                        </div>

                                        <!---<a href="index.html" class="btn btn-primary btn-ciclos btn-block">
                                            Login
                                        </a>-->
                                        <hr>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Segunda mitad -->
                        <div class="col-lg-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary-usuarios">Roles Registrados</h6>

                                </div>
                                <div class="card-body">
                                    <!-- Contenido de la segunda mitad -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Nombre del rol</th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $rol)

                                                <tr>
                                                    <td class="text-center">
                                                        {{$rol->name_rol}}
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($rol->estado==0)
                                                        <span class="fw-bolder p-1 rounded bg-warning text-black d-flex justify-content-center align-items-center" style="height: 35px; width: 70px;">Activo</span>
                                                        @else
                                                        <span class="fw-bolder p-1 rounded bg-info text-black d-flex justify-content-center align-items-center" style="height: 35px; width: 70px;">Inactivo</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <!-- BOTONES DE EDITAR ELIMINAR -->

                                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                            <form action="{{route ('roles.edit', ['role'=>$rol])}}" method="get">
                                                                @csrf
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-{{$rol->id}}" title="Editar"><i class="fas fa-edit"></i></button>
                                                            </form>
                                                            <form action="" method="post">
                                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$rol->id}}" title="Eliminar"><i class="fas fa-trash"></i></button>
                                                            </form>



                                                            <!--<button type="button" class="btn btn-success">Pagos</button>-->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--- ALERTA ELIMINAR -->
                                                <div class="modal fade" id="confirmModal-{{$rol->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center">
                                                                <h5 class="modal-title" id="exampleModalLabel">Mensaje de confirmacion</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ¿Seguro quieres eliminar el rol?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-ciclos" data-bs-dismiss="modal">Cancelar</button>
                                                                <form class="deleteRoleForm" action="{{route('roles.destroy',['role'=>$rol->id])}}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger btn-ciclos">Confirmar</button>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal de editar rol -->
                                                <div class="modal fade" id="editModal-{{$rol->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center">
                                                                <h5 class="modal-title" id="exampleModalLabel">Editar Rol</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <form class="editRoleForm" action="{{ route('roles.update', $rol->id) }}" method="post">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="form-group">
                                                                                <label for="name_rol">Nombres del rol:</label>
                                                                                <input type="text" class="form-control" name="name_rol" id="name_rol" title="Solo alfanumericos" placeholder="Ingresa los nombres del personal" value="{{($rol->name_rol)}}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="estado"> Estado:</label>
                                                                                <select class="form-control" id="estado" name="estado" required>
                                                                                    <option value="">--Seleccionar--</option>
                                                                                    <option value="0">Activo</option>
                                                                                    <option value="1">Inactivo</option>
                                                                                </select>
                                                                            </div>

                                                                            <hr>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary btn-ciclos" data-bs-dismiss="modal">Cancelar</button>
                                                                                <button type="submit" class="btn btn-primary-personal btn-ciclos">Confirmar</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Final de modal editar rol -->

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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

   


    <!-- -->
    <!-- BstrapJS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset ('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset ('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset ('js/scripts.js')}}"></script>
    <script src="{{ asset('js/roles.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>

</body>

</html>