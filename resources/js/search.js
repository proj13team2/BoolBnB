require('./bootstrap');

const $ = require('jquery');
const { log } = require('handlebars');

$(document).ready(function(){

  // SCROLL DOWN AUTO FOR SEARCH
   $("#button_search").click(function (){
       $('html, body').animate({
           scrollTop: $("#results").offset().top
       }, 1300);
   });

  //SLIDER
  var slider = $("#km_slider");
  var output = $("#slider_range");
  $("#slider_range").html(slider.val());
  slider.on('change' , function() {
    output.html($(this).val());
  });



  // DA CANCELLARE !!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $('#input').val('Piazza Cesare Beccaria Milano');
  $('#input').click(function(){
      $('.tomtom_results').empty();
      research();
  });
    // DA CANCELLARE !!!!!!!!!!!!!!!!!!!!!!!!!!!!



    const Handlebars = require("handlebars");

    // // handlebars per our results - CHIAMATA SEARCH
    var source = $("#our_results").html();
    var template = Handlebars.compile(source);

    // // handlebars per SPONSORIZED - appartamenti sponsorizzati gia in pagina
    var source_Sponsorized = $("#SPONSORIZED").html();
    var template_Sponsorized = Handlebars.compile(source_Sponsorized);

    // // handlebars per SPONSORIZED - appartamenti sponsorizzati gia in pagina
    var source_carousel = $("#carousel-data-slide").html();
    var template_carousel = Handlebars.compile(source_carousel);



    // Obje HANDLEBARS appartamenti
    var our_results = {
        title: '',
        street: '',
        building_number: '',
        city: '',
        region: '',
        zip_code: '',
        src: '',
        link:'',
        distance: '',
        price: ''
    }


    // funzione per stampare gli appartamenti sponsorizzati in pagina.
    Stamp_A_sponsored();

    function Stamp_A_sponsored() {
      $.ajax({
        'url' : window.location.protocol + '//' + window.location.host  + '/api/stamp',
        'method': 'GET',
        success:function(dati) {
            $('.carousel-inner').empty();
            for (let index = 0; index < dati.results.length; index++) {
                our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + dati.results[index].slug;
                our_results.title = dati.results[index].title;
                our_results.street = dati.results[index].street;
                our_results.building_number = dati.results[index].building_number;
                our_results.city = dati.results[index].city;
                our_results.region = dati.results[index].region;
                our_results.zip_code = dati.results[index].zip_code;
                our_results.src = dati.results[index].src;
                our_results.distance = dati.results[index].distance;
                our_results.price = dati.results[index].price;

                if(dati.results[index].is_active == 1) {
                    var html = template_carousel(our_results);
                    $('.carousel-inner').append(html);
                    $('.carousel-indicators').append('<li class="carousel-indicator-li" data-target="#myCarousel" data-slide-to="' + index +'"></li>');
                    var html = template_Sponsorized(our_results);
                    $('.SPONSORIZED').append(html);
                }
                $('.carousel-item').first().addClass('active');
                $('.carousel-indicator-li').first().addClass('active');
            };
          },
        error: function() {
            console.log('error');
        }
      })
    };

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
        var ricerca_utente = $('#input').val();

        //chiamata ajax per effettuare la ricerca
        $.ajax({
            'url': 'https://api.tomtom.com/search/2/geocode/' + ricerca_utente + '.' + 'json',
            'method': 'GET',
            'data': {
                'key': key,
                'limit': 5,
                'countrySet': 'IT',
                'typeahead': true,
                'storeResult' : true
            },
            success: function(data) {
                //stampo velocememente a schermo i risultati della chiamata ajax
                for (let i = 0; i < data.results.length; i++) {
                    console.log(data.results);

                    if (!data.results[i].address.streetName) {data.results[i].address.streetName = '' };
                    if (!data.results[i].address.municipality) {data.results[i].address.municipality = '' };
                    if (!data.results[i].address.countrySecondarySubdivision) {data.results[i].address.countrySecondarySubdivision = '' };
                    if (!data.results[i].address.countrySubdivision) {data.results[i].address.countrySubdivision = '' };


                    // ------- DA SOSTITUIRE CON HANDLEBARS --------
                    var tomtomresults = '<div class="tomtom_result" data-lat="' + data.results[i].position.lat + '" data-lon="' + data.results[i].position.lon + '" +  >' +
                    '<span>' + data.results[i].address.streetName + ' </span>' +
                    '<span>' + data.results[i].address.municipality + ' </span>' +
                    '<span>' + data.results[i].address.countrySecondarySubdivision + ' </span>' +
                    '<span>' + data.results[i].address.countrySubdivision + ' </span>';

                    $('.tomtom_results').append(tomtomresults);
                }

                //al click su un risutlato recupero i suoi valori e li stampo nell'input
                $('.tomtom_result').click(function(){
                    var nome_via = $(this).find('span:first-of-type').text();
                    var nome_città = $(this).find('span:nth-of-type(2)').text();
                    var nome_provincia = $(this).find('span:nth-of-type(3)').text();
                    var nome_nazione = $(this).find('span:nth-of-type(4)').text();
                    var address = nome_via + nome_città + nome_provincia + nome_nazione;
                    $('#input').val(address);

                    //recupero latitudine e longitudine dell'indirizzo cercato
                     lat = $(this).data('lat');
                     lon = $(this).data('lon');

                    //chiamata ajax per recuperare gli appartamenti che ho nel db e le rispettive lat e lon
                    $.ajax({
                        'url': window.location.protocol + '//' + window.location.host  + '/api/search',
                        'method': 'GET',
                        'data': {
                            'lat': lat,
                            'lng': lon
                        },
                        success: function(dati) {
                            //Ricerca contatti con click
                            $('#button_search').click(function(){
                                $('.our_results').empty();
                                $('.form_fallovede').removeClass('disabled');
                                $('.SPONSORIZED').removeClass('disabled');

                                var array = []
                                for (let index = 0; index < dati.results.length; index++) {
                                    array.push(dati.results[index].distance)
                                }

                                var sorted = array.sort(function(a, b){return a-b});

                                var ordered_results = [];

                                for (let index = 0; index < dati.results.length; index++) {

                                    for (let endex = 0; endex < dati.results.length; endex++) {
                                        if(sorted[index] == dati.results[endex].distance) {
                                            ordered_results.push(dati.results[endex]);
                                        }
                                    }

                                    our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + ordered_results[index].slug;
                                    our_results.title = ordered_results[index].title;
                                    our_results.street = ordered_results[index].street;
                                    our_results.building_number = ordered_results[index].building_number;
                                    our_results.city = ordered_results[index].city;
                                    our_results.region = ordered_results[index].region;
                                    our_results.zip_code = ordered_results[index].zip_code;
                                    our_results.src = ordered_results[index].src;
                                    our_results.distance = ordered_results[index].distance;
                                    our_results.price = ordered_results[index].price;

                                    if (ordered_results[index].is_active == 1) {
                                        var html = template(our_results);
                                        $('.our_results').append(html);

                                    }

                                    $('#ricerca_user').text('Ricerca effettuata : ' + ricerca_utente);
                                }
                            })
                            //faccio la stessa cosa ma con l'enter
                            // $('input').keyup(function(event) {
                                // verifico se l'utente ha digitato "ENTER"
                                //  if(event.which == 13) {
                                //     $('.our_results').empty();
                                //     for (let index = 0; index < dati.results.length; index++) {
                                //         our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + dati.results[index].slug;
                                //         our_results.title = dati.results[index].title;
                                //         our_results.street = dati.results[index].street;
                                //         our_results.building_number = dati.results[index].building_number;
                                //         our_results.city = dati.results[index].city;
                                //         our_results.region = dati.results[index].region;
                                //         our_results.zip_code = dati.results[index].zip_code;
                                //         our_results.src = dati.results[index].src;
                                //         var html = template(our_results);
                                //         $('.apartment_result>a').attr('href', link )
                                //         $('.our_results').append(html);
                                //     }
                                //     $('input').val('');
                                // }
                            // })
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
    $('#go').click(function(){
        $('.our_results').empty();
        var searched_services = [];
        $('.services_input').each(function(){
            if($(this).is(':checked')) {
                searched_services.push($(this).val());
            }
        })
        console.log(searched_services);

        $.ajax({
            'url': window.location.protocol + '//' + window.location.host  + '/api/filtered',
            'method': 'GET',
            'data': {
                'lat': lat,
                'lng': lon,
                'radius': $('#km_slider').val(),
                'number_of_rooms': $('#number_of_rooms').val(),
                'number_of_beds': $('#number_of_beds').val()
            },
            success: function(dati) {
                console.log(dati);
                $('.our_results').empty();
                var array = [];

                for (let index = 0; index < dati.results.length; index++) {
                    array.push(dati.results[index].distance)
                }
                var sorted = array.sort(function(a, b){return a-b});

                var ordered_results = [];

                for (let index = 0; index < dati.results.length; index++) {
                    for (let endex = 0; endex < dati.results.length; endex++) {
                        if(sorted[index] == dati.results[endex].distance) {
                            ordered_results.push(dati.results[endex]);
                        }
                    }
                }


                for (let index = 0; index < ordered_results.length; index++) {
                    var services = ordered_results[index].services;
                    var finalArray = ordered_results[index].services.map(function (services) {
                        return services.type;
                    });




                    console.log(finalArray);

                        if(searched_services.every(elem => finalArray.indexOf(elem) > -1)) {
                            our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + ordered_results[index].slug;
                            our_results.title = ordered_results[index].title;
                            our_results.street = ordered_results[index].street;
                            our_results.building_number = ordered_results[index].building_number;
                            our_results.city = ordered_results[index].city;
                            our_results.region = ordered_results[index].region;
                            our_results.zip_code = ordered_results[index].zip_code;
                            our_results.src = ordered_results[index].src;
                            our_results.distance = ordered_results[index].distance;
                            our_results.price = ordered_results[index].price;


                            console.log(our_results.title);

                            if (ordered_results[index].is_active == 1) {
                                var html = template(our_results);
                                $('.our_results').append(html);
                            }

                        } else if ( searched_services.length == 0) {
                            our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + ordered_results[index].slug;
                            our_results.title = ordered_results[index].title;
                            our_results.street = ordered_results[index].street;
                            our_results.building_number = ordered_results[index].building_number;
                            our_results.city = ordered_results[index].city;
                            our_results.region = ordered_results[index].region;
                            our_results.zip_code = ordered_results[index].zip_code;
                            our_results.src = ordered_results[index].src;
                            our_results.distance = ordered_results[index].distance;
                            our_results.price = ordered_results[index].price;


                            if (ordered_results.is_active == 1) {
                                var html = template(our_results);
                                $('.our_results').append(html);
                            }
                        }
                }
            },
            error: function() {
                console.log('error');
            }
        })
    })
})
