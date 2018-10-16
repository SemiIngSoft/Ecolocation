$( document ).ready(function() {

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
      console.log(info);
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
        lat: 40.731,
        lng: -73.997
      }
    });
    var geocoder = new google.maps.Geocoder;
    var infowindow = new google.maps.InfoWindow;
    $('#btnG').click(function(e) {
      e.preventDefault();

      navigator.geolocation.getCurrentPosition(function(position) {
        latitud = position.coords.latitude;
        longitud = position.coords.longitude;
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
              $("#cordenada").val(latlng.lat + "," + latlng.lng);
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
            console.log(evt.latLng);
            geocoder.geocode({
              'location': evt.latLng
            }, function(results, status) {
              if (status === 'OK') {
                if (results[0]) {
                  map.setZoom(20);
                  infowindow.setContent(results[0].formatted_address);
                  $("#cordenada").val(evt.latLng.lat() + "," + evt.latLng.lng());
                  $("#calle").val(results[0].formatted_address);
                  list.push(results[0].formatted_address);
                  console.log(list);
                  infowindow.open(map, marker);
                }
              }
            });

          });
          google.maps.event.addListener(marker, 'drag', function(evt) {

            console.log("marker is being dragged");
          });

        })

      })

    })

  }

});
