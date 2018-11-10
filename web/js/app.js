$(document).ready(function() {
if($(".register").length){
  $("#materialRegisterFormEmail").change(function(){
     var email = $(this).val();
     $.ajax({
       type: "POST",
       url: "../php/ajax/checkemail.php",
       data : {email:email},
       success: function (respuesta){
         console.log(respuesta);
         if(parseInt(respuesta) === 1){
           //$(".alert").remove();
           //console.log("data");
           $("#materialRegisterFormEmail").after(`<div class="alerta" id="error">
                                                    <small class="text-danger">
                                                    El Email ya fue registrado
                                                    </small>
                                                  </div>`);
         }else{
           //console.log(data);
          $("#error").remove();
         }

       }
     });

  });
  $("#materialRegisterFormPassword2").change(function(){
    var password = $("#materialRegisterFormPassword").val();
    var password2 = $("#materialRegisterFormPassword2").val();
    $("#errorpassword").remove();
    if (password != password2){
      console.log("Hola");
      $("#materialRegisterFormPassword2").after(`<div class="alerta" id="errorpassword">
                                                  <small class="text-danger">
                                                    Verifique las contraseñas
                                                  </small>
                                                </div>`);
    }else{
      $("#errorpassword").remove();
    }
  });

  $('form').submit(function(event) {
    event.preventDefault();
    var info_form = $(this).serialize();
    console.log("Lo muestro " + $(this));
    $.ajax({
      type: "POST",
      url: "../php/functions/registrar.php",
      data: info_form,
    }).done(function(data) {

      var errors = JSON.parse(data);
      //console.log(errors.error.length);
      if (errors.error != null){
        for (var i = 0; i < errors.error.length; i++) {
          console.log("Hola");
          console.log(errors.error[0]);
          $(".card-body").after(
            ` <div class="alert alert-danger"> ${errors.error[i]}</div>
             `);
        }
      }else{

          swal({
            icon: "success",
            title: "Registro exitoso !",
            text: "Ahora logueate"
          }).
          then(function(){
            window.location = "login.html";
          });



        //swal("Registro exitoso","success");
      }

      /*
      for (var i = 0; i < error.length; i++) {
        console.log(errors[i]);
      }
      console.log(JSON.parse(data));
      */
    });
    //console.log(array[0]);

  });
  $(document).on('click', '.map', function(e) {
    e.preventDefault();
    $("#map").removeClass('d-none');
    $("#btnG").removeClass('d-none');
    $("#add").removeClass('d-none');
    initMap();
  });
  /*$(".map").popover({
    title: "<p>Mapa, localiza tú domicilio</p>",
    html: true,
    content: `
            <button class="btn btn-info" id="btnG"  >Localize su domicilio</button>
            <div id="map " class="z-depth-1" style="height: 100px;">
            </div>
              `,
    placement: 'right',
  });

  $('.popover').on('click', function() {
    $('.popover').popover('hide');
  });
*/

  list = [];

  $('#enviar').click(function(e) {
    var calle = $("#calle").val();
    var coordenadas = $('#cordenada').val();
    var datos = {
      calle: calle,
      coordenadas: coordenadas
    };
    guardar(datos);
  });

  function guardar(datos) {
    var json = JSON.stringify(datos);
    _ajax('guardar.php', {
      'json': json
    }).done(function(info) {
      //console.log(info);
    });
  }

  function _ajax(url, data) {
    var json = JSON.stringify(data);
    var ajax = $.ajax({
      "method": "POST",
      "url": url,
      "data": data
    })
    return ajax;
  }
  /*
    function initMap(){
      console.log("Hola");
      var mapCanvas = document.getElementById("map");
      var mapOptions = {
        center: new google.maps.LatLng(51.5, -0.2), zoom: 10
      };
      var map = new google.maps.Map(mapCanvas, mapOptions);
    }
  */
  function initMap() {

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: {
        lat: 20.6736,
        lng: -103.344
      }
    });
    var geocoder = new google.maps.Geocoder;
    var infowindow = new google.maps.InfoWindow;
    $('#btnG').click(function(e) {
      e.preventDefault();
      var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
      };
      navigator.geolocation.getCurrentPosition(function(position) {
        latitud = position.coords.latitude;
        longitud = position.coords.longitude;
        var accuracy = position.coords.accuracy;

        //alert(latitud +"  "+ longitud)
        var latlng = {
          lat: parseFloat(latitud),
          lng: parseFloat(longitud)
        };
        geocoder.geocode({
          'location': latlng
        }, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              map.setZoom(15);
              var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                draggable: true,

              });
              infowindow.setContent(results[0].formatted_address);
              $("#geolocation").val(latlng.lat + "," + latlng.lng);
              $("#calle").val(results[0].formatted_address);

              list.push(results[0].formatted_address);
              infowindow.open(map, marker);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
          //Dragned event

          google.maps.event.addListener(marker, 'dragend', function(evt) {
            //console.log(evt.latLng);
            geocoder.geocode({
              'location': evt.latLng
            }, function(results, status) {
              if (status === 'OK') {
                if (results[0]) {
                  map.setZoom(20);
                  infowindow.setContent(results[0].formatted_address);
                  $("#geolocation").val(evt.latLng.lat() + "," + evt.latLng.lng());
                  $("#calle").val(results[0].formatted_address);
                  list.push(results[0].formatted_address);
                  //console.log(list);
                  infowindow.open(map, marker);
                }
              }
            });

          });
          google.maps.event.addListener(marker, 'drag', function(evt) {

            //console.log("marker is being dragged");
          });

        })

      });

    })

  }

  function validate_password (){
    let password = $("#materialRegisterFormPassword").val();
    let password2 = $("#materialRegisterFormPassword2").val();
    if (password !== password2){
      $("materialRegisterFormPassword2").after(`<div class="alert" id="errorpassword">
                                                  <small class="text-danger">
                                                    Verifique las contraseñas
                                                  </small>
                                                </div>`);
      return;

    }
  }
}
//funciones de login
if ($(".login").length) {
  $("#btnLogin").on('click', function(event) {
    event.preventDefault();
    var email = $("#email").val();
    var password = $("#password").val()
    $.ajax({
      type: "POST",
      url: "../php/functions/login.php",
      data: {"email":email,"password":password},
    }).done(function(respuesta){
      console.log(respuesta);
      if (respuesta == '1'){
          $("#errorlogin").remove();
          $("#password").after(`<small class="text-danger" id="errorlogin">La contreseña y/o el usuario es incorrecto.</small>`);
      }else if(respuesta == '0'){
        $("#errorlogin").remove();
        window.location = '../ecolocation/welcome.php';
      }


    });
  });
}
});
