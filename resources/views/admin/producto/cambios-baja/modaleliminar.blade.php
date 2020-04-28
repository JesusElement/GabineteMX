<div class="modal " id="#eliminarproducto{{ $resultados->id_produc }}">
    <div class="modal-content">
        <!--Body-->
        <div class="modal-body">

            <label>TIPO DE PRODUCTO </label><br>

            <label>{{ $resultados->nom_fami }}</label><br>

            <label>SUBTIPO </label><br>
            <label>{{ $resultados->name }}</label><br>

            <label>MARCA</label><br>
            <label>{{ $resultados->nom }}</label><br>

            <label>NOMBRE </label><br>
            <label>{{ $resultados->titutlo }}</label><br>
            
            <label>DESCRIPCION</label><br>
            <label>{{ $resultados->datos }}</label> <br>

        <!--EndBody-->
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">¡ELIMINAR!</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn red lighten-1">Cerrar</a>
        </div>
    </div>
</div>