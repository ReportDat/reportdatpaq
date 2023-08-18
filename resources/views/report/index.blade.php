@extends('adminlte::page')

@section('title', 'Reports')

@section('content_header')
    <h1>Listado de reportes</h1>
    <div class="row">
        <div class="col-sm-12 text-right">
            <a class="btn btn-primary" href="{{ route('report.create') }}"><i class="fas fa-plus"></i> Crear reporte</a>
        </div>
    </div>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>¡Correcto!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive">
        <table id="table_id" class="table table-bordered display" style="width:100%; font-size:13px">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Tienda</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Guía</th>
                    <th>Transportadora</th>
                    <th>Ciudad</th>
                    <th>Dirección</th>
                    <th>Valor deuda</th>
                    <th>Producto</th>
                    <th>Valor compra</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Acción
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('report.edit', $report) }}" title="Editar"><i
                                            class="far fa-edit fa-sm"></i> Editar</a>
                                    @if (!empty($report->image))
                                        <a class="dropdown-item" href="{{ route('report.downloadImage', $report->id) }}"
                                            title="Descargar imagen"><i class="far fa-image fa- sm"></i> Descargar
                                            imagen</a>
                                    @endif
                                    <a class="dropdown-item" id="sendMessage-{{ $report->id }}"
                                        href="https://api.whatsapp.com/send?phone=57{{ $report->phone }}&text=Hola te informo que tus datos fueron enviados a
                                    Reportdatpaq.com
                                    Por incumplimiento de no reclamar el pedido en Oficina.
                                    Busca tu reporte aquí :
                                    Reportdatpaq.com/reportes
                                    ---Mediante :
                                    *Numero Telefónico: {{ $report->phone }}
                                    *Guia de envio generada: {{ $report->guide_number }}
                                    -----
                                    Solucion:
                                    *Pagar el Envio Ida.
                                    Estado Actual*
                                    -No Confiable
                                    --Datos de Compra--
                                    *Nombre: {{ $report->name }}
                                    *Telefono: {{ $report->phone }}
                                    *Tienda: {{ $report->store }}
                                    *Guia: {{ $report->guide_number }}
                                    *Transportadora: {{ $report->conveyor }}
                                    *Producto: {{ $report->product }}
                                    *Valor Deuda: {{ $report->debt_value }}
                                    *Motivo Reporte: {{ $report->reason }}
                                    Esta Informacion sera suministrada a mas de 1000 Tiendas virtuales a nivel nacional las cuales podran ver si eres un Cliente responsable, Esto ayudara a minimizar las devoluciones y a conocer mejor al cliente. 
                                    Muchas Gracias."
                                        target="_blank" title="Whatsapp"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                                </div>
                            </div>
                        </td>
                        <td>{{ $report->is_trustworthy == 1 ? 'Confiable' : 'No Confiable' }}</td>
                        <td>{{ $report->date_purchase }}</td>
                        <td>{{ $report->store }}</td>
                        <td>{{ $report->document_number }}</td>
                        <td>{{ $report->name }}</td>
                        <td>{{ $report->phone }}</td>
                        <td>{{ $report->guide_number }}</td>
                        <td>{{ $report->conveyor }}</td>
                        <td>{{ $report->city }}</td>
                        <td>{{ $report->address }}</td>
                        <td>{{ $report->debt_value }}</td>
                        <td>{{ $report->product }}</td>
                        <td>{{ $report->shipping_value }}</td>
                        <td>{{ $report->reason }}</td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Acciones</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Tienda</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Guía</th>
                    <th>Transportadora</th>
                    <th>Ciudad</th>
                    <th>Dirección</th>
                    <th>Valor deuda</th>
                    <th>Producto</th>
                    <th>Valor compra</th>
                    <th>Motivo</th>
                </tr>
            </tfoot>
        </table>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        $(document).ready(function() {
            sendMessage();

            $('#table_id').DataTable({
                "order": [
                    [5, "asc"]
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "Ningún registro encontrado",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hoy registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                    }
                }
            });
        });

        function sendMessage() {

            setTimeout(() => {
                let reportId = '{{ session('reportId') }}';

                if (reportId && reportId !== '') {
                    $('#sendMessage-{{ session('reportId') }}')[0].click();
                }
            }, 800);

        }
    </script>
@stop
