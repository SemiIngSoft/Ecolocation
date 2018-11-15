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
  if ($(".peticion").length) {
    $("#btnPedido").attr("disabled", true);
    $("#pedidotext").keyup(function(event) {
      if ($(this).val().length != 0) {
        $("#btnPedido").attr("disabled", false);

      } else {
        $("#btnPedido").attr("disabled", true);

      }
    });

    $("#btnPedido").on('click', function(event) {
      event.preventDefault();

    });
    $("#btnDescargar").on('click', function(event) {
      event.preventDefault();
      console.log("Gola");
      const pdf = new jsPDF();
      let pnombre = $("#pnombre").val().trim();
      let apellidos = $("#apellidos").val().trim();
      let telefono = $("#telefono").val().trim();
      let domicilio = $("#domicilio").val().trim();
      let pedidotext = $("#pedidotext").val().trim();
      let fecha = $("#fecha").val().trim();
      console.log(pedidotext);
      if (pedidotext.trim() != '') {
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
        $.ajax({
            url: '../../php/functions/registrar_pedido.php',
            type: 'POST',
            data: {
              param1: 'value1'
            }
          })
          .done(function() {
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });

      } else {
        swal("Oops", "Something went wrong!", "error")

      }
    });
  }

  if ($(".configuraciones").length) {

    $("#btnGuardar").on('click', function(event) {
      event.preventDefault();
      var nombre = $("#pnombre").val().trim();
      var apellidoPaterno = $("#apellidoPaterno").val().trim();
      var apellidoMaterno = $("#apellidoMaterno").val().trim();
      var telefono = $("#telefono").val().trim();
      var calle = $("#calle").val().trim();
      var geolocation = $("#geolocation").val();
      $.ajax({
          url: '../php/functions/update_user.php',
          type: 'POST',
          data: {
            nombre: nombre,
            apellidoPaterno: apellidoPaterno,
            apellidoMaterno: apellidoMaterno,
            telefono: telefono,
            calle: calle,
            geolocation: geolocation
          }
        })
        .done(function(data) {
          if (data == "0"){
            swal(
              'Modificaste tus datos existosamente',
              'Da Ok Para continua r',
              'success'
            )
          }else{

          }
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

    });
    $(document).on('click', '.map', function(e) {
      e.preventDefault();
      console.log("a");
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
