$(document).ready(function() {
  $(".sign-in").click(function(event) {
    $(".right-side-register").hide();
    $(".right-side-signin").show();
  });
  $(".register").click(function(event) {
    $(".right-side-register").show();
    $(".right-side-signin").hide();
  });



  // register
  $('#register').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: 'php/includes/signup.inc',
        method: 'POST',
        dataType: 'JSON',
        data: {
          fullname: $("#fullnamein").val(),
          email: $("#emailin").val(),
          uid: $("#uidin-reg").val(),
          pwd: $("#pwdin-reg").val(),
          pwdrepeat: $("#repwdin-reg").val()
        },
      })
      .done(function(data) {
        $.map(data, function(val, index) {
          switch (index) {
            case 'emptyfields':
              $('h4#error').text(val);
              break;
            case 'invalidemail':
              $('h4#error').text(val);
              break;
            case 'invalidusername':
              $('h4#error').text(val);
              break;
            case 'passwordnotmatch':
              $('h4#error').text(val);
              break;
            case 'usernametaken':
              $('h4#error').text(val);
              break;
            case 'success':
              window.location.replace('home');
              console.log(data);
              break;
          }
        });
      })
      .fail(function(xhr, status, error) {
        console.log("error" + xhr.responseText + xhr.status);
      });
  });


// Sign in
$('#signin').submit(function(e) {
  e.preventDefault();

  $.ajax({
      url: 'php/includes/signin.inc.php',
      method: 'POST',
      dataType: 'JSON',
      data: {
        uid: $('#uidin').val(),
        pwd: $('#pwdin').val()
      },
    })
    .done(function(data) {

      $.map(data, function(val, index) {

        switch (index) {
          case 'emptyfields':
            $('h4#error').css('opacity', '1').text(val);
            console.log(val);
            break;
          case 'passwordnotmatch':
            $('h4#error').css('opacity', '1').text(val);

            break;
          case 'nouser':
            $('h4#error').css('opacity', '1').text(val);
            break;
          case 'success':
            window.location.replace('home');
            break;
        }
      });
    })
    .fail(function(xhr) {
      console.log("error" + xhr.responseText + xhr.status);
    });
});

});
