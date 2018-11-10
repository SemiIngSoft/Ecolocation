//var map;
/*function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
  });
}*/


$(function() {
  if ($(".centros").length) {


    $.ajax({
      type: 'POST',
      url: '../php/functions/get_centros.php',
      success: function(json) {
        var json = JSON.parse(json);
        console.log(json);
        var map;
        map = new google.maps.Map(document.getElementById('map'), {
          center: {
            lat: 20.6596988,
            lng: -103.349609
          },
          zoom: 8
        });
        var infoWindow = new google.maps.InfoWindow;
        $.each(json, function(index, marker) {
          console.log(index, marker);
          var id_del_centro = marker.id;
          var nombre_de_centro = marker.nombre;
          var domicilio_de_centro = marker.domicilio;
          var coordenadas = marker.ubicacion;
          console.log(coordenadas);
          var coordenadas_array = coordenadas.split(',');
          var point = new google.maps.LatLng(
            parseFloat(coordenadas_array[0]),
            parseFloat(coordenadas_array[1])
          );
          var infoWindowContent = $(`<div>
                                        <p><strong>Centro: </strong> ${nombre_de_centro}</p>
                                        <p><strong>Domicilio: </strong> ${domicilio_de_centro}</p>
                                        <a href="comentarios.php?id=${id_del_centro}" class="btn btn-primary btn-sm ">Ver Opiniones</a>
                                      </div>`);
          var marker = new google.maps.Marker({
            map: map,
            position: point,
          });
          marker.addListener('click', function() {
            infoWindow.setContent(infoWindowContent.html());
            infoWindow.open(map, marker);
          });
        });
      }
    });
  }

  if ($(".comentarios").length) {
    console.log("Hola");
    var mapId = $("#mapId").val();
    $.ajax({
      type: 'POST',
      url: '../php/functions/get_centro.php',
      data: {
        'id': mapId
      },
    }).done(function(json) {
      var json = JSON.parse(json);
      //console.log(json);
      var map;
      var coordenadas = json.ubicacion;
      var coordenadas_array = coordenadas.split(',');
      console.log(coordenadas_array[0]);

      map = new google.maps.Map(document.getElementById('map'), {
        center: {
          lat: parseFloat(coordenadas_array[0]),
          lng: parseFloat(coordenadas_array[1])
        },
        zoom: 12
      });
      var infoWindow = new google.maps.InfoWindow;

      var id_del_centro = json.id;
      var nombre_de_centro = json.nombre;
      var domicilio_de_centro = json.domicilio;
      //var coordenadas = json.ubicacion;
      //var coordenadas_array = coordenadas.split(',');
      var point = new google.maps.LatLng(
        parseFloat(coordenadas_array[0]),
        parseFloat(coordenadas_array[1])
      );

      var infoWindowContent = $(`<div>
                                    <p><strong>Centro: </strong> ${nombre_de_centro}</p>
                                    <p><strong>Domicilio: </strong> ${domicilio_de_centro}</p>
                                    <!--<a href="comentarios.php?id=${id_del_centro}" class="btn btn-primary btn-sm ">Ver Opiniones</a>-->
                                  </div>`);

      var marker = new google.maps.Marker({
        map: map,
        position: point,
      });

      marker.addListener('click', function() {
        infoWindow.setContent(infoWindowContent.html());
        infoWindow.open(map, marker);
      });

    });

    /*  $.each(json, function(index, marker){
          //console.log(index, marker);
          console.log(index.nombre);
            var id_del_centro = marker.id;
            var nombre_de_centro = marker.nombre;
            var domicilio_de_centro = marker.domicilio;
            var coordenadas = marker.ubicacion;
            var coordenadas_array = coordenadas.split(',');
            var point = new google.maps.LatLng(
              parseFloat(coordenadas_array[0]),
              parseFloat(coordenadas_array[1])
            );
            var infoWindowContent = $(`<div>
                                        <p><strong>Centro: </strong> ${nombre_de_centro}</p>
                                        <p><strong>Domicilio: </strong> ${domicilio_de_centro}</p>
                                        <a href="comentarios.php?id=${id_del_centro}" class="btn btn-primary btn-sm ">Ver Opiniones</a>
                                      </div>`);
            var marker = new google.maps.Marker({
              map: map,
              position: point,
            });
            marker.addListener('click', function(){
              infoWindow.setContent(infoWindowContent.html());
              infoWindow.open(map, marker);
            });
        });*/
    //}
    $("#btnOpinion").click(function(e) {
      e.preventDefault();
      let fecha = new Date().toLocaleString();
      let comentario = $("#comentario").val();
      let idCentroRecoleccion = $("#mapId").val();
      let idCiudadano = $("#idc").val();
      let email = $("#email").val();
      $.ajax({
          url: '../php/functions/insert_comentario.php',
          type: 'POST',
          data: {
            'comentario': comentario,
            'fecha': fecha,
            'idCentroRecoleccion': idCentroRecoleccion,
            'idCiudadano': idCiudadano,
          }
        })
        .done(function(respuesta) {
          console.log(respuesta);
        });


      $("#comentarios").append(`
          <div class="col-sm-8 my-2       ">
            <div class="card ">
              <div class="card-header">
                <strong>${email}</strong> <span class="text-muted">${fecha}</span>
              </div>
              <div class="card-body">
                ${comentario}
              </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->
          </div><!-- /col-sm-5 -->`);
    }); //Fin btnOpinion

  }
  $("#btnPedido").on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
  });
  $("#btnDescargar").on('click', function(event) {
    event.preventDefault();
    console.log("Gola");
    const pdf = new jsPDF();
    let pnombre = $("#pnombre").val();
    let apellidos = $("#apellidos").val();
    let telefono = $("#telefono").val();
    let domicilio = $("#domicilio").val();
    let pedidotext = $("#pedidotext").val();
    let fecha = $("#fecha").val();

    var imagen = "data:image/png;base64,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";
    let html = `<div class="card">
                    <div class="card-header">
                      <h1> PEDIDO </h1>
                    </div>
                    <div class="card-title">

                      <h3> Datos de Peticion: </h3>
                    </div>
                    <div class="card-body">
                      <p><strong>Nombre: </strong>${pnombre}</p>
                      <p><strong>Apellidos: </strong> ${apellidos}</p>
                      <p><strong>Telefono: </strong>${telefono}</p>
                      <p><strong>Peticion: </strong>${pedidotext}</p>
                      <p><strong>Fecha: </strong>${fecha}</p>
                    </div>
                   </div>`;
    pdf.addImage(imagen, 'JPEG', 5, 5, 50, 50);
    pdf.setFontSize(40);

    pdf.fromHTML(
      html,
      60,
      10, {
        'width': 500
      }
    );

    pdf.save();
    swal({
      icon: 'success',
       title: 'Tu Pedido ha sido completado',
       text: 'Iremos a tu casa en la brevedad',
    });
  });

  if($(".configuraciones").length){


    $(document).on('click', '.map', function(e) {
      e.preventDefault();
      console.log("a" );
      $("#map").removeClass('d-none');
      $(".card").removeClass('d-none');
      $("#btnG").removeClass('d-none');
      $("#add").removeClass('d-none');
      initMap();
    });
    function initMap() {
      list = []
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
                console.log($("#geolocation"));
                $("#calle").val(results[0].formatted_address);
                console.log($("#calle"));
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
    $("#btnGuardar").on('click', function(event) {
      event.preventDefault();
      /* Act on the event */
      var nombre = $("#nombre").val()
      var apellidoMaterno = $("#apellidoMaterno").val();
      var apellidoPaterno = $("#apellidoPaterno").val();
      var telefono = $("#telefono")
    });

  }
});
