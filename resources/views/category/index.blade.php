@extends('layouts.app')

@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



</head>


<div class="container">
    <div class="row justify-content-center mx-auto">
        <div class="col-md-8 ml-5">
        <a type="button" class="btn btn-primary" href="{{ route('category.create') }}">Dodaj kategorię</a>
        <br><br>
            <table id="data-table" class="table table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                        <th>
                            Nazwa
                        </th>
                        <th style="width:1px;">
                            Akcje
                        </th>
                        <th style="width:1px;">

                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {

    var table = $('#data-table').DataTable({

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Polish.json"
        },

        processing: true,

        serverSide: true,

        responsive: true,

        ajax: "{{ route('category.index') }}",

        columns: [


            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
            {
                data: 'delete',
                name: 'delete',
                orderable: false,
                searchable: false
            },

        ]



    });

});


/*$(function() {
    $.getScript(
        "https://www.jqueryscript.net/demo/Delete-Confirmation-Dialog-Plugin-with-jQuery-Bootstrap/bootstrap-confirm-delete.js",
        function() {
            $('.delete').bootstrap_confirm_delete({
                heading: 'Usuń',
                message: 'Jesteś pewny, że chcesz usunąć ten rekord?'
            });
        });
});*/
</script>


@endsection