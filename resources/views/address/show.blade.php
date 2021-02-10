@extends('layouts.app')

@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>

<div class="container">
    <div class="row justify-content-center mx-auto">
        <div class="col-md-8 ml-5">
            <h1 class="display-5">
                Szczegóły adresu ID {{$address->id}}
            </h1>
            


            <div class="card col-md-5 mt-3 ">
                <div class="card-header">
                   <b> # {{$address->id}} </b>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Kraj: <div style="text-align:right;">{{$address->country}}</li>
                    <li class="list-group-item">Województwo: <div style="text-align:right;">{{$address->voivodeship}}</div></li>
                    <li class="list-group-item">Powiat: <div style="text-align:right;">{{$address->county}}</div></li>
                    <li class="list-group-item">Gmina: <div style="text-align:right;">{{$address->community}}</div></li>
                    <li class="list-group-item">Ulica: <div style="text-align:right;">{{$address->street}}</div></li>
                    <li class="list-group-item">Nr domu: <div style="text-align:right;">{{$address->house_number}}</div></li>
                    <li class="list-group-item">Nr lokalu: <div style="text-align:right;">{{$address->apartment_number}}</div></li>
                    <li class="list-group-item">Miasto: <div style="text-align:right;">{{$address->city}}</div></li>
                    <li class="list-group-item">Kod pocztowy: <div style="text-align:right;">{{$address->postal_code}}</div></li>
                </ul>
            </div>
            <a type="button" class="btn btn-primary mt-3" href="/user">Cofnij</a>
            <a type="button" class="btn btn-secondary mt-3" href="/address">Cofnij do Adresy</a>
        </div>

    </div>
</div>
</div>
@endsection