@extends('templates.main')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
<style>
    #tabla_filter{
        text-align: right;
    }
    #tabla_paginate .pagination{
        justify-content: flex-end
    }
</style>
@section('content')
    <div class="card">
        
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2><i class="material-icons fs-1">people</i> Lista de Usuarios</h2>
                <a  href="{{ url('config/users/add')}}" class="btn btn-success">
                    <i class="material-icons">add</i>
                    Agregar Usuario
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped table-sm table-bordered bg-white" style="width:100%" >
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
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-danger text-white">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="DeleteModalLabel">
                        <i class="material-icons">warning</i> Eliminar Usuario <i class="material-icons">warning</i>
                    </h5>
                </div>
                <div class="modal-body">
                    ¿Realmente desea eliminar a <span id="DeleteModalName"></span> de la lista de usuarios?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons">close</i> Cancelar</button>
                    <button type="button" class="btn btn-outline-light"><i class="material-icons">delete</i> Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/af-2.3.3/fc-3.2.5/fh-3.1.4/sc-2.0.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{url('/js/datatable.es.js')}}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#tabla').DataTable({
                responsive: true,                
                fixedHeader: {
                    headerOffset: 0
                },
                "processing" : true,
                "serverSide" : true,
                "ajax" : "{{ url('config/users/getdata') }}",
                "columns": [
                    { "data": "name","width":"60%"},
                    { "data": "email","width":"40%"},
                    { data: "id", render : function ( data, type, row, meta ) {
                        var buttons = '<div class="btn-group" role="group" aria-label="Basic mixed styles example">';
                        buttons+= '<a class="btn btn-primary" href="{{ url("config/users")}}/'+data+'" title="Editar"><i class="material-icons">edit</i></a>';
                        buttons+= '<button type="button" class="btn btn-danger" onclick="deleteShow('+data+')" title="Eliminar"><i class="material-icons">delete</i></button>';
                        buttons+= '</div>';
                        return buttons;
                    },"width":"1%"},
                ],
                language: lenguaje_es,
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
 @stop