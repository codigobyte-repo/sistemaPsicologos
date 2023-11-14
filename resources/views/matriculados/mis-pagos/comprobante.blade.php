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
                <strong>COMPROBANTE</strong>
            </div>
            <div class="card-body">
                <div class="row mb-4">

                    <div class="col-sm-12 mt-4">
                        <div>
                            <strong>{{ $pago->user->name . ' ' . $pago->user->lastname }}</strong>
                        </div>
                        <div><strong>Email:</strong> {{ $pago->user->email }} </div>

                        @if ($pago->matriculado && $pago->matriculado->cuit)
                            <div><strong>Cuit:</strong> {{ $pago->matriculado->cuit }} </div>
                        @endif

                        @if ($pago->matriculado && $pago->matriculado->documento_nro)
                            <div><strong>Dni:</strong> {{ $pago->matriculado->documento_nro }} </div>
                        @endif
                    </div>

                </div>

                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <th class="px-4 py-2">Matrícula:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->matricula, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Matrícula anterior:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->matricula_anterior, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Multa:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->multa, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Multa por suspensión:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->multa_por_suspension, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Habilitaciones:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->habilitaciones, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Ioma:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->ioma, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Supervisiones:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->supervisiones, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Cursos:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->cursos, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Carpeta de especialidad:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->carpeta_especialidad, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Escuelas:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->escuelas, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Pagos cuentas:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->pago_cuentas, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Otros pagos:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->otros_pagos, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Pago enviado:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->pago_enviado, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Importe total:</th>
                                <td class="px-4 py-2">$ {{ number_format($pago->importe_total, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Fecha:</th>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pago->created_at)->format('d-m-Y') }}</td>
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
                                    <td class="right">$ {{ number_format($pago->importe_total, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>$ {{ number_format($pago->importe_total, 0, ',', '.') }}</strong>
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
