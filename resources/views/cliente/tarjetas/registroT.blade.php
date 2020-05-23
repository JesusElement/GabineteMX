@extends('layouts.plantilla')

@section('seccion')
<link rel="stylesheet" href="../css/tarjeta.css">

<div class="TarjetaGrid">

  <?php
if(isset($_GET['update'])){
  $tip = $_GET['update'];

if(!isset($real)){
    $real = "¿Que tramas?";

}
if(!isset($nom)){
  $nom = "¿Que tramas?";

}
}
elseif(isset($_GET['delete'])) {
  $tip = $_GET['delete'];
}
elseif(isset($_GET['create'])) {
  $tip = $_GET['create'];
}
else {
  $tip='create';
}

if($tip == 'update' || $tip== 'delete'){
  $id = $_GET['idcard'];
  $id= ($id*2)/263412432;

  $user = auth()->user()->id_cliente;
  $direc = DB::select('SELECT * FROM `cli_m_pago` WHERE id_cliente = ? && id_pago =? ', [$user,$id]);
foreach($direc as $value){
      $card= $value->num_tar;
      $nom = $value->nom_card; 
      $expi = $value->expi;
      $id=$value->id_pago;
      $id = ($id*263412432)/2;
   $key="Una oracion al santro padre 3425ytsdfhvbdfs ";
   list($encrypted_data, $iv) = explode('::', base64_decode($card), 2);
   $valor = openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
  $real = substr($valor,14,16);

}

}
?>

  <div class="MensajeT">
    @php
      if($tip == 'update'){
    @endphp
    <h3>Modifique los datos de la tarjeta</h3>
    <p>
      <h6>Con terminacion: {{ $real }}</h6>
    </p>
    @php
      }
      else if($tip == 'creacionT'){
    @endphp
    <h3>Ingrese tu tarejta de credito o debito</h3>
    @php
      }
      else if($tip == 'create'){
    @endphp
    <h3>Ingrese tu tarejta de credito o debito</h3>
    @php
      }
      else if($tip == 'delete'){
    @endphp
    <h3>Seguro que quieres eliminar la Tajeta</h3>
    <p>
      <h6>Con terminacion: {{ $real }}</h6>
    </p>
    @php
      }
    @endphp
  </div>

  <div class="container">
    <div class="col1">
      <div class="card">
        <div class="front">
          <div class="type">
            <img class="bankid" />
          </div>
          <span class="chip"></span>
          <span class="card_number">&#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF;
            &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; </span>
          <div class="date"><span class="date_value">MM / YYYY</span></div>
          <span class="fullname">FULL NAME</span>
        </div>
        <div class="back">
          <div class="magnetic"></div>
          <div class="bar"></div>
          <span class="seccode">&#x25CF;&#x25CF;&#x25CF;</span>
          <span class="disclaimer">This card is property of Random Bank of Random corporation. <br> If found please
            return to Random Bank of Random corporation - 21968 Paris, Verdi Street, 34 </span>
        </div>
      </div>
    </div>
    <div class="col2">

      @php
        if($tip == 'update'){
      @endphp
      <form method="POST" action="{{ route ('ModTarj') }}">
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
        @php
          }
          else if($tip == 'creacionT'){
        @endphp
        <form method="POST" action="{{ route ('AddTarj') }}">
          <input type="hidden" name="val" id="val" value="Cambio">
          @php
            }
            else if($tip == 'creacionTP'){
          @endphp
          <form method="POST" action="{{ route ('AddTarj') }}">
            <input type="hidden" name="val" id="val" value="CambioP">
            @php
              }
              else if($tip == 'create'){
            @endphp
            <form method="POST" action="{{ route ('AddTarj') }}">
              @php
                }
                if($tip != 'delete'){
              @endphp
              @csrf
              <div class="inpT">
                <label for="num_tar">Card Number</label>
                <input class="number" type="text" value="{{ old('num_tar') }}" id="num_tar"
                  name="num_tar" ng-model="ncard" maxlength="19"
                  onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                @error('num_tar')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

              </div>
              <div class="inpT">
                <label for="name">Cardholder name</label>
                <input class="inputname" id="name" name="name"
                  value="{{ isset($id) ? $nom : old('name') }}" type="text"
                  placeholder="" />
              </div>
              <div class="inpT">
                <label for="expi">Expiry date</label>
                <input class="expire" id="expi" name="expi" value="{{ old('expi') }}" type="text"
                  placeholder="MM / YYYY" />
              </div>
              <div class="inpT">
                <label for="clave">Security Number</label>
                <input class="ccv" type="password" id="clave" name="clave" placeholder="CVC" maxlength="3"
                  onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                @error('clave')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              @php

                if($tip == 'update'){
              @endphp
              <button class="buy" type="submit"> Actualizar </button>
              @php
                }
                else if($tip == 'creacionT' || $tip == 'create' || $tip == 'creacionTP'){
              @endphp
              <button class="buy" type="submit"> Registrar </button>
              @php
                }
                }
                else if($tip == 'delete'){
              @endphp
              <div class="inpT">
                <label for="num_tar">Card Number</label>
                <input class="number" type="text" value="**** **** **** {{ $real }}" id="num_tar" name="num_tar"
                  ng-model="ncard" maxlength="19" />
              </div>
              @php
                if($tip == 'delete'){
                $id= ($id*2)/263412432;
              @endphp
              <form method="post"
                action="{{ url('cliente/Tarjetas/delete',['id'=>$id]) }}">
                @method('DELETE')
                @csrf
                @php
                  }
                @endphp
                <button class="buy btn-danger" type="submit"> Eliminar </button>
                @php
                  }
                @endphp
              </form>
    </div>

  </div>

