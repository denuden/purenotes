$(document).ready(function() {

let tabname;
// for scrolling to top
$('#scrollTop').click(function(event) {
  $('html,body').animate({ scrollTop: 0 }, 'slow');
});

$('.tab-section').on('click', '.tab', function(event) {
  tabname = $(this).find('h1').text(); //for loading(tab btn)

    $.ajax({
      url: '/purenotes/php/includes/notes.load.inc.php',
      type: 'POST',
      dataType: 'JSON',
      data:{
        tabname : tabname
      }
    })
    .done(function(data) {
      // checks if there is returned data; if none, display no tabs created yet

      if (data.length >0) {
        $(".tabContent").html(""); //resets so it wont append every click
        // $('.h2-nonotes').css('display', 'none');
      } else{
        $(".tabContent").html('<h2 class="h2-nonotes">No Notes Created Yet<span>(Click one of your tabs)</span></h2>');
      }
        $.map(data, function(val,index){
          $(".tabContent")
          .append('<div class="underTab-content"><h3>'+val['notename']+'</h3><h5>Created on: '+val['dateCreated']+'</h5></div>');
        });
    })
    .fail(function(xhr) {
      console.log("error" +xhr.responseText);
    });
});



  // opns CreateNote Modal
  $('.tab-section').on('click', '.createNote', function(event) {
    tabname = $(this).parent().find('h1').text(); //for creating(add btn)
    // resets modal
    $('.deleteshow').hide();
    $('.deletenote').hide();
    $('.creating').show();

    $('#title-modal').val("");
    $('#error').html("");
    // opens overlay
    $('#modal,#overlay').addClass('active');
    $('body').css('overflow-y', 'hidden');

    $('.title').html('Enter Your Note Title:')
    $('#createNoteBtn').show();
    $('#createBtn').hide();
  });

//CreateNote Final
  $('#modal').on('click', '#createNoteBtn', function(event) {
event.preventDefault();
    let title = $('#title-modal').val();
    if (title.length <= 0) {
      $('#title-modal').attr('placeholder', 'Please Enter a Title');
    } else {

      $.ajax({
        url: '/purenotes/php/includes/notes.inc.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
          tabname: tabname,
          notename: $('#title-modal').val()
        }
      })
      .done(function(data) {
        $.map(data, function(val, index){
          if (data[0] == "noteistaken") {
            $('#error').html('Note Name is Already Present').css('color', 'red');
          } else{
          $(".tabContent")
          .append('<div class="underTab-content"><h3>'+val.notename+'</h3><h5>Created on: '+val.dateCreated+'</h5></div>');

          $('#modal,#overlay').removeClass('active');
          $('body').css('overflow-y', 'auto');

          $('.h2-nonotes').css('display', 'none');
        }
      });

      })
      .fail(function(xhr) {
        console.log("error" + xhr.responseText);
      });
    }
  });






}); //end ready
