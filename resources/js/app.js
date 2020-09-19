require('./bootstrap');

const $ = require('jquery');


$(document).ready(function(){

    // animation-button-index
    $('.material-button-toggle').on("click", function () {
        $(this).parent().addClass('open');
        $('.open ul .option').toggleClass('scale-on');
        $(this).parent().removeClass('open');
    });


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


})
