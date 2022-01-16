$(document).ready(function() {

// on scroll, fixed sidebar
$('body').scroll(function(event) {
  let height = $('.header-wrap').height();

  if ($(this).scrollTop() > height) {
    $('.side-nav').addClass('fixed').css('overflow-y', 'scroll');
    $('.tab').css('width', '88%');

  } else {
      $('.side-nav').removeClass('fixed').css('overflow-y', 'visible');
      $('.tab').css('width', '100%');
    }
});


// loads immediately and runs function
  $.ajax({
    url: '/purenotes/php/includes/tab.load.inc.php',
    type: 'POST',
    dataType: 'JSON'
  })
  .done(function(data) {
    // checks if there is returned data; if none, display no tabs created yet
    if (data.length >0) {
      $('.h2-notabs').css('display', 'none');
    } else{
        $('.h2-notabs').css('display', 'block');
    }
      $.map(data, function(val,index){
        $(".tab-section")
        .append('<div class="tab"><h1>'+val['tabname']+'</h1>'+
        '<img src="images/plus.png" alt="addsign" class="createNote"></div>');
      });
  })
  .fail(function(xhr) {
    console.log("error" +xhr.responseText);
  });



// plugin textarea autosize
 $('#text').flexible();


// opens createtab Modal
  $('#createNew').click(function(event) {
    // resets modal
    $('.deleteshow').hide();
    $('.deletenote').hide();
    $('.creating').show();

    $('#title-modal').val("");
    $('#error').html("");

    $('#modal,#overlay').addClass('active');
    $('body').css('overflow-y', 'hidden');

    $('#createNoteBtn').hide();
    $('#createBtn').show();
    $('.title').html('Enter Tab Name:')
  });

// creates tab
  $('#modal').on('click', '#createBtn', function(event) {
    event.preventDefault();
    let title = $('#title-modal').val();
    if (title.length <= 0) {
      $('#title-modal').attr('placeholder', 'Please Enter a Title');
    } else {

    $.ajax({
      url: '/purenotes/php/includes/tab.inc.php',
      type: 'POST',
      dataType: 'JSON',
      data: {
        title: title
      }
    })
    .done(function(data) {
      if (data[0] == "tabnametaken") {
        $('#error').html('Tab Name is Already Present').css('color', 'red');
      } else{
        $(".tab-section")
        .append('<div class="tab"><h1>'+data+'</h1>'+
        '<img src="images/plus.png" alt="addsign" class="createNote"></div>');

        $('#modal,#overlay').removeClass('active');
        $('body').css('overflow-y', 'auto');

        $('.h2-notabs').css('display', 'none');
          }
    })
    .fail(function(xhr) {
      console.log("error" +xhr.responseText);
      });
    }
});


// closes modal
  $('#close-button').click(function(event) {
    $('#modal,#overlay').removeClass('active');
    $('body').css('overflow-y', 'auto');
  });


});
