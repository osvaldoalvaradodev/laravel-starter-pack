@extends('templates.main')

@section('content')
    <div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons">notifications</i>
            </button>
            <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton1">
                <div class="card-header text-center text-muted">
                    Notificaciones
                </div>
                <ul class="list-group scroll-style" style="max-height:30vh;max-width:320px">
                    <a class="list-group-item d-flex w-100 justify-content-between">
                        <i class="material-icons">notifications</i>
                        <span>
                            <b>Notificacion</b>
                            <span>Notificacion</span>
                        </span>
                    </a>
                    <a class="list-group-item d-flex w-100 justify-content-between">
                        <i class="material-icons">notifications</i>
                        <span>
                            notificacion
                        </span>
                    </a>
                </ul>
                <div class="card-footer text-center text-muted">
                    Ver todas
                </div>
            </div>
        </div>
    </div>
@stop