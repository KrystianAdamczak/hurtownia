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

    <div class="row mx-auto h-100" style="margin-top:10%;">
        <div class="col-md-3">
        </div>
        <div class="col-md-4 ">
            <a href="#">
                <div class="card mx-auto">
                    <h5 class="card-header">
                        Produkty
                    </h5>
                    <div class="card-body">
                        <p class="card-text">
                            Zarządzaj treścią produktów
                        </p>
                    </div>

                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="/category">
                <div class="card mx-auto">
                    <h5 class="card-header">
                        Kategorie
                    </h5>
                    <div class="card-body">
                        <p class="card-text">
                            Zarządzaj treścią kategorii
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection