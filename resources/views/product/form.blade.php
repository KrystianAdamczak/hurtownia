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
                Edycja produktu
                @else
                Dodanie produktu
                @endif
            </h1>


            <form id="product-form" class=" mt-5" method="post"
                @if(isset($edit) && $edit===true)
                    action="{{ route('product.update', $product->id) }}" 
                @else
                    action="{{ route('product.store') }}"
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

            
                <label for="name"> Nazwa </label>
                <input type="text" class="form-control" id="name" placeholder="Wprowadź nazwę..." name="name" required
                @if(isset($edit) && $edit===true)
                value="{{$product->name}}"
                @endif
                >
                <br>

                <label for="category_id"> Kategoria </label>
                <select class="form-control" id="category_id" name="category_id" required>
                @if(isset($edit) && $edit === true)
                <option value="{{$product->category->id}}" selected>{{$product->category->name}}</option>
                @else
                <option value="" selected disabled hidden>Wybierz kategorię...</option>
                @endif
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                </select>
                <br>

                <label for="count"> Ilość </label>
                <input type="text" class="form-control" id="count" placeholder="Wprowadź ilość..." name="count" required
                @if(isset($edit) && $edit===true)
                value="{{$product->count}}"
                @endif
                >
                <br>

                <label for="unit_price"> Cena jednostkowa zł </label>
                <input type="text" class="form-control" id="unit_price" placeholder="Wprowadź cenę jednostkową zł..." name="unit_price" required
                @if(isset($edit) && $edit===true)
                value="{{$product->unit_price}}"
                @endif
                >
                

                <a type="button" class="btn btn-primary mt-3" href="/product">Cofnij</a>


               <button class="btn btn-secondary mt-3">Akceptuj</button>
                
                

            </form>



        </div>
    </div>
</div>
@endsection