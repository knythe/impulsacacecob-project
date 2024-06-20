<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar Personal - CACECOB EIRL - IMPULSA</title>
    <!-- ALERTA-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- END ALERTA -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

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
                    <h1 class="h3 mb-2 text-gray-800">PERSONAL - CACECOB EIRL - ACADEMIA IMPULSA</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a class="text-primary-usuarios" href="{{ route('panel') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Personal</li>
                    </ol>
                    <div class="row">
                        <!-- Tabla de registros -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <form action="">
                                        <button type="button" class="btn btn-primary-personal" data-bs-toggle="modal" data-bs-target="#createModal" title="Agregar">+ Agregar</button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <!-- Contenido de la segunda mitad -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Documento de identidad</th>
                                                    <th>Email</th>
                                                    <th>Telefono</th>
                                                    <th>Fecha de contratacion</th>
                                                    <th>Usuario</th>
                                                    <th>Rol</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>

                                            <!-- tbody -->
                                            <tbody>
                                                @foreach ($empleados as $empleado)
                                                <tr>
                                                    <td>
                                                        {{$empleado->nombres}}
                                                    </td>
                                                    <td>
                                                        {{$empleado->apellidos}}
                                                    </td>
                                                    <td>
                                                        {{$empleado->dni}}
                                                    </td>
                                                    <td>
                                                        {{$empleado->email}}
                                                    </td>
                                                    <td>
                                                        {{$empleado->telefono}}
                                                    </td>
                                                    <td>
                                                        {{$empleado->fecha_ingreso}}
                                                    </td>
                                                    <td>
                                                        {{$empleado->usuario->user}}
                                                    </td>
                                                    <td>
                                                        {{$empleado->role->name_rol}}
                                                    </td>
                                                    <td>
                                                        @if ($empleado->estado==0)
                                                        <span class="fw-bolder p-1 rounded bg-warning text-black d-flex justify-content-center align-items-center" style="height: 35px; width: 70px;">Activo</span>
                                                        @else
                                                        <span class="fw-bolder p-1 rounded bg-info text-black d-flex justify-content-center align-items-center" style="height: 35px; width: 70px;">Inactivo</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                            <form action="{{route ('empleados.edit', ['empleado'=>$empleado])}}" method="get">
                                                                @csrf
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-{{$empleado->id}}" title="Editar"><i class="fas fa-edit"></i></button>
                                                            </form>
                                                            <form action="" method="post">
                                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$empleado->id}}" title="Eliminar"><i class="fas fa-trash"></i></button>
                                                            </form>



                                                            <!--<button type="button" class="btn btn-success">Pagos</button>-->
                                                        </div>
                                                    </td>


                                                </tr>
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

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Cuadro de registro flotante -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header and Body -->
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Personal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('empleados.store') }}" method="post">
                        @csrf
                        <!-- Form fields -->
                        <div class="form-group">
                            <label for="nombres">Nombres del personal:</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" title="Solo alfanumericos" placeholder="Ingresa los nombres del personal" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos del personal:</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" title="Solo alfanumericos" placeholder="Ingresa los apellidos del personal" required>
                        </div>
                        <div class="form-group">
                            <label for="dni">Documento de identidad:</label>
                            <input type="text" class="form-control" name="dni" id="dni" title="Solo alfanumericos" placeholder="Ingresa el DNI del personal" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email del personal:</label>
                            <input type="email" class="form-control" name="email" id="email" title="Solo alfanumericos" placeholder="Ingresa el correo electronico del personal" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono del personal:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" title="Solo alfanumericos" placeholder="Ingresa el numero de telefono del personal" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_ingreso">Fecha de contratacion:</label>
                            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" title="Formato Fecha" placeholder="Ingresar fecha de contratacion del personal" required>
                        </div>
                        <div class="form-group">
                            <label for="usuario_id">Usuario:</label>
                            <select class="form-control" id="usuario_id" name="usuario_id">
                                @foreach($usuarios as $item)
                                <option value="{{ $item->id }}">{{ $item->user }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Rol:</label>
                            <select class="form-control" id="role_id" name="role_id">
                                @foreach($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->name_rol }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-ciclos" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary-personal btn-ciclos">Confirmar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Final del cuadro de registro flotante -->
    <!-- Modal de editar -->
    @foreach ($empleados as $empleado)
    <div class="modal fade" id="editModal-{{ $empleado->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Personal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header and Body -->
                <div class="modal-body">

                    <form action="{{ route('empleados.update', $empleado->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <!-- Form fields -->
                        <div class="form-group">
                            <label for="nombres">Nombres del personal:</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" title="Solo alfanumericos" placeholder="Ingresa los nombres del personal" value="{{($empleado->nombres)}}" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos del personal:</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" title="Solo alfanumericos" placeholder="Ingresa los apellidos del personal" value="{{($empleado->apellidos)}}" required>
                        </div>
                        <div class="form-group">
                            <label for="dni">Documento de identidad:</label>
                            <input type="text" class="form-control" name="dni" id="dni" title="Solo alfanumericos" placeholder="Ingresa el DNI del personal" value="{{($empleado->dni)}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email del personal:</label>
                            <input type="email" class="form-control" name="email" id="email" title="Solo alfanumericos" placeholder="Ingresa el correo electronico del personal" value="{{($empleado->email)}}" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono del personal:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" title="Solo alfanumericos" placeholder="Ingresa el numero de telefono del personal" value="{{($empleado->telefono)}}" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_ingreso">Fecha de contratacion:</label>
                            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" title="Formato Fecha" placeholder="Ingresar fecha de contratacion del personal" value="{{($empleado->fecha_ingreso)}}" required>
                        </div>
                        <div class="form-group">
                            <label for="usuario_id">Usuario:</label>
                            <select class="form-control" id="usuario_id" name="usuario_id">
                                @foreach($usuarios as $item)
                                <option value="{{ $item->id }}">{{ $item->user }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Rol:</label>
                            <select class="form-control" id="role_id" name="role_id" >
                                @foreach($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->name_rol }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estado"> Estado:</label>
                            <select class="form-control" id="estado" name="estado" required>
                                <option value="">--Seleccionar--</option>
                                <option value="0">Activo</option>
                                <option value="1">Inactivo</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-ciclos" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary-personal btn-ciclos">Confirmar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Final de modal editar rol -->
    <!-- Modal eliminar -->
    <div class="modal fade" id="confirmModal-{{$empleado->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Mensaje de confirmacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro quieres eliminar al personal?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-ciclos" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{route('empleados.destroy',['empleado'=>$empleado->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-ciclos">Confirmar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Final de modal eliminar rol -->
    @endforeach
    @if (session('success'))
    <script>
        let message = "{{ session('success') }}";
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/demo/datatables-demo.js') }}"></script>

</body>

</html>