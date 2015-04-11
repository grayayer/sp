//Clearing Default Field Values with jQuery for Gravity forms

jQuery(document).ready(function() {

  jQuery.fn.cleardefault = function() {
  return this.focus(function() {
    if( this.value == this.defaultValue ) {
      this.value = "";
    }
  }).blur(function() {
    if( !this.value.length ) {
      this.value = this.defaultValue;
    }
  });
};
jQuery(".clear_input input, .clear_input textarea").cleardefault();

});

// CLEAR FORM FIELDS OF LABEL ON FOCUS THEN ADD BACK ON BLUR IF EMPTY (class of 'clear_field' must be added to form field) //
 
$(document).ready(function(){
  $(".clear_field input").focus(function () {
    var origval = $(this).val();
    $(this).val("");
    //console.log(origval);
    $(".clear_field input").blur(function () {
      if($(this).val().length === 0 ) {
        $(this).val(origval);
        origval = null;
      }else{
        origval = null;
      };
    });
  });
});



// fitvids specific for scott pemberton
(function($) {
  $(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $("#content").fitVids();
  });
  
  })(jQuery);

