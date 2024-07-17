<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registros de ventas - Academia Impulsa</title>
    <link rel="website icon" type="png" href="{{asset ('img/logo-impulsa.png')}}">
    <!-- Bstrap Css-->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--END ALERTA-->
    <!-- Bstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="{{asset ('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Registros de ventas - Academia Impulsa</h1>
                    <!--<p class="mb-4">##</p>-->

                    <form id="busquedaEstudianteForm" action="{{ route('controlpagosimpulsa') }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="dni" id="dniInput">
                    </form>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ASESOR</th>
                                            <th>Datos del estudiante</th>
                                            <th>Sede</th>
                                            <th>Datos del apoderado</th>
                                            <th>Estado de venta</th>
                                            <th>Material</th>
                                            <th>Vestimenta</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ventasimpulsa as $venta)
                                        <tr data-asesor="{{ $venta->empleado->usuario->user }}" data-fecha="{{ \Carbon\Carbon::parse($venta->pago->comprobante->fecha_pago)->format('Y-m-d') }}">
                                            <td>
                                                <span class="fw-bolder p-1 rounded bg-warning text-black d-flex justify-content-center align-items-center"> {{$venta->empleado->usuario->user}}</span>
                                                <p class="text-center">Venta: {{\Carbon\Carbon::parse($venta->pago->comprobante->fecha_pago)->format('d-m-Y')}}</p>
                                            </td>
                                            <td>
                                                <p class="fw-semibold mb-1">{{ $venta->estudiante->nombres ?? '' }} {{$venta->estudiante->apellidos ?? ''}}</p>
                                                <p class="text-muted mb-0 dni">{{ $venta->estudiante->dni ?? '' }}</p>
                                                <p class="text-muted mb-0">Telefono: {{ $venta->estudiante->telefono ?? 'S/N' }}</p>
                                            </td>
                                            <td>
                                                {{$venta->estudiante->sede}}
                                            </td>
                                            <td>
                                                <p class="fw-semibold mb-1">{{$venta->estudiante->apoderado->nombres ?? ''}} {{$venta->estudiante->apoderado->apellidos ?? ''}}</p>
                                                <p class="text-muted mb-0">Telefono: {{$venta->estudiante->apoderado->telefono}}</p>
                                            </td>

                                            <td>
                                                @if ($venta->estado==0)
                                                <span class="fw-bolder p-1 rounded bg-green text-black d-flex justify-content-center align-items-center">PAGO</span>
                                                @elseif ($venta->estado==1)
                                                <span class="fw-bolder p-1 rounded bg-yellow text-black d-flex justify-content-center align-items-center">DEUDOR</span>
                                                @elseif ($venta->estado==2)
                                                <span class="fw-bolder p-1 rounded bg-danger text-light d-flex justify-content-center align-items-center;">RETIRADO</span>
                                                @elseif ($venta->estado=3)
                                                <span class="fw-bolder p-1 rounded bg-reservado text-black d-flex justify-content-center align-items-center">RESERVAR</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{$venta->cant_material}}
                                            </td>
                                            <td>
                                                {{$venta->prenda}}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <form action="" method="get">
                                                        @csrf
                                                        <button type="button" class="btn btn-success search-button"><i class="fas fa-calendar-alt"></i></button>
                                                    </form>
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
        function buscarEstudiante(event) {
            // Obtener el botón que fue clickeado
            const button = event.target;

            // Obtener la fila que contiene el botón
            const row = button.closest('tr');

            // Obtener el valor del DNI desde la misma fila
            const dni = row.querySelector('.dni').textContent;

            // Asignar el valor del DNI al input oculto del formulario
            document.getElementById('dniInput').value = dni;

            // Enviar el formulario
            document.getElementById('busquedaEstudianteForm').submit();
        }

        // Agregar el evento de clic a todos los botones de búsqueda
        document.querySelectorAll('.search-button').forEach(button => {
            button.addEventListener('click', buscarEstudiante);
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
    <script src="{{asset ('js/ventasimpulsa.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>

</body>

</html>