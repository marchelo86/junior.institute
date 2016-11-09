function initialize(){
	var locations = [
      ['Филиал открыт: Украинский колледж им. В.О.Сухомлинского №272', 50.457320, 30.586041, 1],
      ['Филиал открыт: ШКОЛА 52 - Інформаційні технології', 50.427665, 30.423993, 2],
      ['Филиал открыт: Спеціалізована школа №124 з поглибленим вивченням інформаційних технологій', 50.467213, 30.520089, 3],
      ['Филиал открыт: Гімназія №315', 50.402311, 30.638499, 4],
      ['Филиал открыт: Школа 61 Спеціалізована (З Поглибленим Вивченням Інформаційних Технологій)', 50.464532, 30.476945, 5],	 
    ];

    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 11,
	  scrollwheel: false,
      center: new google.maps.LatLng(50.457320, 30.586041),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
	
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		
		
      });
		
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
		}


	google.maps.event.addDomListener(window, 'load', initialize);