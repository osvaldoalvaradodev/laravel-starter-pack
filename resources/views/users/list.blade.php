@extends('templates.main')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css"/>
<style>
    #tabla_filter{
        text-align: right;
    }
    #tabla_paginate .pagination{
        justify-content: flex-end
    }
</style>
@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Lista de Usuarios</h1>
            <a  href="{{ url('config/users/add')}}" class="btn btn-success">
                <i class="material-icons">add</i>
                Agregar Usuario
            </a>
        </div>
        <table id="tabla" class="table table-striped table-sm table-bordered" style="width:100%" >
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="FormModal" tabindex="-1" aria-labelledby="FormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="FormModalLabel">Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/af-2.3.3/fc-3.2.5/fh-3.1.4/sc-2.0.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>
    <script src="{{url('/js/datatable.es.js')}}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#tabla').DataTable({
                responsive: true,                
                fixedHeader: {
                    headerOffset: 0
                },
                "pageLength": 100,
                "processing" : true,
                "serverSide" : true,
                "ajax" : "{{ url('config/users/getdata') }}",
                "columns": [
                    { "data": "name","width":"60%"},
                    { "data": "email","width":"40%"},
                    { data: "id", render : function ( data, type, row, meta ) {
                        return '<a class="btn btn-light material-icons" href="{{ url("config/users")}}/'+data+'" >description</a>';
                    },"width":"1%"},
                ],
                language: lenguaje_es,
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
 @stop