</div>
<div class="MensajeT">
  @php
    if($tip == 'update'){
  @endphp
  <h5>No se ponen los datos de la tarejeta por motivos de seguridad</h5>
  @php
    }
  @endphp

</div>
<script>
  $(function () {

    var cards = [{
      nome: "mastercard",
      colore: "#0061A8",
      src: "https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png"
    }, {
      nome: "visa",
      colore: "#E2CB38",
      src: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2000px-Visa_Inc._logo.svg.png"
    }, {
      nome: "dinersclub",
      colore: "#888",
      src: "http://www.worldsultimatetravels.com/wp-content/uploads/2016/07/Diners-Club-Logo-1920x512.png"
    }, {
      nome: "americanExpress",
      colore: "#108168",
      src: "https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/American_Express_logo.svg/600px-American_Express_logo.svg.png"
    }];

    var month = 0;
    var html = document.getElementsByTagName('html')[0];
    var number = "";

    var selected_card = -1;

    $(document).click(function (e) {
      if (!$(e.target).is(".ccv") || !$(e.target).closest(".ccv").length) {
        $(".card").css("transform", "rotatey(0deg)");
        $(".seccode").css("color", "var(--text-color)");
      }
      if (!$(e.target).is(".expire") || !$(e.target).closest(".expire").length) {
        $(".date_value").css("color", "var(--text-color)");
      }
      if (!$(e.target).is(".number") || !$(e.target).closest(".number").length) {
        $(".card_number").css("color", "var(--text-color)");
      }
      if (!$(e.target).is(".inputname") || !$(e.target).closest(".inputname").length) {
        $(".fullname").css("color", "var(--text-color)");
      }
    });


    //Card number input
    $(".number").keyup(function (event) {
      $(".card_number").text($(this).val());
      number = $(this).val();

      if (parseInt(number.substring(0, 2)) > 50 && parseInt(number.substring(0, 2)) < 56) {
        selected_card = 0;
      } else if (parseInt(number.substring(0, 1)) == 4) {
        selected_card = 1;
      } else if (parseInt(number.substring(0, 2)) == 36 || parseInt(number.substring(0, 2)) == 38 || parseInt(
          number.substring(0, 2)) == 39) {
        selected_card = 2;
      } else if (parseInt(number.substring(0, 2)) == 34 || parseInt(number.substring(0, 2)) == 37) {
        selected_card = 3;
      } else if (parseInt(number.substring(0, 2)) == 65) {
        selected_card = 4;
      } else if (parseInt(number.substring(0, 4)) == 5019) {
        selected_card = 5;
      } else {
        selected_card = -1;
      }

      if (selected_card != -1) {
        html.setAttribute("style", "--card-color: " + cards[selected_card].colore);
        $(".bankid").attr("src", cards[selected_card].src).show();
      } else {
        html.setAttribute("style", "--card-color: #cecece");
        $(".bankid").attr("src", "").hide();
      }

      if ($(".card_number").text().length === 0) {
        $(".card_number").html(
          "&#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF;"
          );
      }

    }).focus(function () {
      $(".card_number").css("color", "white");
    }).on("keydown input", function () {

      $(".card_number").text($(this).val());

      if (event.key >= 0 && event.key <= 9) {
        if ($(this).val().length === 4 || $(this).val().length === 9 || $(this).val().length === 14) {
          $(this).val($(this).val() + " ");
        }
      }
    })

    //Name Input
    $(".inputname").keyup(function () {
      $(".fullname").text($(this).val());
      if ($(".inputname").val().length === 0) {
        $(".fullname").text("FULL NAME");
      }
      return event.charCode;
    }).focus(function () {
      $(".fullname").css("color", "white");
    });

    //Security code Input
    $(".ccv").focus(function () {
      $(".card").css("transform", "rotatey(180deg)");
      $(".seccode").css("color", "white");
    }).keyup(function () {
      $(".seccode").text($(this).val());
      if ($(this).val().length === 0) {
        $(".seccode").html("&#x25CF;&#x25CF;&#x25CF;");
      }
    }).focusout(function () {
      $(".card").css("transform", "rotatey(0deg)");
      $(".seccode").css("color", "var(--text-color)");
    });


    //Date expire input
    $(".expire").keypress(function (event) {
      if (event.charCode >= 48 && event.charCode <= 57) {
        if ($(this).val().length === 1) {
          $(this).val($(this).val() + event.key + "/");
        } else if ($(this).val().length === 0) {
          if (event.key == 1 || event.key == 0) {
            month = event.key;
            return event.charCode;
          } else {
            $(this).val(0 + event.key + "/");
          }
        } else if ($(this).val().length > 2 && $(this).val().length < 9) {
          return event.charCode;
        }
      }
      return false;
    }).keyup(function (event) {
      $(".date_value").html($(this).val());
      if (event.keyCode == 8 && $(".expire").val().length == 4) {
        $(this).val(month);
      }

      if ($(this).val().length === 0) {
        $(".date_value").text("MM / YYYY");
      }
    }).keydown(function () {
      $(".date_value").html($(this).val());
    }).focus(function () {
      $(".date_value").css("color", "white");
    });
  });
</script>

@endsection