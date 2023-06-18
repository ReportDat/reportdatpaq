@extends('adminlte::page')

@section('title', 'Reports')

@section('content_header')
    <h1>Editar reporte</h1>
@stop

@section('content')
    <form class="form" id="updateReportForm" action="{{ route('report.update', $report) }}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
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
                            <input type="date" class="form-control" id="date_purchase" name="date_purchase" value="{{ old('date_purchase', $report->date_purchase, date('Y-m-d')) }}" required>
                            @error('date_purchase')
                                <span class="badge badge-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="store">Tienda</label>
                            <input type="text" class="form-control" id="store" name="store" value="{{ old('store', $report->store) }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="document_number">Numero de documento</label>
                            <input type="text" class="form-control" id="document_number" name="document_number" value="{{ old('document_number', $report->document_number) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="name">Nombre del cliente</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $report->name) }}" required>
                            @error('name')
                                <span class="badge badge-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone', $report->phone) }}" required>
                            @error('phone')
                                <span class="badge badge-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="guide_number">Número de guía</label>
                            <input type="text" class="form-control" id="guide_number" name="guide_number" value="{{ old('guide_number', $report->guide_number) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="conveyor">Transportadora</label>
                            <select class="form-control" name="conveyor" id="conveyor">
                                <option value="">Seleccione</option>   
                                <option value="Coordinadora" {{ old('conveyor', $report->conveyor) == 'Coordinadora' ? 'selected' : '' }}>Coordinadora</option>   
                                <option value="Envía" {{ old('conveyor', $report->conveyor) == 'Envía' ? 'selected' : '' }}>Envía</option>   
                                <option value="Interrapidisimo" {{ old('conveyor', $report->conveyor) == 'Interrapidisimo' ? 'selected' : '' }}>Interrapidisimo</option>   
                                <option value="Saferbo" {{ old('conveyor', $report->conveyor) == 'Saferbo' ? 'selected' : '' }}>Saferbo</option>   
                                <option value="Servientrega" {{ old('conveyor', $report->conveyor) == 'Servientrega' ? 'selected' : '' }}>Servientrega</option>   
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="city">Ciudad</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $report->city) }}" required>
                            @error('city')
                                <span class="badge badge-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="address">Dirrección</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $report->address) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="debt_value">Valor deuda</label>
                            <input type="number" class="form-control" id="debt_value" name="debt_value" value="{{ old('debt_value', $report->debt_value) }}" required>
                            @error('debt_value')
                                <span class="badge badge-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="shipping_value">Valor compra</label>
                            <input type="number" class="form-control" id="shipping_value" name="shipping_value" value="{{ old('shipping_value', $report->shipping_value) }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="product">Producto</label>
                            <input type="text" class="form-control" id="product" name="product" value="{{ old('product', $report->product) }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="reason">Motivo del reporte</label>
                            <input type="text" class="form-control" id="reason" name="reason" value="{{ old('reason', $report->reason) }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="image">Cargar imágen</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            @error('date_purchase')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-auto" style="margin-top: 2.4rem!important;">
                            <div class="custom-control custom-checkbox mr-sm-2">
                              <input type="checkbox" class="custom-control-input" name="is_trustworthy" id="is_trustworthy"  value="1" {{ old('is_trustworthy', $report->is_trustworthy) == 1 ? 'checked' : '' }}>
                              <label class="custom-control-label" for="is_trustworthy">Confiable</label>
                            </div>
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
            <form class="form" id="importReportsForm" action="{{ route('report.import') }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="file" class="form-control" id="excel_file" name="excel_file" accept=".xlsx" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-info btn-sm float-sm-right" href="{{ url('file/ReportDatPaq.xlsx') }}" download>Descargar plantilla</a>
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
