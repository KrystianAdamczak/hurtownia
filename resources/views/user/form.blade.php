@extends('layouts.app')

@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

</head>

<div class="container">
    <div class="row justify-content-center mx-auto">
        <div class="col-md-8 ml-5">
            <h1 class="display-3">
                @if(isset($edit) && $edit === true)
                Edycja klienta
                @else
                Rejestracja klienta
                @endif
            </h1>


            <form id="user-form" class=" mt-5" method="post" @if(isset($edit) && $edit===true)
                action="{{ route('user.update', $user->id) }}" @else action="{{ route('user.store') }}" @endif>
                @csrf
                @if(isset($edit) && $edit===true)
                {{ method_field('put') }}
                @else
                {{ method_field('POST') }}
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <label for="name"> Imię </label>
                <input type="text" class="form-control" id="name" placeholder="Wprowadź imię..." name="name" required
                    @if(isset($edit) && $edit===true) value="{{$user->name}}" @endif>
                <br>

                <label for="second_name"> Drugie imię </label>
                <input type="text" class="form-control" id="second_name" placeholder="Wprowadź drugie imię..."
                    name="second_name" @if(isset($edit) && $edit===true) value="{{$user->second_name}}" @endif>
                <br>

                <label for="surname"> Nazwisko </label>
                <input type="text" class="form-control" id="surname" placeholder="Wprowadź nazwisko..." name="surname"
                    required @if(isset($edit) && $edit===true) value="{{$user->surname}}" @endif>
                <br>

                <label for="address_id"> Adres </label>
                <select class="form-control" id="address_id" name="address_id" required>
                    @if(isset($edit) && $edit === true)
                    <option value="{{$user->address_id}}" selected>{{$user->address->country}},
                    {{$user->address->voivodeship}}, {{$user->address->county}}, {{$user->address->community}},
                    {{$user->address->street}}, {{$user->address->house_number}}, {{$user->address->apartment_number}},
                    {{$user->address->city}}, {{$user->address->postal_code}}
                    </option>
                    @else
                    <option value="" selected disabled hidden>Wybierz adres...</option>
                    @endif
                    @foreach($addressess as $add)
                    <option value="{{$add->id}}">{{$add->country}}, {{$add->voivodeship}}, {{$add->county}},
                        {{$add->community}}, {{$add->street}}, {{$add->house_number}}, {{$add->apartment_number}},
                        {{$add->city}},{{$add->postal_code}}
                    </option>
                    @endforeach
                </select>
                <p>Nie ma adresu? <a href="{{route('address.create')}}">Dodaj go!</a>
                    <br><br>

                    <label for="phone_number"> Nr tel. </label>
                    <input type="text" class="form-control" id="phone_number" placeholder="Wprowadź nr telefonu..."
                        name="phone_number" required @if(isset($edit) && $edit===true) value="{{$user->phone_number}}"
                        @endif>
                    <br>

                    <label for="email"> Adres e-mail </label>
                    <input type="text" class="form-control" id="email" placeholder="Wprowadź adres e-mail..."
                        name="email" @if(isset($edit) && $edit===true) value="{{$user->email}}" @endif>
                    <br>

                    <label for="NIP"> NIP </label>
                    <input type="text" class="form-control" id="NIP" placeholder="Wprowadź NIP..." name="NIP"
                        @if(isset($edit) && $edit===true) value="{{$user->NIP}}" @endif>
                    <br>



                    <a type="button" class="btn btn-primary mt-3" href="/user">Cofnij</a>


                    <button class="btn btn-secondary mt-3">Akceptuj</button>

            </form>



        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('select').selectize({
        sortField: 'text'
    });
});
</script>
@endsection