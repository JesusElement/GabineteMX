<style>
    /* .modal { max-height: 100%; overflow: visible;} */
    .custombaja.open {
        width: 35%;
        max-height: 100%;
        height: 95%;
        top: 0 !important;
    }
</style>
<div class="modal custombaja " id="#bajapromocion{{ $resultados->id_produc }}">
    <div class="modal-content">
        <!--Body-->
        <div class="modal-body">

            <span class="label label-primary" style="color: black; font-weight: bold; ">ID OFERTA:
                &nbsp;&nbsp;&nbsp;</span> <label>{{ $resultados->id_oferta }}</label><br><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">ID
                PRODUCTO:&nbsp;&nbsp;&nbsp;</span>
            <label>{{ $resultados->id_produc }}</label><br><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">NOMBRE DEL
                PRODUCTO:&nbsp;&nbsp;&nbsp;</span>
            <label>{{ $resultados->titulo }}</label><br><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">FECHA DE
                INICIO:&nbsp;&nbsp;&nbsp;</span>
            <label>{{ $resultados->fech_ini }}</label><br><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">FECHA DE
                TERMINO:&nbsp;&nbsp;&nbsp;</span>
            <label>{{ $resultados->fech_ter }}</label><br><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">HORA DE
                INICIO:&nbsp;&nbsp;&nbsp;</span>
            <label>{{ $resultados->hora_ini }}</label> <br><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">HORA DE
                TERMINO:&nbsp;&nbsp;&nbsp;</span>
            <label>{{ $resultados->hora_ter }}</label> <br><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">PORCENTAJE DE
                DESCUENTO:&nbsp;&nbsp;&nbsp;</span>
            <label>{{ $resultados->desc }}%</label> <br><br>

            <span class="label label-primary" style="color: black; font-weight: bold; ">PRECIO
                NORMAL:&nbsp;&nbsp;&nbsp;</span>
            <label>${{ $resultados->prec_uni }}</label> <br><br>


            <span class="label label-primary" style="color: black; font-weight: bold; ">PRECIO CON
                DESCUENTO:&nbsp;&nbsp;&nbsp;</span>
            <label>${{ $resultados->prec_final }}</label> <br>


            <?php
            try{
                        $carpeta = @scandir("./Imagenes/Productos/$resultados->nom_fami/$resultados->nom/$resultados->id_produc");
                        if (count($carpeta)>2){
                            $d = opendir("./Imagenes/Productos/$resultados->nom_fami/$resultados->nom/$resultados->id_produc/");
                                while (($e = readdir($d)) != false)
                                    if ($e != '.' && $e != '..') {
                                         $e1 = "/Imagenes/Productos/$resultados->nom_fami/$resultados->nom/$resultados->id_produc/" . $e;
                                            echo "<img   src='$e1'  style=' width: 30%; height: 30%;     position: sticky;' >  ";
                                    
                                    }
                        }else{
                            echo "<img   src='/imagenes/nodisponible.jpg'  style=' width: 30%; height: 30%;     position: sticky;' >  ";
                        }
            
            
                    }catch (\Throwable $th) {
                      echo "<img   src='/imagenes/nodisponible.jpg'  style=' width: 30%; height: 30%;     position: sticky;' >  ";
                    }
                        ?>
            <!--EndBody-->
        </div>
        <div class="modal-footer">
            <form action="{{ url("/admin/bajapromocion/{$resultados->id_produc}") }}"
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