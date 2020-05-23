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

            <br><br>

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
            <form
                action="{{ url("/admin/gestionarproducto/{$resultados->id_produc}") }}"
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