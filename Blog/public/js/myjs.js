$(document).ready(function () {
    /* toggle bewtween login and signin */
   $("#login").click(function(){
       $("#signin").removeClass("active");
       $(this).addClass("active");
       $("#log-div").addClass("current");
       $("#sign-div").removeClass("current");
       $(".gate .error").toggle();

   });

   $("#signin").click(function(){
    $("#login").removeClass("active");
    $(this).addClass("active");
    $("#sign-div").addClass("current");
    $("#log-div").removeClass("current");
    $(".gate .error").toggle();
     
});
/* toggle bewtween login and signin */

// hide errors from login
if($("#login").hasClass("active")){
    $(".gate .error").toggle();
}

// use Ckeditor 
if(document.getElementById("ck")){
    CKEDITOR.replace("ck");
}



});