require('./bootstrap');
const $ = require('jquery');

$(document).ready(function(){

//funzione per  verificare l'email oltre la @
  var emailExp = new RegExp(/^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i);

 $.validator.addMethod(
  /* The value you can use inside the email object in the validator. */
  "regex",

  /* The function that tests a given string against a given regEx. */
  function(value, element, regexp)  {
      /* Check if the value is truthy (avoid null.constructor) & if it's not a RegEx. (Edited: regex --> regexp)*/

      if (regexp && regexp.constructor != RegExp) {
         /* Create a new regular expression using the regex argument. */
         regexp = new RegExp(regexp);
      }

      /* Check whether the argument is global and, if so set its last index to 0. */
      else if (regexp.global) regexp.lastIndex = 0;

      /* Return whether the element is optional or the result of the validation. */
      return this.optional(element) || regexp.test(value);
  }
);


    $(function() {
      // Initialize form validation on the registration form.
      // It has the name attribute "registration"
      $("form[name = 'message'] ").validate({
        // Specify validation rules
        rules: {
          // The key name on the left side is the name attribute
          // of an input field. Validation rules are defined
          // on the right side
          email: {
            required: true,
            // Specify that email should be validated
            // by the built-in "email" rule
            email: true,
            regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
          },
          content: {
            required: true,
            minlength: 1
          }
        },
        // Specify validation error messages
        messages: {

          content: {
            required: "Please provide a content",
            minlength: "Your content must be at least 1 character long"
          },
          email: "Please enter a valid email address"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
          form.submit();
        }
      });

      $("form[name = 'form_register'] ").validate({
        // Specify validation rules
        rules: {
          // The key name on the left side is the name attribute
          // of an input field. Validation rules are defined
          // on the right side
          email: {
            required: true,
            // Specify that email should be validated
            // by the built-in "email" rule
            email: true,
            regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
          },

        },
        // Specify validation error messages
        messages: {
          email: "Please enter a valid email address"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
          form.submit();
        }
      });

      $("form[name = 'form_apartment'] ").validate({
        // Specify validation rules
        rules: {
          // The key name on the left side is the name attribute
          // of an input field. Validation rules are defined
          // on the right side
            title: {
            required: true,
            },
            building_number: {
            required: true,
            digits: true,
            },
            city: {
            required: true,
            },
            zip_code: {
            required: true,
            digits: true,
            },
            region: {
            required: true,
            },
            country: {
            required: true,
            },
            lat: {
            required: true,
            number: true,
            },
            lng: {
            required: true,
            number: true,
            },
            price: {
            required: true,
            min: 1
            },
            number_of_rooms: {
            required: true,
            min: 1,
            digits: true
            },
            number_of_bathrooms: {
            required: true,
            min: 1,
            digits: true
            },
            square_meters: {
            required: true,
            min: 1,
            digits: true
            },
            // src: {
            //     if (window.location.pathname == '/user/apartments/create') {
            //         required: true
            //     }
            // },

        },
        // Specify validation error messages
        messages: {
          email: "Please enter a valid email address"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
});
