<div class="modal " id="#eliminarproducto{{ $resultados->id_produc }}">
    <div class="modal-content">
        <!--Body-->
        <div class="modal-body">



            <span class="label label-primary" style="color: black; font-weight: bold; ">TIPO DE
                PRODUCTO:&nbsp;&nbsp;&nbsp;</span> <label>{{ $resultados->nom_fami }}</label><br>


            <span class="label label-primary"
                style="color: black; font-weight: bold; ">SUBTIPO:&nbsp;&nbsp;&nbsp;</span>
            <label>{{ $resultados->name }}</label><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">MARCA:&nbsp;&nbsp;&nbsp;</span>
            <label>{{ $resultados->nom }}</label><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">NOMBRE:&nbsp;&nbsp;&nbsp;</span>
            <label>{{ $resultados->titulo }}</label><br>

            <span class="label label-primary"
                style="color: black; font-weight: bold; ">DESCRIPCION:&nbsp;&nbsp;&nbsp;</span>
            <label>{{ $resultados->datos }}</label> <br>



            <!--EndBody-->
        </div>
        <div class="modal-footer">
            <form action="{{ url("actualizarproducto/{$resultados->id_produc}") }}" method="POST"
                enctype="multipart/form-data">
                @method('DELETE')
                {{ csrf_field() }}
                <button type="submit" class="modal-close waves-effect waves-green btn-flat">ELIMINAR</button>
                {{-- <a href="actualizarproducto{{ $resultados->id_produc }}" class="modal-close waves-effect
                waves-green btn-flat">¡ELIMINAR!</a> --}}

            </form>

            <button class="modal-action modal-close waves-effect waves-red btn red lighten-1">Cerrar</button>
        </div>
    </div>
</div>