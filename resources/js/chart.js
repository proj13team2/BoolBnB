require('./bootstrap');

const $ = require('jquery');


$(document).ready(function () {
    var id_apt = $('#titolo-apt-stats').attr('data-apartment');
   

    $.ajax({
    'url': window.location.protocol + '//' + window.location.host  + '/api/stats/messages/' + id_apt,
    'method': 'GET',
    'data': {
        
    }, 
    success: function(dati){
        $('#total-messages span').text(dati.count);
        console.log(dati.results);
        var Chart = require('chart.js');
        var ctx = document.getElementById('chartMessages').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
            datasets: [{
                label: 'Visualizzazioni mensili',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: dati.results
            }]
        },
        // Configuration options go here
        options: {}
        })
},
    error: function(){

    }
 
});

$.ajax({
    'url': window.location.protocol + '//' + window.location.host  + '/api/stats/visualizations/' + id_apt,
    'method': 'GET',
    'data': {
        
    }, 
    success: function(dati){
        $('#total-visualizations span').text(dati.count);
        console.log(dati.results);
        var Chart = require('chart.js');
        var ctx = document.getElementById('chartViews').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
            datasets: [{
                label: 'Visualizzazioni mensili',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: dati.results
            }]
        },
        // Configuration options go here
        options: {}
        })
},
    error: function(){

    }
 
});


});

