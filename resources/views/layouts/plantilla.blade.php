<!DOCTYPE html>
<html lang="en">

<head>
  <title>Gabinete MX</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Imagenes/logo.ico" />

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="css/Style.css">
  <link href="{{ asset('css/Style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style_comen.css') }}" rel="stylesheet">
  <!-- Compiled and minified JavaScript -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
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
  <script src="{{ asset('js/JQuery.js') }}"></script>
  <script src="js/JQuery.js"></script>
  <script src="js/Main.js"></script>
  <script type="text/javascript" src="js/tablesorter.source.js"> </script>
</head>

<body>
    <div class="contenedor">
        <div class="header">
           <!-- Haeader barra sub INICIO-->
  <div class="barsub">
                <div class="logoDiv">
                  <a href="{{route('index')}}">
                    <img class="logo" src="/Imagenes/logo.png" alt="GabineteMX" >
                  </a>
                </div>
                <div class="menuDiv">
                    <a class="dropdown-trigger btnMenu" href='#' data-target='dropdown1'><i class="small material-icons">toc</i></a>
                    <ul id='dropdown1' class='dropdown-content dropMenu'>
                        <li><a class="ct" href="#!">Pedidos</a></li>
                        <li><a class="ct" style="font-size: 15px;" href="#!">Devoluciones</a></li>
                        <li class="divider" tabindex="-1"></li>
                        <li><a class="ct" href="#!">Cuenta</a></li>
                        <li><a class="ct" style="font-size: 15px;" href="#!">Compras</a></li>
                        <li><a class="ct" style="font-size: 15px;" href="#!">Dirección</a></li>
                      </ul>
                </div>
                <div class="buscarDiv">
                    <nav  class="buscador">
                        <div class="nav-wrapper">
                          <form action="/buscarproducto?=search" method="GET">
                            <div class="input-field">
                              <input class="buscardor grey-text text-darken-4" id="search" id="search" name="search" type="search">
                              <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            </div>
                          </form>
                        </div>
                    </nav>
                </div>
                <div class="fotoperfilDiv">
                  <a class='dropdown-trigger colortext' data-target='dropdown3'>  <i class="small material-icons" >account_box</i>  </a>
                  <ul id='dropdown3' class='dropdown-content dropmenu'>
                    <li class="blue-text text-darken-2"></li>
                  </ul>
                    
                </div>
                @guest
                <div class="nombreperfilDiv">
                    <a href="{{route('login')}}" class="waves-effect waves-light btn btnIng">Ingresar</a>
                </div>

                @else
                <div class="nombreperfilDiv">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" >
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
          <a href="{{ route('carrito') }}"><i class="small material-icons">add_shopping_cart</i> </a>
              </div>
              </form>
            </div>
            <!-- Haeader barra sub FIN-->
          <!-- Haeader barra inf INICIO-->
          <div class="barinf">
            <?php $categorias = DB::select("SELECT * FROM familia;"); ?>
            <div class="marizq"></div>
                <div class="ejecutivaDiv">
                    Ejecutiva  
                </div>
                <div class="trabajoDiv">
                    Trabajo   
                </div>
                <div class="gamerDiv">
                    Gamer   
                </div>
                
                <div class="hardwareDiv">

                    <a class='dropdown-trigger colortext' href='#' data-target='dropdown2'>Hardware</a>
                    <!-- Dropdown Structure -->                         
                    <ul id='dropdown2' class='dropdown-content dropmenu'>
                      @foreach ($categorias as $categoria)
                    <li class="blue-text text-darken-2"><a class="dropmenu" href="{{route('buscarproducto',['cate' => $categoria->id_familia])}}">{{$categoria->nom_fami}}</a></li>
                      @endforeach
                    </ul>
                </div>
                <div class="gadetsDiv">
                    Gadgets   
                </div>
                <div class="masbuscadoDiv">
                    Mas buscado   
                </div>
                <div class="mascalificadoDiv">
                    Mejor calificado   
                </div>
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
                <li><a class="grey-text text-lighten-3" href="{{route('ayuda')}}">Servicio al cliente</a></li>
                <li><a class="grey-text text-lighten-3" href="{{route('ayuda')}}">Contacto</a></li>
                <li><a class="grey-text text-lighten-3" href="{{route('ayuda')}}">Rastrear</a></li>
                <li><a class="grey-text text-lighten-3" href="{{route('ayuda')}}">Chat</a></li>
                <li><a class="grey-text text-lighten-3" href="{{route('ayuda')}}">Informción corporativa</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="footer-copyright">
          <div class="container">
            Aviso de privacidad
            <a class="grey-text text-lighten-4 right" href="#!">Terminos y codiciones</a>
          </div>
        </div>
      </footer>

    </div>
  </div>
  <script> (function(b,c){var e=document.createElement('link');e.rel='stylesheet',e.type='text/css',e.href='https://chatboxlive.blahbox.net/static/css/main.css',document.getElementsByTagName('head')[0].appendChild(e); var f=document.createElement('script');f.onload=function(){var g;if(c)g='previewInit';else{var h=document.createElement('div');g='cbinit',h.id='cbinit',document.body.append(h)} console.log(document.querySelector('#'+g)),chatbox.initChat(document.querySelector('#'+g),b,c)},f.src='https://chatboxlive.blahbox.net/static/js/chat-lib.js',document.getElementsByTagName('head')[0].appendChild(f)}) ('67fdf26bb08d7701422d77bc25cfa268', 0); </script>
</body>

</html>