$(document).ready(function() {
  $('#deleteBtn').click(function(event) {
    event.preventDefault();
    $('.dropdown-content').css('display', 'none');
    $('#modal,#overlay').addClass('active');
    $('body').css('overflow-y', 'hidden');

    $('.creating').hide();
      $('.deletenote').hide();
    $('.deleteshow').show(); //dlete btns

    loaddeltab();
  });


    // load it tabs
function loaddeltab(){
  $.ajax({
    url: '/purenotes/php/includes/deltab.load.inc.php',
    type: 'POST',
    dataType: 'JSON',
  })
  .done(function(data) {
    $.map(data, function(val,index){
        $('.dropdown-content').append('<a href="#">'+val.tabname+'</a>');

    });
  })
  .fail(function(xhr) {
    console.log(xhr.responseText);
  })
}
// // sidebar tabload
// function tabload(){
//   $.ajax({
//     url: '/purenotes/php/includes/tab.load.inc.php',
//     type: 'POST',
//     dataType: 'JSON'
//   })
//   .done(function(data) {
//     // checks if there is returned data; if none, display no tabs created yet
//     if (data.length >0) {
//       $('.h2-notabs').css('display', 'none');
//     } else{
//         $('.h2-notabs').css('display', 'block');
//     }
//       $.map(data, function(val,index){
//         $(".tab-section")
//         .append('<div class="tab"><h1>'+val['tabname']+'</h1>'+
//         '<img src="images/plus.png" alt="addsign" class="createNote"></div>');
//       });
//   })
//   .fail(function(xhr) {
//     console.log("error" +xhr.responseText);
//   });
// }


  $('.dropdown').click(function(event) {
    /* Act on the event */
    // resets
      $('.dropdown-content').html("");

    $('.dropdown-content').css('display', 'block');
      $('.dropdown p').text("");
      loaddeltab();

  });

// drop btn
  $('.dropdown').on('click', '.dropdown-content a', function(event) {
    event.preventDefault();
    let res = $(this).text();
    $.ajax({
      url: '/purenotes/php/includes/delete.tab.inc.php',
      type: 'POST',
      dataType: 'JSON',
      data:{
        tabname : res
      }
    })
    .done(function(data) {
      $.map(data, function(val,index){
            $('.dropdown-content').css('display', 'none');
            $('.dropdown p').text(data);
      });
    })
    .fail(function(xhr) {
      console.log(xhr.responseText);
    });
    location.reload();
  });

  });
