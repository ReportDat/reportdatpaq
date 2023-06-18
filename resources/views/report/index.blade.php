@extends('adminlte::page')

@section('title', 'Reports')

@section('content_header')
    <h1>Listado de reportes</h1>
    <div class="row">
        <div class="col-sm-12 text-right">
            <a class="btn btn-primary" href="{{ route("report.create") }}"><i class="fas fa-plus"></i> Crear reporte</a>
        </div>
    </div>
@stop

@section('content')
<div class="table-responsive">
    <table id="table_id" class="table table-bordered display" style="width:100%; font-size:13px">
        <thead>
            <tr>
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
                <th>¿Confiables?</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
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
                    <td>{{ ($report->is_trustworthy == 1) ? "Confiable" : "No Confiable" }}</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                            Acción
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form action="{{ route("report.update", $report); }}" method="post">  
                                    @csrf
                                    @method('put')
                                    @if ($report->is_trustworthy == true)
                                        <input type="hidden" name="is_trustworthy" value="0">
                                        <button class="dropdown-item" href="#">Cambiar a no confiable</button>
                                    @else
                                        <input type="hidden" name="is_trustworthy" value="1">
                                        <button type="submit" class="dropdown-item" href="#">Cambiar a confiable</button>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('report.edit', $report) }}">Editar</a>
                                </form>  
                            </div>
                        </div>
                    </td>
                </tr>    
            @endforeach
        </tbody>
        <tfoot>
            <tr>
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
                <th>¿Confiables?</th>
                <th>Acciones</th>
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
        $(document).ready( function () {
            $('#table_id').DataTable({
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
        } );
    </script>
@stop
