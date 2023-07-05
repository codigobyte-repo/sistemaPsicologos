<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Comprobante de pago</title>

    <style>
        .card-header-violet {
            background-color: #9182d4; /* Reemplaza este valor con tu color violeta claro deseado */
        }

        .tbody-violet {
            background-color: #E5E1F7; /* Reemplaza este valor con tu color violeta claro deseado */
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-center card-header-violet">
                <strong>ORIGINAL</strong>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    
                    <div class="col-sm-12">
                        <div>
                            <div><strong>Razón social: </strong>{{ $factura->dato->razon_social }}</div>
                        </div>
                        <div><strong>Domicilio comercial: </strong>{{ $factura->dato->domicilio_comercial }}</div>
                        <div><strong>Cuit: </strong>{{ $factura->dato->cuit }}</div>
                        <div><strong>Condición frente al IVA: </strong>{{ $factura->dato->condicion_frente_al_iva }}</div>
                        <div><strong>Ingresos brutos: </strong>{{ $factura->dato->ingresos_brutos }}</div>
                        <div><strong>Fecha inicio actividad: </strong>{{ $factura->dato->fecha_inicio_actividades }}</div>
                        <div><strong>Punto de venta: </strong>{{ $factura->dato->punto_venta }}</div>
                        <div><strong>Comp. Nro: </strong>{{ $factura->dato->codigo }}</div>
                    </div>

                    <div class="col-sm-12 mt-4">
                        <div>
                            <strong>{{ $factura->user->name . ' ' . $factura->user->lastname }}</strong>
                        </div>
                        <div><strong>Email:</strong> {{ $factura->user->email }} </div>

                        @if ($factura->matriculado && $factura->matriculado->cuit)
                            <div><strong>Cuit:</strong> {{ $factura->matriculado->cuit }} </div>
                        @endif

                        @if ($factura->matriculado && $factura->matriculado->documento_nro)
                            <div><strong>Dni:</strong> {{ $factura->matriculado->documento_nro }} </div>
                        @endif
                    </div>

                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Factura</th>
                                <th>Descripción</th>

                                <th class="right">Fecha de emisión</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="left strong tbody-violet">{{ $factura->numero_factura }}</td>
                                <td class="left tbody-violet">{{ $factura->pago->descripcion }}</td>

                                <td class="right tbody-violet">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $factura->fecha_emision)->format('d-m-Y') }}</td>
                                <td class="right tbody-violet">{{ number_format($factura->pago->precio, 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">

                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="right">{{ number_format($factura->pago->precio, 2, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>{{ number_format($factura->pago->precio, 2, ',', '.') }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>

</body>

</html>
