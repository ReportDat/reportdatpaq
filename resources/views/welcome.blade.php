<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Búsqueda</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
</head>

<body>
    <div class="container-fluid">
        <header style="background-color: #343a40; color:white; padding: 15px">
            <img class="d-inline" style="border-radius: 50%; box-shadow: 0px 5px 5px #020303;"
                src="{{ url('vendor/adminlte/dist/img/AdminTo.png') }}" alt="">
            <h2 class="d-inline" style="margin-left: 10px;">Busqueda de registros</h2>
        </header>

        <div class="card">
            <div class="card-body">
                <form action="{{ ulr ()}}"></form>
                <form  method="post">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingrese un valor de búsqueda</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary" style="margin-top: 32px;"><i
                                    class="fas fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-sm-12">
                        <table id="reportTable" class="table table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha factura</th>
                                    <th>Tienda</th>
                                    <th>Número de documento</th>
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
                                    <td>Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($reports as $report)
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
                                                    </form>  
                                                </div>
                                            </div>
                                        </td>
                                    </tr>    
                                @endforeach --}}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Fecha factura</th>
                                    <th>Tienda</th>
                                    <th>Número de documento</th>
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
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>                        

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#reportTable').DataTable();
    });
</script>