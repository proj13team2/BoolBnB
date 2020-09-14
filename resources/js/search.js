require('./bootstrap');

const $ = require('jquery');
const { log } = require('handlebars');

$(document).ready(function(){


  //SLIDER
  var slider = $("#km_slider");
  var output = $("#slider_range");
  $("#slider_range").html(slider.val());
  slider.on('change' , function() {
    output.html($(this).val());
  });



  // DA CANCELLARE !!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $('#input').val('Piazza Cesare Beccaria Mil');
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
    }

    // funzione per stampare gli appartamenti sponsorizzati in pagina.
    Stamp_A_sponsored();

    function Stamp_A_sponsored() {
      $.ajax({
        'url' : window.location.protocol + '//' + window.location.host  + '/api/stamp',
        'method': 'GET',
        success:function(dati) {
            console.log(dati);
            $('.SPONSORIZED').empty();
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
                var html = template_Sponsorized(our_results);
                $('.SPONSORIZED').append(html);
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
                            $('button').click(function(){
                                // $('.SPONSORIZED').empty();
                                $('.our_results').empty();
                                $('.form_fallovede').removeClass('disabled');

                                var array = []
                                for (let index = 0; index < dati.results.length; index++) {
                                    array.push(dati.results[index].distance)
                                }

                                var sorted = array.sort()
                                console.log(sorted);
                                var mannaggina = [];

                                for (let index = 0; index < dati.results.length; index++) {

                                    for (let endex = 0; endex < dati.results.length; endex++) {
                                        if(sorted[index] == dati.results[endex].distance) {
                                            mannaggina.push(dati.results[endex]);
                                        }
                                    }
                                     
                                    our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + mannaggina[index].slug;
                                    our_results.title = mannaggina[index].title;
                                    our_results.street = mannaggina[index].street;
                                    our_results.building_number = mannaggina[index].building_number;
                                    our_results.city = mannaggina[index].city;
                                    our_results.region = mannaggina[index].region;
                                    our_results.zip_code = mannaggina[index].zip_code;
                                    our_results.src = mannaggina[index].src;
                                    our_results.distance = mannaggina[index].distance;

                                    var html = template(our_results);
                                    $('.our_results').append(html);

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
        // console.log(searched_services);

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
                var array = []
                for (let index = 0; index < dati.results.length; index++) {
                    array.push(dati.results[index].distance)
                }
                var sorted = array.sort()
                var mannaggina = [];

                for (let index = 0; index < dati.results.length; index++) {
                    var services = dati.results[index].services;
                    var finalArray = dati.results[index].services.map(function (services) {
                        return services.type;
                    });

                    for (let endex = 0; endex < dati.results.length; endex++) {
                        if(sorted[index] == dati.results[endex].distance) {
                            mannaggina.push(dati.results[endex]);
                        }
                    }

                    // var sponsors = dati.results[index].sponsors.pivot;
                    // var finalArraySp = dati.results[index].sponsors.map(function (sponsors) {
                    //     return sponsors.pivot;
                    // });

                    // console.log(finalArraySp);

                    // var array_date = [];
                    // if(finalArraySp.length != 0) {
                    //     for (let andex = 0; andex < finalArraySp.length; andex++) {
                    //         var end_date = finalArraySp[andex].end_date;
                    //         array_date.push(end_date)
                            
                    //     }
                    // }


                    // function addZero(i) {
                    //     if (i < 10) {
                    //       i = "0" + i;
                    //     }
                    //     return i;
                    //   }
                    //   var d = new Date();
                    //   var yy = addZero(d.getFullYear());
                    //   var mm = addZero(d.getMonth()+1);
                    //   var dd = addZero(d.getDate());
                    //   var h = addZero(d.getHours());
                    //   var m = addZero(d.getMinutes());
                    //   var s = addZero(d.getSeconds());
                    //   var time_now = yy +'-'+mm+'-'+dd+' '+h + ":" + m + ':' + s;
                    //   console.log(array_date.length != 0);
                    // if(array_date.length == 0) {
                        if(searched_services.every(elem => finalArray.indexOf(elem) > -1)) {
                            our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + mannaggina[index].slug;
                            our_results.title = mannaggina[index].title;
                            our_results.street = mannaggina[index].street;
                            our_results.building_number = mannaggina[index].building_number;
                            our_results.city = mannaggina[index].city;
                            our_results.region = mannaggina[index].region;
                            our_results.zip_code = mannaggina[index].zip_code;
                            our_results.src = mannaggina[index].src;
                            our_results.distance = mannaggina[index].distance;
    
                            var html = template(our_results);
                            $('.our_results').append(html);

                        } else if ( searched_services.length == 0) {
                            our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + mannaggina[index].slug;
                            our_results.title = mannaggina[index].title;
                            our_results.street = mannaggina[index].street;
                            our_results.building_number = mannaggina[index].building_number;
                            our_results.city = mannaggina[index].city;
                            our_results.region = mannaggina[index].region;
                            our_results.zip_code = mannaggina[index].zip_code;
                            our_results.src = mannaggina[index].src;
                            our_results.distance = mannaggina[index].distance;
    
                            var html = template(our_results);
                            $('.our_results').append(html);
                        }
                    // } else if (array_date.length != 0) {
                    //     if(array_date[array_date.length--] <= time_now ) {
                    //         if(searched_services.every(elem => finalArray.indexOf(elem) > -1)) {
                    //             our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + mannaggina[index].slug;
                    //             our_results.title = mannaggina[index].title;
                    //             our_results.street = mannaggina[index].street;
                    //             our_results.building_number = mannaggina[index].building_number;
                    //             our_results.city = mannaggina[index].city;
                    //             our_results.region = mannaggina[index].region;
                    //             our_results.zip_code = mannaggina[index].zip_code;
                    //             our_results.src = mannaggina[index].src;
                    //             our_results.distance = mannaggina[index].distance;
        
                    //             var html = template(our_results);
                    //             $('.our_results').append(html);
                    //         } else if ( searched_services.length == 0) {
                    //             our_results.link = window.location.protocol + '//' + window.location.host  + '/guest/apartment/' + mannaggina[index].slug;
                    //             our_results.title = mannaggina[index].title;
                    //             our_results.street = mannaggina[index].street;
                    //             our_results.building_number = mannaggina[index].building_number;
                    //             our_results.city = mannaggina[index].city;
                    //             our_results.region = mannaggina[index].region;
                    //             our_results.zip_code = mannaggina[index].zip_code;
                    //             our_results.src = mannaggina[index].src;
                    //             our_results.distance = mannaggina[index].distance;
        
                    //             var html = template(our_results);
                    //             $('.our_results').append(html);
                    //         }
                    //     } 
                    // }
                }
            },
            error: function() {
                console.log('error');
            }
        })
    })
})
