require('./bootstrap');

const $ = require('jquery');
const { log } = require('handlebars');

$(document).ready(function(){
  

    //chiave per accedere alle API di tomtom
    const key = '8J0GxEHlPS0kzUv7VYyhyy8PmaaKDcr1';

    // ---------- HANDLEBARS TEMPLATES ---------- //

    const Handlebars = require("handlebars");

    //  handlebars per our results - CHIAMATA SEARCH
    var source = $("#our_results").html();
    var template = Handlebars.compile(source);

    //  handlebars per SPONSORIZED - appartamenti sponsorizzati gia in pagina
    var source_carousel = $("#carousel-data-slide").html();
    var template_carousel = Handlebars.compile(source_carousel);

    // Object HANDLEBARS appartamenti (sponsorized / no_sponsorized)
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
        price: '',
        rating:'',
    }

  // SCROLL DOWN AUTO FOR SEARCH
   $("#button_search").click(function (){
       $('html, body').animate({
           scrollTop: $("#ricerca_user").offset().top
       }, 1300);
   });

  //SLIDER
  var slider = $("#km_slider");
  var output = $("#slider_range");
  $("#slider_range").html(slider.val());
  slider.on('change' , function() {
    output.html($(this).val());
  });

  //funzione per stampare gli appartamenti sponsorizzati nel carousel al caricamento della pagina
    print_sponsorized();

    //ricerca tramite keyup sfruttando i risultati dell'API di TomTOm
    $('#input').keyup(function(){
        $('.tomtom_results').empty();
        if($('.tomtom_results').text() == '') {
            $('.tomtom_results').append('Cerca la tua prossima destinazione...')
        }
        //funzione per la ricerca non filtrata degli appartamenti con distanza preimpostata di 20km
        research();
    });

    //funzione per la ricerca filtrata degli appartamenti con parametri scelti dall'utente
    filtered_research();

    function   print_sponsorized(){
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
                            console.log(dati);
                            //Ricerca contatti con click

                            $('#button_search').click(function(){
                                $('.our_results').empty();
                                $('.form_fallovede').removeClass('disabled');
                                $('.pop-up-results').removeClass('disabled');
                                $('#go').removeClass('disabled');
                                $('.SPONSORIZED').removeClass('disabled');

                                //funzione per generare i template degli appartamenti sponsorizzati
                                sponsored_generator(dati);

                                //funzione che restituisce come risultatigli appartmaneti non attualmente sponsorizzati
                                no_sponsored_generator(dati);

                                $('#ricerca_user').empty();
                                $('#ricerca_user').append('Apartments for: <span class="results-for-span pl-1">'+ ' ' + ricerca_utente +'</span>');
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

    function filtered_research() {
        $('#go').click(function(){
            $('.our_results').empty();
            var searched_services = [];
            $('.services_input').each(function(){
                if($(this).is(':checked')) {
                    searched_services.push($(this).val());
                }
            })

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

                    sponsored_generator(dati);

                    //funzione per restituire gli appartamenti non sponsorizzati sulla base dei filtri scelti dall'utente
                    no_sponsored_generator_filtered(dati,searched_services);

                },
                error: function() {
                    console.log('error');
                }
            })
        })
    }

    function sponsored_generator(dati) {

        for (let index = 0; index < dati.results.sponsored.length; index++) {

            var stelle ='';
            for (let endex = 1; endex <= dati.results.sponsored[index].rating; endex++) {
                stelle += '<li class="fa fa-star"></li>'
            }

            our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + dati.results.sponsored[index].slug;
            our_results.title = dati.results.sponsored[index].title;
            our_results.street = dati.results.sponsored[index].street;
            our_results.building_number = dati.results.sponsored[index].building_number;
            our_results.city = dati.results.sponsored[index].city;
            our_results.region = dati.results.sponsored[index].region;
            our_results.zip_code = dati.results.sponsored[index].zip_code;
            our_results.src = dati.results.sponsored[index].src;
            our_results.distance = dati.results.sponsored[index].distance;
            our_results.price = dati.results.sponsored[index].price;
            our_results.rating = stelle;

            if (dati.results.sponsored[index].is_active == 1) {
                var html = template(our_results);
                $('.our_results').append(html);
                $('.apartment-content').append('<span class="apartment-new-label">Sponsored</span>')
            }
        }
    }

    function no_sponsored_generator(dati) {

        var array = []

        for (let index = 0; index < dati.results.no_sponsored.length; index++) {
            array.push(dati.results.no_sponsored[index].distance)
        }

        var sorted = array.sort(function(a, b){return a-b});
        var ordered_results = [];

        for (let index = 0; index < dati.results.no_sponsored.length; index++) {
            for (let endex = 0; endex < dati.results.no_sponsored.length; endex++) {
                if(sorted[index] == dati.results.no_sponsored[endex].distance) {
                    ordered_results.push(dati.results.no_sponsored[endex]);
                }
            }

            //funzione per generare il template degli appartamenti non sponsorizzati
            template_no_sponsored(ordered_results[index]);
        }
    }

    function no_sponsored_generator_filtered(dati, searched_services) {

        var array = [];

        for (let index = 0; index < dati.results.no_sponsored.length; index++) {
            array.push(dati.results.no_sponsored[index].distance)
        }
        var sorted = array.sort(function(a, b){return a-b});

        var ordered_results = [];

        for (let index = 0; index < dati.results.no_sponsored.length; index++) {
            for (let endex = 0; endex < dati.results.no_sponsored.length; endex++) {
                if(sorted[index] == dati.results.no_sponsored[endex].distance) {
                    ordered_results.push(dati.results.no_sponsored[endex]);
                }
            }
        }

        for (let index = 0; index < ordered_results.length; index++) {
            var services = ordered_results[index].services;
            var finalArray = ordered_results[index].services.map(function (services) {
                return services.type;
            });

                if(searched_services.every(elem => finalArray.indexOf(elem) > -1)) {

                    template_no_sponsored(ordered_results[index]);

                } else if ( searched_services.length == 0) {

                    template_no_sponsored(ordered_results[index]);
                }
        }
    }

    function template_no_sponsored(pippo) {
        var stelle ='';
            for (let endex = 1; endex <= pippo.rating; endex++) {
                stelle += '<li class="fa fa-star"></li>'
            }

            our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + pippo.slug;
            our_results.title = pippo.title;
            our_results.street = pippo.street;
            our_results.building_number = pippo.building_number;
            our_results.city = pippo.city;
            our_results.region = pippo.region;
            our_results.zip_code = pippo.zip_code;
            our_results.src = pippo.src;
            our_results.distance = pippo.distance;
            our_results.price = pippo.price;
            our_results.rating = stelle;

            if (pippo.is_active == 1) {
                var html = template(our_results);
                $('.our_results').append(html);

            }
    }

})
