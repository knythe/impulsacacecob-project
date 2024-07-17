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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">REPORTE MENSUAL DE VENTAS - CACECOB EIRL</h1>
                    <!--<p class="mb-4">##</p>-->
                    <hr>
                    <div class="form-group row">
                        <div class="form-group col-sm-4 mb-3 mb-sm-0">

                        </div>
                        <div class="form-group col-sm-4 mb-3 mb-sm-0">
                            <label for="empleado_id">Asesor(a):</label>
                            <select class="form-control text-center" style="background-color: #9F1423; color:white " id="empleado_id" name="empleado_id" required>
                                <option value="">Seleccione un asesor</option>
                                @foreach($empleados as $empleado)
                                <option value="{{ $empleado->usuario->user }}">{{ $empleado->usuario->user }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4 mb-3 mb-sm-0">
                            <label for="mes">Mes:</label>
                            <select class="form-control text-center" style="background-color: #9F1423; color:white " id="mes" name="mes" required>
                                <option value="">Seleccione un mes</option>
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                    </div>
                    <hr>


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
                                                <th>Informacion general</th>
                                                <th>Programa de formacion vendido</th>
                                                <th>Costo del programa</th>
                                                <th>Estado de venta</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ventascacecob as $venta)
                                            <tr data-asesor="{{ $venta->empleado->usuario->user }}" data-fecha="{{ $venta->fecha_registro }}">
                                                <td>
                                                    <span class="fw-bolder p-1 rounded bg-warning text-black d-flex justify-content-center align-items-center"> {{$venta->empleado->usuario->user}}</span>
                                                    <p class="text-center">Venta: {{\Carbon\Carbon::parse($venta->fecha_registro)->format('d-m-Y')}}</p>
                                                </td>
                                                <td>
                                                    <p class="fw-semibold mb-1">{{ $venta->cacecob_cliente->nombres ?? ''}} {{ $venta->cacecob_cliente->apellidos ?? ''}}</p>
                                                    <p class="text-muted mb-0">Documento de identidad: {{ $venta->cacecob_cliente->documento_identidad ?? '' }}</p>
                                                    <p class="text-muted mb-0">Telefono: {{ $venta->cacecob_cliente->telefono ?? 'S/N' }}</p>
                                                    <p class="text-muted mb-0">Direccion: {{ $venta->cacecob_cliente->direccion ?? 'S/N' }}</p>
                                                </td>
                                                <td>
                                                {{$venta->cacecob_evento->tipo_evento ?? ''}} - {{$venta->cacecob_evento->nombre_evento ?? ''}}
                                                </td>
                                                <td>
                                                    S/. {{$venta->cacecob_evento->costo}}
                                                </td>


                                                <td>
                                                    @if ($venta->estado==0)
                                                    <span class="fw-bolder p-1 rounded bg-green text-black d-flex justify-content-center align-items-center">PAGO</span>
                                                    @elseif ($venta->estado==1)
                                                    <span class="fw-bolder p-1 rounded bg-yellow text-black d-flex justify-content-center align-items-center">DEUDOR</span>
                                                    @endif
                                                </td>


                                            </tr>

                                            @endforeach


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" class="text-center">Total ventas (mensual):</th>
                                                <th colspan="2" id="total_ventas" class="text-center"></th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-center">Total deudores:</th>
                                                <th colspan="2" id="total_deudores" class="text-center"></th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-center">Total aproximado (S/.):</th>
                                                <th colspan="2" id="total_aproximado" class="text-center"></th>
                                            </tr>
                                        </tfoot>
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
            $(document).ready(function() {
                function filterTable() {
                    var selectedUser = $('#empleado_id').val();
                    var selectedMonth = $('#mes').val();
                    var totalVentas = 0;
                    var totalCostos = 0;
                    var totalDeudores = 0;

                    $('#dataTable tbody tr').each(function() {
                        var row = $(this);
                        var rowUser = row.data('asesor');
                        var rowDate = row.data('fecha');
                        var showRow = true;

                        if (selectedUser && rowUser !== selectedUser) {
                            showRow = false;
                        }

                        if (selectedMonth && rowDate.substring(5, 7) !== selectedMonth) {
                            showRow = false;
                        }

                        if (showRow) {
                            row.show();
                            // Sumar el costo del ciclo
                            const costoText = row.find('td:nth-child(4)').text().replace('S/. ', '');
                            const costo = parseFloat(costoText);
                            totalCostos += costo;

                            // Contar deudores
                            const estado = row.find('td:nth-child(5)').text().trim();
                            if (estado === "DEUDOR") {
                                totalDeudores++;
                            }

                            // Incrementar el total de ventas
                            totalVentas++;
                        } else {
                            row.hide();
                        }
                    });

                    // Actualizar los valores en la tabla
                    $('#total_ventas').text(totalVentas);
                    $('#total_deudores').text(totalDeudores);
                    $('#total_aproximado').text(`S/. ${totalCostos.toFixed(2)}`);
                }

                $('#empleado_id, #mes').change(filterTable);

                // Llamar a filterTable una vez para inicializar la tabla con los totales correctos
                filterTable();
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