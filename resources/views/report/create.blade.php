@extends('adminlte::page')

@section('title', 'Reports')

@section('content_header')
    <h1>Crear reporte</h1>
@stop

@section('content')
    <form class="form" id="createReportForm" action="{{ route('report.store') }}" method="POST">
        @csrf
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Datos del reporte</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button> --}}
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="date_purchase">Fecha de factura</label>
                            <input type="date" class="form-control" id="date_purchase" name="date_purchase" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="store">Tienda</label>
                            <input type="text" class="form-control" id="store" name="store" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="document_number">Numero de documento</label>
                            <input type="text" class="form-control" id="document_number" name="document_number" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="name">Nombre del cliente</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="guide_number">Número de guía</label>
                            <input type="text" class="form-control" id="guide_number" name="guide_number" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="conveyor">Transportadora</label>
                            <input type="text" class="form-control" id="conveyor" name="conveyor" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="city">Ciudad</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="address">Dirrección</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="debt_value">Valor deuda</label>
                            <input type="number" class="form-control" id="debt_value" name="debt_value" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="shipping_value">Valor compra</label>
                            <input type="number" class="form-control" id="shipping_value" name="shipping_value" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="product">Producto</label>
                            <input type="text" class="form-control" id="product" name="product" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="reason">Motivo del reporte</label>
                            <input type="text" class="form-control" id="reason" name="reason" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-sm-6">
            <form class="form" id="importReportsForm" action="{{ route('report.import') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Importar registros de reporte</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button> --}}
                        </div>
                        
                        {{-- <a class="btn btn-info btn-sm float-sm-right" href="archivo.jpg" download>Descargar plantilla</a> --}}
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="date_purchase">Archivo excel</label>
                                    <input type="file" class="form-control" id="excel_file" name="excel_file" accept=".csv" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-info btn-sm float-sm-right" href="{{ url('file/documentoReportTdaTpaq.xlsx') }}" download>Descargar plantilla</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script></script>
@stop
