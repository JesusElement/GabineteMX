<style>
    /* .modal { max-height: 100%; overflow: visible;} */
    .custombaja.open {
      width: 35%;
      max-height: 100%;
      height: 35%;
      top: 0 !important;
    }
  </style>
<div class="modal custombaja " id="#bajaproveedores{{ $resultados->id_provee}}">
    <div class="modal-content">
        <!--Body-->
        <div class="modal-body">

            <span class="label label-primary" style="color: black; font-weight: bold; ">ID PROVEEDOR:
                &nbsp;&nbsp;&nbsp;</span> <label >{{ $resultados->id_provee }}</label><br><br> 

            <span class="label label-primary" style="color: black; font-weight: bold; ">NOMBRE:&nbsp;&nbsp;&nbsp;</span>
            <label >{{ $resultados->nom }}</label><br><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">RFC:&nbsp;&nbsp;&nbsp;</span>
            <label >{{ $resultados->rfc }}</label><br><br>
            
                <br>
          
            <!--EndBody-->
        </div>
        <div class="modal-footer">
            <form action="{{ url("/admin/bajaproveedores/{$resultados->id_provee}") }}"
                method="POST" enctype="multipart/form-data">
                @method('DELETE')
                {{ csrf_field() }}

                <button type="submit"
                    class="modal-close waves-effect waves-green btn deep-orange accent-4">ELIMINAR</button>
                {{-- <a href="actualizarproducto{{ $resultados->id_produc }}" class="modal-close
                waves-effect
                waves-green btn-flat">¡ELIMINAR!</a> --}}

            </form>

            <button class="modal-action modal-close waves-effect waves-red btn blue-grey lighten-2">Cerrar</button>
        </div>
    </div>
</div>