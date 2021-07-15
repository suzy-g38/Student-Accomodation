$('#show').click(function () {
  //$(".option").addClass("overlay");
  $('.box').show();
  $('.form-div').show();
    $('.option').show();
});

$('.index-close').click(function () {
  $('.box').hide();
  $('.form-div').hide();
    $('.option').hide();
});
$("#st-login").click(function(){
  $(".option").hide();
    $(".student").show();

});
$(".index-close").click(function(){
  $(".student").hide();
});
$("#st-reg").click(function(){
    $(".student").hide();
    $(".register").show();
  })
  $("#st-log").click(function(){
      $(".register").hide();
      $(".student").show();
});
$("#ad-login").click(function(){
  $(".option").hide();
  $(".admin").show();
});
$(".index-close").click(function(){
  $(".admin").hide();
});


$(".admin-log-btn").click(function(){
  var error = "";

  if ($("#admin-email").val() == "") {

      error += "*An email is required.<br>"

  }

  if ($("#admin-password").val() == "") {

      error += "*A password is required.<br>"

  }

  if (error != "") {

     $("#admin-error").html(error);

      return false;

  }
  else
  {

      return true;

  }
});

$(".st-log-btn").click(function(){
  var error = "";

  if ($("#st-email").val() == "") {

      error += "*An email is required.<br>"

  }

  if ($("#st-password").val() == "") {

      error += "*A password is required.<br>"

  }

  if (error != "") {

     $("#st-error").html(error);

      return false;

  } else {

      return true;

  }
});
$(".reg-log-btn").click(function(){
  var error = "";
  if ($("#reg-name").val() == "") {

      error += "*A name is required.<br>"

  }

  if ($("#reg-email").val() == "") {

      error += "*An email is required.<br>"

  }

  if ($("#reg-password").val() == "") {

      error += "*A password is required.<br>"

  }

  if (error != "") {

     $("#reg-error").html(error);

      return false;

  } else {

      return true;

  }
});
$(".logout-btn").click(function(){
  window.location.href='login.php';
})
