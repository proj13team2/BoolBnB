require('./bootstrap');

import tt from '@tomtom-international/web-sdk-maps';

const $ = require('jquery');

$(document).ready(function(){

    const key = '8J0GxEHlPS0kzUv7VYyhyy8PmaaKDcr1';
    //CHIAMATA API PER CREATE E UPDATE

    
    $('button.btn-submit').click('btn-submit',function(evento){
        evento.preventDefault()
        var indirizzo_inserito = $('#street').val() + ' ' + $('#building_number').val()
        + ' ' + $('#city').val() + ' ' + $('#zip_code').val() + ' ' +
        $('#region').val() + ' ' + $('#country').val() ;
        console.log(indirizzo_inserito);

        $.ajax({
            'url': 'https://api.tomtom.com/search/2/geocode/' + indirizzo_inserito + '.' + 'json',
            'method': 'GET',
            'data': {
                'key': key,
                'idxSet': 'Str'
            },
            'success': function(data) {
                var lat = data.results[0].position.lat;
                var lng = data.results[0].position.lon;
                $('#lat').val(lat)
                $('#lng').val(lng)
                $('form.apartment-form').submit()
            
            },
            'error': function(){
                console.log('Errore Chiamata Ajax');
            }
        })
    })

    
    var position = [ $('.appartamento').data('lng') , $('.appartamento').data('lat') ];


    var map = tt.map({
        key: key,
        container: "map",
        style: "tomtom://vector/1/basic-main",
        center: position,
        zoom: 15
    });
    var popupOffsets = {
        top: [0, 0],
        bottom: [0, -70],
        'bottom-right': [0, -70],
        'bottom-left': [0, -70],
        left: [25, -35],
        right: [-25, -35]
    }
    var element = document.createElement('div');
    element.id = 'marker';
    var apt_title = $('p[data-title]').data('title');
    var apt_address = $('p[data-address]').data('address');
    var apt_endaddress = $('.appartamento').data('endaddress')
    var popup = new tt.Popup({offset: popupOffsets}).setHTML("<b>"+ apt_title +"</b><br/>" + apt_address + '</br>' + apt_endaddress);
    var marker = new tt.Marker({element: element}).setLngLat(position).addTo(map);
    marker.setPopup(popup).togglePopup();

    map.addControl(new tt.NavigationControl());
})