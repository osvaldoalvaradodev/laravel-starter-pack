@extends('templates.main')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/date-1.1.1/fh-3.2.1/r-2.2.9/datatables.min.css"/>
<style>
    #tabla_filter{
        text-align: right;
    }
    #tabla_paginate .pagination{
        justify-content: flex-end
    }
</style>
@section('content')
    <div class="card m-4 navbar-color text-white">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2><i class="material-icons fs-1">domain</i> Lista de clientes</h2>
                <a class="btn btn-success" onclick="agregar()">
                    <i class="material-icons">add</i>
                    Agregar
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-sm table-bordered text-white" style="width:100%" >
                <thead>
                    <tr>
                        <th>Nº</th>
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
    <div class="modal fade" id="FormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="Form">
                    <div class="modal-header">
                        <h5 class="modal-title">Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"> <i class="material-icons">save</i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/date-1.1.1/fh-3.2.1/r-2.2.9/datatables.min.js"></script>
    
    <script src="{{url('/js/datatable.es.js')}}"></script>
    <script>
        var Form = document.getElementById("Form");
        var FormModal = new bootstrap.Modal(document.getElementById("FormModal"), {});

        function agregar(){
            Form['id'].value=0;
            Form.reset();
            FormModal.show();
        }

        function modificar(id){
            axios.get("{{url('/admin/client')}}/"+id)
            .then(res => {
                if(typeof res.data  === 'object'){
                    Object.keys(res.data).forEach(key => {
                        if(Form[key]){
                            Form[key].value=res.data[key]
                        }
                    });
                    FormModal.show();
                }else{
                    alert('Error: '+res.data);
                }
            });
        }

        function eliminar(id,name){
            if (confirm("¿Quiere eliminar "+name+" de la lista de clientes?")) {
                axios.get("{{url('/admin/client')}}/"+id+"/delete")
                .then(res => {
                    if(typeof res.data  === 'object'){
                        table.ajax.reload();
                    }else{
                        alert('Error: '+res.data);
                    }
                });
            }
        }

        Form.addEventListener('submit', (ev) => {
            ev.preventDefault();
            var formData = new FormData(Form);
            axios.post("{{url('/admin/client/store')}}",formData)
            .then(res => {
                if(typeof res.data  === 'object'){
                    FormModal.hide();
                    table.ajax.reload();
                }else{
                    alert('Error: '+res.data);
                }
            });
        });

        var table = $('#tabla').DataTable({
            responsive: true,          
            dom: '<"row"<"col-12 mb-2"B><"col-12 col-sm-6"l><"col-12 col-sm-6"f><"col-12"t><"col-12 col-sm-6"i><"col-12 col-sm-6"p>>',
            buttons: [
                {
                    extend:    'excelHtml5',
                    text:      '<i class="material-icons">grid_on</i> Excel',
                    className: 'btn-success',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="material-icons">picture_as_pdf</i> Pdf',
                    className: 'btn-danger',
                    titleAttr: 'PDF'
                }
            ], 
            fixedHeader: {
                headerOffset: 0
            },     
            "processing" : true,
            "serverSide" : true,
            "ajax" : "{{ url('admin/client/getdata') }}",
            "columns": [
                { "data": "id","width":"1%"},
                { "data": "name","width":"45%"},
                { "data": "email","width":"45%"},
                { data: "id", render : function ( data, type, row, meta ) {
                    var buttons = '<div class="btn-group" role="group" aria-label="Basic mixed styles example">';
                    buttons+= '<button type="button" class="btn btn-primary" onclick="modificar('+data+')" title="Editar"><i class="material-icons">edit</i></button>';
                    buttons+= '<button type="button" class="btn btn-danger" onclick="eliminar('+data+',\''+row.name+'\')" title="Eliminar"><i class="material-icons">delete</i></button>';
                    buttons+= '</div>';
                    return buttons;
                },"width":"1%"},
            ],
            language: lenguaje_es,
            "order": [[ 1, "desc" ]]
        });


    </script>
 @stop