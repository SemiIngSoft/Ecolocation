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
});
