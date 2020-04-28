
<div class="modal " id="#actualizarproducto{{$resultados->id_produc}}">
  <div class="modal-content">
    <!--Body-->
    <div class="modal-body">
      <div class="input-field col s12 m6">
        <input value="{{ $resultados->titutlo }}" title="Solo puede ingresar letras en este campo." id="titutlo"
          type="text" class="validate" required>
        <label for="Primer nombre">Ingresa titulo</label>
      </div>

      <div class="input-field col s10 m6 push-s1">
        <input value="{{ $resultados->datos }}" title="Solo puede ingresar letras en este campo." id="descripcion"
          type="text" class="validate" required>
        <label for="Segundo nombre">Ingresa descripcion:</label>
      </div>
      <!--EndBody-->
      </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn red lighten-1" id="cerrarmodal">Cerrar</a>
    </div>
  </div>