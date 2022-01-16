$(document).ready(function() {

let notename;
// clicks notenmaes
$('.tabContent').on('click', '.underTab-content', function(event) {
  event.preventDefault();
//save remove check
$('#check').css({
  marginLeft:'60px',
  opacity:'0'
});

$('.underTab-content').css('background-color', '#FAFAFA');
$(this).css('background-color', '#dbdbdb');

   notename = $(this).find('h3').text();

  $.ajax({
    url: '/purenotes/php/includes/typedNotes.inc.php',
    type: 'POST',
    dataType: 'JSON',
    data: {
      notename: notename
    }
  })
  .done(function(data) {
    $.map(data, function(val, index){
      $('#text').val(val.noteText);
      $('#timestamp').text('Last Edited on: '+val.editTime);
       $('#text').trigger('updateHeight');
    });
  })
  .fail(function() {
    console.log("error");
  })

});
// save
$('#save').click(function(event) {
  event.preventDefault();

  $.ajax({
    url: '/purenotes/php/includes/save.inc.php',
    type: 'POST',
    dataType: 'JSON',
    data: {
      notename: notename,
      noteText: $('#text').val()
    }
  })
  .done(function(data) {
    $.map(data, function(val, index){
      $('#check').css({
        marginLeft:'0px',
        opacity:'1'
      });
    });

  })
  .fail(function() {
    console.log("error");
  })
});

// delete current note
$('#delnote').click(function(event) {
  event.preventDefault();

  $('#modal,#overlay').addClass('active');
  $('body').css('overflow-y', 'hidden');

  $('.creating').hide();
  $('.deleteshow').hide();
  $('.deletenote').show();

});

// delete current note confirmed
$('#delnoteC').click(function(event) {
  event.preventDefault();
    $.ajax({
      url: '/purenotes/php/includes/delete.note.inc.php',
      type: 'POST',
      dataType: 'JSON',
      data: {
        notename: notename
      }
    })
    .done(function(data) {
      console.log(data);
      $('#modal,#overlay').removeClass('active');
      $('body').css('overflow-y', 'auto');
    })
    .fail(function(xhr) {
      console.log("error" + xhr.responseText);
    })

location.reload();
});


});
