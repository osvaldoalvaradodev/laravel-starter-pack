@extends('templates.main')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
              <div class="card-header">
                <h2 align="center">
                    @if ($user->id)
                        <i class="material-icons fs-1">description</i>Detalles de Usuario
                    @else
                        <i class="material-icons fs-1">add_box</i>Agregar Usuario
                    @endif
                </h2>
              </div>
              <form method="post" action="{{url('config/users/store')}}">
                <div class="card-body">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{ $user->id }}">
                  <div class="form-group">
                      <label>Nombre Usuario</label>
                      <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email"  value="{{$user->email}}" required>
                  </div>
                  @if ($user->id)
                    <div class="form-group">
                        <div class="form-group form-check mb-1">
                          <input type="checkbox" class="form-check-input" name="newpassword" id="renovar" value="1">
                          <label class="form-check-label" for="renovar">Renovar Password</label>
                        </div>      
                        <input type="text" class="form-control" name="password" id="password" length="6" disabled>
                    </div>
                  @else
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" length="6" required>
                    </div>
                  @endif
                  <br>
                </div>
                <div class="card-footer d-flex  justify-content-between">
                  <button type="submit" class="btn btn-success ">
                      <i class="material-icons">done</i>
                      Guardar
                  </button>
                  @if ($user->id)
                    <a  href="{{ url('/') }}/users/{{$user->id}}/delete" class="btn btn-danger">
                        <i class="material-icons">clear</i>
                        Eliminar
                    </a>
                  @endif
                </div>
              </form>
            </div>
            <script>
              var renovar = document.getElementById('renovar');
              var password = document.getElementById('password');
        
              renovar.onchange = function(){
                if(this.checked){
                  password.disabled=false;
                  password.required=true;
                }else{
                  password.disabled=true;
                  password.required=false;
                  password.value='';
                }
              };
        
            </script>
        </div>
    </div>
@stop