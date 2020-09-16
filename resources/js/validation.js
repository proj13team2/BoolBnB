require('./bootstrap');
const $ = require('jquery');

$(document).ready(function(){
    $(function() {
      // Initialize form validation on the registration form.
      // It has the name attribute "registration"
      $("form[name = 'message']").validate({
        // Specify validation rules
        rules: {
          // The key name on the left side is the name attribute
          // of an input field. Validation rules are defined
          // on the right side
          email: {
            required: true,
            // Specify that email should be validated
            // by the built-in "email" rule
            email: true
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
    });
});
