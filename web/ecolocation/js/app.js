//var map;
/*function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
  });
}*/


$(function(){
  var locations = [
  {
    "userId": 1,
    "titulo": "Titulo",
    "cx": 20.635973416435235,
    "cy": -103.28410713289703
  },
  {
    "userId": 2,
    "titulo": "Titulo2",
    "cx": 20.335973416435235,
    "cy": -103.28410713289703
  },
  {
    "userId": 3,
    "titulo": "Titulo3",
    "cx": 20.935973416435235,
    "cy": -103.28410713289703
  }
];
  var url = "json.json"
  $.ajax({
      url: url,
      success: function(json){
        console.log(json);
        var map;
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 20.6596988, lng: -103.349609},
          zoom: 8
        });
        var infoWindow = new google.maps.InfoWindow;
        $.each(json, function(index, marker){
            var userId = marker.userId;
            var titulo = marker.titulo;
            var point = new google.maps.LatLng(
              parseFloat(marker.cx),
              parseFloat(marker.cy)
            );
            var infoWindowContent = $(`<div>
                                        <p> ${userId}</p>
                                        <p>${titulo}</p>

                                      </div>`);
            var marker = new google.maps.Marker({
              map: map,
              position: point,
            });
            marker.addListener('click', function(){
              infoWindow.setContent(infoWindowContent.html());
              infoWindow.open(map, marker);
            });
        });
      }
  });
  $("#btnOpinion").click(function(e){
    e.preventDefault();
    let date = new Date().toLocaleString();
    let comentario = $("#comentario").val();
    $("#comentarios").append(`
          <div class="col-sm-8 my-2       ">
            <div class="card ">
              <div class="card-header">
                <strong>myusername</strong> <span class="text-muted">${date}</span>
              </div>
              <div class="card-body">
                ${comentario}
              </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->
          </div><!-- /col-sm-5 -->`
    );
  });//Fin btnOpinion

});
