function iniciarMap(){
    var coord = {lat:-37.0893841,lng:-56.9050181};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: coord
    });
    var marker = new google.maps.Marker({
        position: coord,
        map: map
    });
}