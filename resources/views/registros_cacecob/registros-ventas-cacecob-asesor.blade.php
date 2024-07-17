<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REGISTROS DE VENTAS - CACECOB EIRL</title>
    <link rel="website icon" type="png" href="{{asset ('img/logo-cacecob.png')}}">
    <!-- Bstrap Css-->

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Registros de ventas - CACECOB EIRL</h1>
                    <!--<p class="mb-4">##</p>-->

                    <form id="busquedaClienteForm" action="{{ route('busquedaCliente') }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="documento_identidad" id="dniInput">
                    </form>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">



                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ASESOR</th>
                                                <th>Datos del cliente</th>
                                                <th>Estado de venta</th>
                                                <th>Certificado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ventascacecob as $venta)
                                            <tr>
                                                <td>
                                                    <span class="fw-bolder p-1 rounded bg-warning text-black d-flex justify-content-center align-items-center"> {{$venta->empleado->usuario->user}}</span>
                                                    <p class="text-center">Venta: {{\Carbon\Carbon::parse($venta->fecha_registro)->format('d-m-Y')}}</p>
                                                </td>
                                                <td>
                                                    <p class="fw-semibold mb-1">{{ $venta->cacecob_cliente->nombres ?? ''}} {{ $venta->cacecob_cliente->apellidos ?? ''}}</p>
                                                    <p class="text-muted mb-0 dni">{{ $venta->cacecob_cliente->documento_identidad ?? '' }}</p>
                                                    <p class="text-muted mb-0">Telefono: {{ $venta->cacecob_cliente->telefono ?? 'S/N' }}</p>
                                                    <p class="text-muted mb-0">Direccion: {{ $venta->cacecob_cliente->direccion ?? 'S/N' }}</p>
                                                </td>

                                                <td>
                                                    @if ($venta->estado==0)
                                                    <span class="fw-bolder p-1 rounded bg-green text-black d-flex justify-content-center align-items-center">PAGO</span>
                                                    @elseif ($venta->estado==1)
                                                    <span class="fw-bolder p-1 rounded bg-yellow text-black d-flex justify-content-center align-items-center">DEUDOR</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{$venta->certificado}}
                                                </td>

                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                        <form action="" method="get">
                                                            @csrf
                                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-{{$venta->id}}" title="Editar"><i class="fas fa-edit"></i></button>
                                                        </form>
                                                        <!--<form action="" method="post">
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="" title="Eliminar"><i class="fas fa-calendar-alt"></i></button>
                                                    </form>-->
                                                        <button type="button" class="btn btn-primary search-button" title="Control de pagos"><i class="fas fa-calendar"></i></button>
                                                    </div>

                                                </td>
                                            </tr>
                                            <div class="modal fade" id="editModal-{{$venta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">

                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <form class="edit_pago_cacecob" action="{{ route('cacecobventas.update', $venta->id) }}" method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <!-- DATOS ESTUDIANTE -->
                                                                        <h1 class="h4 text-gray-900 mb-1 text-center">ESTADO DE VENTA</h1>
                                                                        <hr>
                                                                        <div class="form-group row">
                                                                            <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                                                                <input type="hidden" id="clientecacecob_id" name="clientecacecob_id" value="{{ $venta->cacecob_cliente->id  }}">
                                                                                <input type="hidden" id="empleado_id" name="empleado_id" value="{{ $venta->empleado_id  }}">
                                                                                <input type="hidden" id="pagocacecob_id" name="pagocacecob_id" value="{{ $venta->pagocacecob_id }}">
                                                                                <input type="hidden" id="evento_id" name="evento_id" value="{{ $venta->evento_id }}">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                                                                <label for="certificado">Certificado:</label>
                                                                                <select class="form-control" name="certificado" id="certificado" required>

                                                                                    @php
                                                                                    $certificado = [
                                                                                    "SIN CERTIFICADO" => "SIN CERTIFICADO",
                                                                                    "CERTIFICADO DIGITAL" => "CERTIFICADO DIGITAL",
                                                                                    "CERTIFICADO FISICO" => "CERTIFICADO FISICO",
                                                                                    "ENTREGADO" => "ENTREGADO",
                                                                                    ];
                                                                                    @endphp

                                                                                    @foreach ($certificado as $value => $label)
                                                                                    <option value="{{ $value }}" class="text-center" @if($venta->certificado == $value) selected @endif>{{ $label }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                                                                <label for="estado">Estado de venta:</label>
                                                                                <select class="form-control" name="estado" id="estado" required>

                                                                                    @php
                                                                                    $estado = [
                                                                                    "1" => "DEUDOR",
                                                                                    "0" => "PAGO",
                                                                                    ];
                                                                                    @endphp

                                                                                    @foreach ($estado as $value => $label)
                                                                                    <option value="{{ $value }}" class="text-center" @if($venta->estado == $value) selected @endif>{{ $label }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <hr>

                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <div class="form-group col-sm-4">
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <button type="submit" class="btn btn-primary-asesor-cacecob btn-ciclos w-100" title="Siguiente">Actualizar</button>
                                                                            </div>
                                                                        </div>
                                                                        <!-- END DATOS ESTUDIANTE -->
                                                                    </form>

                                                                </div>
                                                            </div>
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

        <script>
            // Función para enviar el DNI mediante POST
            function buscarCliente(event) {
                // Obtener el botón que fue clickeado
                const button = event.target;

                // Obtener la fila que contiene el botón
                const row = button.closest('tr');

                // Obtener el valor del DNI desde la misma fila
                const documento_identidad = row.querySelector('.dni').textContent;

                // Asignar el valor del DNI al input oculto del formulario
                document.getElementById('dniInput').value = documento_identidad;

                // Enviar el formulario
                document.getElementById('busquedaClienteForm').submit();
            }

            // Agregar el evento de clic a todos los botones de búsqueda
            document.querySelectorAll('.search-button').forEach(button => {
                button.addEventListener('click', buscarCliente);
            });
        </script>

        <!-- -->
        <!-- BstrapJS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="{{asset ('assets/jquery/jquery.min.js')}}"></script>
        <script src="{{asset ('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{asset ('assets/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{asset ('js/scripts.js')}}"></script>

        <script src="{{asset ('js/pagos_cacecob.js')}}"></script>
        <!-- Page level plugins -->
        <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

        <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>

</body>

</html>