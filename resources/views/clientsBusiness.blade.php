@extends('layouts.app')

@section('content')
<style>
.card {
    text-align: center;
    transition: .2s;
}

a {
    text-decoration: none;
    color: black;
}
</style>
<div class="container-fluid d-inline justify-content-center">

    <div class="row mx-auto" style="margin-top:10%;">
        <div class="col-md-3">
        </div>
        <div class="col-md-4 ">
            <a href="/user">
                <div class="card mx-auto">
                    <h5 class="card-header">
                        Klienci
                    </h5>
                    <div class="card-body">
                        <p class="card-text">
                            Zarządzaj bazą klientów
                        </p>
                    </div>

                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="/">
                <div class="card mx-auto">
                    <h5 class="card-header">
                        Firmy
                    </h5>
                    <div class="card-body">
                        <p class="card-text">
                            Zarządzaj bazą firm
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-5">
        </div>
        <div style="margin-top:1%;" <div class="col-md-4">
            <a href="/address">
                <div class="card">
                    <h5 class="card-header">
                        Adresy
                    </h5>
                    <div class="card-body">
                        <p class="card-text">
                            Zarządzaj bazą adresów
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>


</div>
</div>
@endsection