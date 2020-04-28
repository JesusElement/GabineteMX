<div class="modal " id="#eliminarproducto{{ $resultados->id_produc }}">
    <div class="modal-content">
        <!--Body-->
        <div class="modal-body">

            

            <span class="label label-primary" style="color: black; font-weight: bold; ">TIPO DE PRODUCTO:&nbsp;&nbsp;&nbsp;</span>   <label>{{ $resultados->nom_fami }}</label><br>

            
            <span class="label label-primary" style="color: black; font-weight: bold; ">SUBTIPO:&nbsp;&nbsp;&nbsp;</span>  <label>{{ $resultados->name }}</label><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">MARCA:&nbsp;&nbsp;&nbsp;</span>  <label>{{ $resultados->nom }}</label><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">NOMBRE:&nbsp;&nbsp;&nbsp;</span> <label>{{ $resultados->titutlo }}</label><br>
            
            <span class="label label-primary" style="color: black; font-weight: bold; ">DESCRIPCION:&nbsp;&nbsp;&nbsp;</span>   <label>{{ $resultados->datos }}</label> <br>

            

        <!--EndBody-->
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">¡ELIMINAR!</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn red lighten-1">Cerrar</a>
        </div>
    </div>
</div>