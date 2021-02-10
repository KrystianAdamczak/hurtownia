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
            <h1 class="display-3">
                @if(isset($edit) && $edit === true)
                Edycja adresu
                @else
                Dodanie adresu
                @endif
            </h1>


            <form id="address-form" class=" mt-5" method="post"
                @if(isset($edit) && $edit===true)
                    action="{{ route('address.update', $address->id) }}" 
                @else
                    action="{{ route('address.store') }}"
                @endif
            >
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
            
                <label for="country"> Kraj </label>
                <select class="form-control" id="country" name="country" required>
                @if(isset($edit) && $edit === true)
                <option value="{{$address->country}}" selected>{{$address->country}}</option>
                @else
                <option value="" selected disabled hidden>Wybierz kraj...</option>
                @endif
                @foreach($addressess as $add)
                <option value="{{$add->country}}">{{$add->country}}</option>
                @endforeach
                </select>
                <br>

                <label for="voivodeship"> Województwo </label>
                <input type="text" class="form-control" id="voivodeship" placeholder="Wprowadź województwo..." name="voivodeship" required
                @if(isset($edit) && $edit===true)
                value="{{$address->voivodeship}}"
                @endif
                >
                <br>

                <label for="county"> Powiat </label>
                <input type="text" class="form-control" id="county" placeholder="Wprowadź powiat..." name="county" required
                @if(isset($edit) && $edit===true)
                value="{{$address->county}}"
                @endif
                >
                <br>

                <label for="community"> Gmina </label>
                <input type="text" class="form-control" id="community" placeholder="Wprowadź gminę..." name="community" required
                @if(isset($edit) && $edit===true)
                value="{{$address->community}}"
                @endif
                >
                <br>

                <label for="street"> Ulica </label>
                <input type="text" class="form-control" id="street" placeholder="Wprowadź ulicę..." name="street"
                @if(isset($edit) && $edit===true)
                value="{{$address->street}}"
                @endif
                >
                <br>

                <label for="house_number"> Nr domu </label>
                <input type="text" class="form-control" id="house_number" placeholder="Wprowadź nr domu..." name="house_number" required
                @if(isset($edit) && $edit===true)
                value="{{$address->house_number}}"
                @endif
                >
                <br>

                <label for="apartment_number"> Nr lokalu </label>
                <input type="text" class="form-control" id="apartment_number" placeholder="Wprowadź nr lokalu..." name="apartment_number"
                @if(isset($edit) && $edit===true)
                value="{{$address->apartment_number}}"
                @endif
                >
                <br>

                <label for="city"> Miasto </label>
                <input type="text" class="form-control" id="city" placeholder="Wprowadź miasto..." name="city" required
                @if(isset($edit) && $edit===true)
                value="{{$address->city}}"
                @endif
                >
                <br>

                <label for="postal_code"> Kod pocztowy </label>
                <input type="text" class="form-control" id="postal_code" placeholder="Wprowadź kod pocztowy..." name="postal_code" required
                @if(isset($edit) && $edit===true)
                value="{{$address->postal_code}}"
                @endif
                >

                

                <a type="button" class="btn btn-primary mt-3" href="/address">Cofnij</a>


               <button class="btn btn-secondary mt-3">Akceptuj</button>
                
                

            </form>



        </div>
    </div>
</div>
@endsection