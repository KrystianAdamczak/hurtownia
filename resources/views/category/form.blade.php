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
                Edycja kategorii
                @else
                Dodanie kategorii
                @endif
            </h1>


            <form id="category-form" class=" mt-5" method="post"
                @if(isset($edit) && $edit===true)
                    action="{{ route('category.update', $category->id) }}" 
                @else
                    action="{{ route('category.store') }}"
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

                <p>* - pola wymagane</p>

            
                <labal for="name"> Nazwa* </label>

               
                <input type="text" class="form-control" id="name" placeholder="Wprowadź nazwę..." name="name" required
                @if(isset($edit) && $edit===true)
                value="{{$category->name}}"
                @endif
                >
                

                <a type="button" class="btn btn-primary mt-3" href="/category">Cofnij</a>


               <button class="btn btn-secondary mt-3">Akceptuj</button>
                
                

            </form>



        </div>
    </div>
</div>
@endsection