require('./bootstrap');



const $ = require('jquery');

$(document).ready(function(){



  // DA CANCELLARE !!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $('#input').val('Piazza Cesare Beccaria Mil');
  $('#input').click(function(){
      $('.tomtom_results').empty();
      research();
  });
    // DA CANCELLARE !!!!!!!!!!!!!!!!!!!!!!!!!!!!



    const Handlebars = require("handlebars");

    // // handlebars per our results
    var source = $("#our_results").html();
    var template = Handlebars.compile(source);

    //CHIAMATE API CON AJAX PER HOME


    //chiave per accedere alle API di tomtom
    const key = '8J0GxEHlPS0kzUv7VYyhyy8PmaaKDcr1';

    //ricerca in tempo reale tramite la il rilascio dei tasti
    $('#input').keyup(function(){
        $('.tomtom_results').empty();
        research();
    });


    //funzione per far apparire/scomparire i luoghi risultanti dall'api
    function research() {

        //identifico il valore inserito dall'utente e lo rendo uppercase
        var ricerca_utente = $('#input').val().toLowerCase();

        //chiamata ajax per effettuare la ricerca
        $.ajax({
            'url': 'https://api.tomtom.com/search/2/geocode/' + ricerca_utente + '.' + 'json',
            'method': 'GET',
            'data': {
                'key': key,
                'idxSet': 'Str'
            },
            success: function(data) {
                //stampo velocememente a schermo i risultati della chiamata ajax
                for (let i = 0; i < data.results.length; i++) {
                    console.log(data.results);
                    var indirizzo_corrente = data.results[i].address;

                    // ------- DA SOSTITUIRE CON HANDLEBARS --------
                    var tomtomresults = '<div class="tomtom_result" data-lat="' + data.results[i].position.lat + '" data-lon="' + data.results[i].position.lon + '" +  >' +
                    '<span>' + indirizzo_corrente.streetName + ',</span>' +
                    '<span>' + indirizzo_corrente.municipality + ',</span>' +
                    '<span>' + indirizzo_corrente.countrySecondarySubdivision + ',</span>' +
                    '<span>' + indirizzo_corrente.countrySubdivision + ',</span>' +
                    '<span>' + indirizzo_corrente.country + '</span>' + '</div>';

                    $('.tomtom_results').append(tomtomresults);
                }

                //al click su un risutlato recupero i suoi valori e li stampo nell'input
                $('.tomtom_result').click(function(){
                    var nome_via = $(this).find('span:first-of-type').text();
                    var nome_città = $(this).find('span:nth-of-type(2)').text();
                    var nome_provincia = $(this).find('span:nth-of-type(3)').text();
                    var nome_nazione = $(this).find('span:nth-of-type(4)').text();
                    var address = nome_via + nome_città + nome_provincia + nome_nazione;
                    $('input').val(address);

                    //recupero latitudine e longitudine dell'indirizzo cercato
                    var lat = $(this).data('lat');
                    var lon = $(this).data('lon');

                    //chiamata ajax per recuperare gli appartamenti che ho nel db e le rispettive lat e lon
                    $.ajax({
                        'url': window.location.protocol + '//' + window.location.host  + '/api/search',
                        'method': 'GET',
                        'data': {
                            'lat': lat,
                            'lng': lon
                        },
                        success: function(dati) {
                            console.log(dati);
                            //Ricerca contatti con click
                            $('button').click(function(){
                                $('.our_results').empty();
                                var html = template(our_results);
                                $('.our_results').append(html);
                                //dopodichè libero l'input
                                $('input').val('');
                            })
                            //faccio la stessa cosa ma con l'enter
                            $('input').keyup(function(event) {
                                // verifico se l'utente ha digitato "ENTER"
                                if(event.which == 13) {
                                    $('.our_results').empty();
                                    var html = template(our_results);
                                    $('.our_results').append(html);
                                    $('input').val('');
                                }
                            })
                        },
                        error: function() {
                            console.log('error');
                        }
                    })
                })
            },
            error: function() {
                console.log('error');
            }
        })
    }

    //CHIAMATA API PER CREATE E UPDATE
    $('.salvaci').click(function(){
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


            },
            'error': function(){
                console.log('Errore Chiamata Ajax');
            }
        })
    })
})
