<!DOCTYPE html>
<html lang="en">

<head>

  <title>Gabinete MX</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="Imagenes/logo.ico" />

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="css/Style.css">
  <link href="{{ asset('css/Style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style_comen.css') }}" rel="stylesheet">
  <!-- Compiled and minified JavaScript -->
  <script src="{{ asset('js/JQuery.js') }}"></script>
  <script src="https://unpkg.com/vue"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="{{ asset('js/Main.js') }}"></script>

  <!-- <script src="js/JQuery.js"></script>-->
  <!-- <script src="js/Main.js"></script>
  <script type="text/javascript" src="js/tablesorter.source.js"> </script>
  <!-- Load the TableSorter plugin. -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.21.5/js/jquery.tablesorter.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert2.all.min.js"></script>
  <!--<script src="{{ asset('js/app.js') }}"></script>-->
</head>

<body>

  <div class="contenedor">
    <div class="header">
      <!-- Haeader barra sub INICIO-->
      <div class="barsub">
        <div class="logoDiv">
          <a href="{{ route('index') }}">
            <img class="logo" src="/Imagenes/logo.png" alt="GabineteMX">
          </a>
        </div>
        <div class="menuDiv">
        </div>
        <div class="buscarDiv">
          <nav class="buscador">
            <div class="nav-wrapper">
              <form action="{{ url('/buscarproductoS') }}" method="GET" role="form">
                {{ csrf_field() }}
                <div class="input-field">
                  <input class="buscardor grey-text text-darken-4" name="search" id="search" type="search">
                  <label class="label-icon" for="search"><i
                      class="material-icons">{{ 'search' }}</i></label>
                </div>
              </form>
            </div>
          </nav>
        </div>

        @guest
          <div class="nombreperfilDiv">
            <a href="{{ route('login') }}" class="waves-effect waves-light btn btnIng">Ingresar</a>
          </div>

        @else
          <div class="fotoperfilDiv">
            <a class='dropdown-trigger btnMenu' data-target='dropdown3'><i class="small material-icons">account_box</i>
            </a>
            <ul id='dropdown3' class='dropdown-content dropmenu'>
              <li class="blue-text text-darken-2"><a class="dropmenu" href="{{ route('CuentaCli') }}">
                  Mi Cuenta </a></li>
              <li class="blue-text text-darken-2"><a class="dropmenu" href="{{ route('verped') }}">
                  Mis Pedidos </a></li>
              <li class="blue-text text-darken-2"><a class="dropmenu"
                  href="{{ url('ayuda',['tip' => 'SAC']) }}">
                  Ayuda </a></li>
            </ul>
          </div>

          <div class="nombreperfilDiv">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">
                Salir
              </button>
            </form>
          </div>
        @endguest

        <div class="ubicacionDiv">
          <p style="font-size: 10px;">Ubicación</p>
          <p style="display: inline;">Cuautitlán</p>
          <i class="material-icons">place</i>
        </div>

        <div class="carritoDiv">
          <a class=" NumProductosCarrito" href="{{ route('verCarrito') }}"><i
              class="material-icons iconProductosCarrito">shopping_cart</i>
            @guest

            @else
              @php
                $id = auth()->user()->id_cliente;
                $NumP = DB::select("SELECT sum(cantidad) as N FROM carrito where id_cliente = '$id'");
              @endphp
              @foreach($NumP as $item)
                {{ $item->N }}
              @endforeach
            @endguest
          </a>
        </div>
        </form>
      </div>
      <!-- Haeader barra sub FIN-->
      <!-- Haeader barra inf INICIO-->
      <div class="barinf">




        <?php $categorias3 = DB::select("SELECT * FROM familia WHERE id_familia != 000000000 && id_familia = '210420EQE'"); ?>
        @foreach($categorias3 as $categoria3)
          <a class="ejecutivaDiv"
            href="{{ url("buscarproducto/{$categoria3->nom_fami}") }}">
            Ejecutiva
          </a>
        @endforeach






        <?php $categorias2 = DB::select("SELECT * FROM familia WHERE id_familia != 000000000 && id_familia = '210420EQT'"); ?>
        @foreach($categorias2 as $categoria2)
          <a class="trabajoDiv" href="{{ url("buscarproducto/{$categoria2->nom_fami}") }}">
            Trabajo
          </a>
        @endforeach




        <?php $categorias = DB::select("SELECT * FROM familia WHERE id_familia != 000000000 && id_familia = '210420EQG'"); ?>
        @foreach($categorias as $categoria)
          <a class="gamerDiv" href="{{ url("buscarproducto/{$categoria->nom_fami}") }}">
            Gamer
          </a>
        @endforeach




        <?php $categorias = DB::select("SELECT * FROM familia WHERE id_familia != 000000000 && id_familia != '210420EQU'"); ?>
        <div class="hardwareDiv">

          <a class='dropdown-trigger colortext' href='#' data-target='dropdown2'>Hardware</a>
          <!-- Dropdown Structure -->
          <ul id='dropdown2' class='dropdown-content dropmenu'>
            @foreach($categorias as $categoria)
              <li class="blue-text text-darken-2"><a class="dropmenu"
                  href="{{ url("buscarproducto/{$categoria->nom_fami}") }}">{{ $categoria->nom_fami }}</a>
              </li>
            @endforeach
          </ul>
        </div>



        <?php $categoriasx = DB::select("SELECT * FROM familia WHERE id_familia != 000000000 && id_familia = '210420ACC'"); ?>
        @foreach($categoriasx as $categoriax)
          <a class="gadetsDiv" href="{{ url("buscarproducto/{$categoriax->nom_fami}") }}">
            Gadgets
          </a>
        @endforeach



        <div class="salirDiv">

        </div>
        <div class="marder">

        </div>
      </div>
      <!-- Haeader barra inf FIN-->

    </div>
    <div class="containeer">
      @yield('seccion')
    </div>

    <div class="footer">
      <footer class="page-footer footerCcc">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">¿Quienes somos?</h5>
              <p class="grey-text text-lighten-4">
                Nuestros productos están enfocados para expertos, aficionados de tecnologias, asi como, empresas que se
                encuentran en el ramo de las TI.


              </p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Ayuda</h5>
              <ul>
                <li><a class="grey-text text-lighten-3"
                    href="{{ url('ayuda',['tip' => 'SAC']) }}">Servicio
                    al cliente</a></li>
                <li><a class="grey-text text-lighten-3"
                    href="{{ url('ayuda',['tip' => 'CONT']) }}">Contacto</a>
                </li>
                <li><a class="grey-text text-lighten-3"
                    href="{{ url('ayuda',['tip' => 'RAST']) }}">Rastrear</a>
                </li>
                <li><a class="grey-text text-lighten-3"
                    href="{{ url('ayuda',['tip' => 'ICORP']) }}">Informción
                    corporativa</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="footer-copyright">
          <div class="container">
            <a class="grey-text text-lighten-4 left"
              href="{{ url('ayuda',['tip' => 'AVP']) }}">Aviso
              de privacidad</a>

            <a class="grey-text text-lighten-4 right"
              href="{{ url('ayuda',['tip' => 'TEC']) }}">Terminos
              y codiciones</a>
          </div>
        </div>
      </footer>

    </div>
  </div>
  <script>
    (function (b, c) {
      var e = document.createElement('link');
      e.rel = 'stylesheet', e.type = 'text/css', e.href = 'https://chatboxlive.blahbox.net/static/css/main.css',
        document.getElementsByTagName('head')[0].appendChild(e);
      var f = document.createElement('script');
      f.onload = function () {
          var g;
          if (c) g = 'previewInit';
          else {
            var h = document.createElement('div');
            g = 'cbinit', h.id = 'cbinit', document.body.append(h)
          }
          console.log(document.querySelector('#' + g)), chatbox.initChat(document.querySelector('#' + g), b, c)
        }, f.src = 'https://chatboxlive.blahbox.net/static/js/chat-lib.js', document.getElementsByTagName('head')[0]
        .appendChild(f)
    })('67fdf26bb08d7701422d77bc25cfa268', 0);
  </script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>

</body>

</html>