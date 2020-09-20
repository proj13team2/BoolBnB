require('./bootstrap');

const $ = require('jquery');
const swal = require('sweetalert')

$(document).ready(function (){


$('.button.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});


// animation-button-index
$('.material-button-toggle').on("click", function () {
    $(this).parent().addClass('open');
    $('.open ul .option').toggleClass('scale-on');
    $(this).parent().removeClass('open');
});


$( ".i-drop-selectall" ).mouseover(function() {
  console.log('ciao');
});
})
