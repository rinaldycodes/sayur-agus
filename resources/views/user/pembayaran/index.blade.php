@extends('templates.backend.master-admin') @section('title', 'Pembayaran' )
@section('content')
<!-- Page Heading -->
<div class="row align-items-center">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>
            </div>
            <div class="card-body">
                <p class="">
                    Ada beberapa macam cara pembayaran misalnya seperti di bawah
                    ini
                </p>
                <ul>
                    <li>
                        COD, yaitu pembayaran yang dilakukan setelah barang
                        sampai ditempat kamu
                    </li>
                    <li>
                        Transfer via Bank, yaitu anda transfer biaya ke bank
                        kami
                    </li>
                </ul>
                <hr />
                <h5 class="text-success">Konfirmasi Pembayaran</h5>
                <hr />
                <p>
                    Konfirmasi pembayaran via whatsapp:
                    <a
                        href="https://api.whatsapp.com/send?phone=6288299862278&text=Saya%20ingin%20melakukan%20konfirmasi%20pembayaran."
                    >
                        <h6>
                            <img
                                src="https://seeklogo.com/images/W/whatsapp-icon-logo-6E793ACECD-seeklogo.com.png"
                                alt="icon whatsapp"
                                height="40"
                                class="img-profile rounded-circle"
                            />
                            0882 9986 2278
                        </h6>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
