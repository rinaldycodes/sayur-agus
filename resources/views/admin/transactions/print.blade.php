<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="{{ URL::to('/frontend/libraries/bootstrap-5/css/bootstrap.min.css') }}"
        />
        <!-- MY FONTS -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"
            rel="stylesheet"
        />

        <!-- BOOTSTRAP ICONS -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css"
        />

        <!-- MY CSS -->
        <title>
            Laporan {{ date("d M Y", strtotime($date1)) }} -
            {{ date("d M Y", strtotime($date2)) }}
        </title>
    </head>
    <body>
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h1 class="fs-5 h3 mb-2 text-center text-gray-800">
                        Laporan Periode <br />
                        {{ date("d M Y", strtotime($date1)) }} -
                        {{ date("d M Y", strtotime($date2)) }}
                    </h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.true') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover"
                                        id="myTable"
                                        width="100%"
                                        cellspacing="0"
                                    >
                                        <thead
                                            class="text-center bg-success text-white"
                                        >
                                            <tr>
                                                <th>No. Invoice</th>
                                                <th>Penerima</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @forelse ($transactions as
                                            $transaction)

                                            <tr class="align-middle">
                                                <td>
                                                    <p>
                                                        <b
                                                            >{{$transaction->id}}</b
                                                        >
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        {{$transaction->receiver_name}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <b
                                                            class="text-uppercase"
                                                            >{{$transaction->payment->payment}}</b
                                                        >
                                                    </p>
                                                </td>

                                                <?php 
                                                    $status = $transaction->transaction_status;
                                                $value = ($status == 'PENDING')
                                                ? "text-danger" : (( $status ==
                                                'SUCCESS') ? "text-success" :
                                                ""); ?>

                                                <td class="{{ $value }}">
                                                    {{$transaction->transaction_status}}
                                                </td>
                                                <td>
                                                    <small
                                                        >Rp.{{ number_format($transaction->transaction_total,0,',','.')}}</small
                                                    >
                                                </td>
                                            </tr>
                                            @empty @endforelse
                                        </tbody>
                                        <tr class="text-center">
                                            <td colspan="4">
                                                <b
                                                    >Total Success
                                                    Transaction:</b
                                                >
                                            </td>
                                            <td>
                                                <STRONG class="text-success"
                                                    >Rp.{{
                                                        number_format(
                                                            $totalSuccess,
                                                            0,
                                                            ",",
                                                            "."
                                                        )
                                                    }}</STRONG
                                                >
                                            </td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan="4">
                                                <b>Total All:</b>
                                            </td>
                                            <td>
                                                <STRONG class="text-primary"
                                                    >Rp.{{
                                                        number_format(
                                                            $total,
                                                            0,
                                                            ",",
                                                            "."
                                                        )
                                                    }}</STRONG
                                                >
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <footer class="text-center">
                <p class="fw-bold">
                    {{ config("app.name") }} &copy {{ date("Y") }}
                </p>
            </footer>
        </div>

        <script>
            window.print();
        </script>
    </body>
</html>
