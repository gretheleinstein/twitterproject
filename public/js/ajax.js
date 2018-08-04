window.onload = function(){
  disableButton($("#btn_tweet"));
  fetchPosts();
}

setInterval(fetchPosts, 30000);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function fetchPosts(){
  $.ajax({
    url: '/twitter/public/index',
    dataType: 'json'
  })
  .done(function(data) {
    console.log("success");
    displayPosts(data);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}

function displayPosts(data){
  var tweets ="";
  $.each(data, function(key, value) {
    tweets += '<div class="card">';
    tweets += '<div class="card-body">';
    tweets += '<div class="row">';
    tweets += '<div class="col-1 col-sm-2 col-md-2 col-lg-1 ml-4" style="padding:0"> ';
    tweets += '<img class="img-fluid" style="" src="images/avatar/avatar.png"></div>';
    tweets += '<div class="col-8 col-sm-8 col-md-8 col-lg-9"> ';
    tweets += '<span class="card-text acc-name">'+ value.name +'</span> <span class="acc-uname">@'+ value.username +'</span>';
    tweets += '<br/><span>'+value.content+'</span><br/><span class="posted-time">'+ value.posted_time +'</span>';
    tweets += '</div>';
    tweets += '<div class="col-1 col-sm-1 col-md-1 col-lg-1">';
    (value.my_posts == "Yes") ? tweets += '<button class="btn float-right btn_dialog" onclick="btnDeleteClicked('+value.post_id+')">&times;</button>' : '';
    tweets += '</div> </div> </div> </div>';
  });
  $("#div_tweets").html(tweets);
}

$("#btn_tweet").click(function(event) {
  event.preventDefault();
  disableButton($(this));
  var form_action = $("#frm_tweet").attr("action");
  var content = $("textarea[name='txtarea_content']").val();

  $.ajax({
    url: form_action,
    type: 'POST',
    dataType: 'json',
    data: {content: content}
  })
  .done(function(data) {
    console.log("success");
    $("#txtarea_content").val("");
    $('#letter_counter').text("140");
    fetchPosts();
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
});

function btnDeleteClicked(id){
  $(".modal").modal('show');
  $("#btn_delete_modal").click(function(event) {
    $.ajax({
      url: '/twitter/public/delete/' + id,
      type: 'delete',
      dataType: 'json',
    })
    .done(function() {
      console.log("success");
      $(".modal").modal('hide');
      fetchPosts();
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  });
}

$('.ajax-form').submit(function(e) {
    e.preventDefault();
    var form = $('.ajax-form');
    var url = form.attr('action');
    var data = form.serialize();
    $('.span-error').html('');

        $.ajax({
          url: url,
          type: 'POST',
          data: data
        })
        .done(function() {
          console.log("success");
          form.unbind('submit').submit();
        })
        .fail(function(data) {
          console.log("error");
          var errors = data.responseJSON;
          console.log('server errors',errors);
          $.each(errors, function(index, el) {
            for(var i in el){
              var field = $('.field_'+ i);
              field.html(el[i]);
              $('input[name="'+i+'"]').css('border-color', '#DD4F42');
            }
          });
        })
        .always(function() {
          console.log("complete");
        });
});


function disableButton(button){
  $(button).attr('disabled', 'true');
  $(button).css('cursor', 'not-allowed');
}

function removeDisable(button){
  $(button).removeAttr('disabled');
  $(button).css('cursor', 'pointer');
}

var maxLength = 140;

$("#txtarea_content").keyup(function(event) {
    removeDisable($("#btn_tweet"));
    var length = $(this).val().length;
    var finalCount = maxLength-length;
    $('#letter_counter').text(finalCount);
    ($("#txtarea_content").val() == '') ? disableButton($("#btn_tweet")) : removeDisable($("#btn_tweet"));
});
