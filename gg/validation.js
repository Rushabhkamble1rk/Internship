$(function() {

  


  $("#register-form").validate({
    rules: {
      email: {
        required: true,
        email: true,
        
      },
      
      firstName: {
        required: true,
        nowhitespace: true,
       lettersonly: true
      },
      secondName: {
        required: true,
        nowhitespace: true,
        lettersonly: true
      },
     
     
      address: {
        required: true
      }
      },
    
    messages: {
      email: {
        required: 'Please enter an email address.',
        email: 'Please enter a <em>valid</em> email address.',
      //  remote: $.validator.format("{0} is already associated with an account.")
      }
    }
  });

});