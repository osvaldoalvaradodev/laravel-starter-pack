@extends('templates.main')
@section('content')
  <div class="container pt-3" align="center">
    <div class="card" style="width: 22rem;" align="left">
      <div class="card-body">
        <h4 class="card-title mb-4">
          <i class="material-icons fs-3">vpn_key</i> Cambiar Contraseña
        </h4>
        <form method="post" action="{{url('sesion/passwordchange/process')}}" id="form">
        {{csrf_field()}}
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Contraseña Actual</label>
          <input type="password" class="form-control" placeholder="*****" name="oldpassword" id="oldpassword" required>
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Contraseña Nueva</label>
          <input type="password" class="form-control" placeholder="*******" name="newpassword" id="newpassword" required>
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput2" class="form-label">Contraseña Nueva (Repetir)</label>
          <input type="password" class="form-control"  placeholder="*******" name="password" id="password" required>
          <div class="invalid-feedback">
            Las Contraseña no coinciden
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success w-100" id="guardar">
            <i class="material-icons">done</i>
            Guardar
        </button>
        </form>
    </div>
  </div>
<script>
    var newpassword =document.getElementById('newpassword');
    var password =document.getElementById('password');
    var guardar =document.getElementById('guardar');
    var form =document.getElementById('form');

    password.onkeyup = function(){
        if(newpassword.value!=password.value){
            password.classList.add('is-invalid');
            guardar.disabled=true;
            form.disabled=true;
        }else{
            password.classList.remove('is-invalid');
            guardar.disabled=false;
            form.disabled=false;
        }
    }
</script>
@stop