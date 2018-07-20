;var c_app = (function CommentsApp() {
   var self = this,
       commentsContainer = $('.com_comment_container').eq(0),
       ret = {},
       divLine_c = $('<div>', {class: 'row comm_line'}),
       divDate_c = $('<div>', {class: 'col-xs-4 comm_date_cell'}),
       divText_c = $('<div>', {class: 'col-xs-8 comm_text_cell'});

   ret.commentsCleaned = false;

   ret.renderModalComments = (comments) => {
      commentsContainer.empty();
      if(comments.length < 1){
         commentsContainer.text('Комментариев еще нет');
      }
      comments.forEach(function(comment){
         ret.commentsCleaned = true;
         c_app.addModalComment(comment);
      }, self);
   }

   ret.addModalComment = (comment) => {
      var newLine =
         divLine_c
            .clone()
            .appendTo(commentsContainer);
      divDate_c
         .clone()
         .text(comment.add_date)
         .appendTo(newLine);
      divText_c
         .clone()
         .text(comment.text)
         .appendTo(newLine);
   }

   ret.getCommentsContainer = () => {
      return commentsContainer;
   }

   ret.showModal = (comment_type) => {
      $('.com_comment_grey_bgr').fadeIn(50, function(){
         var commentWnd = $('.com_comment_wnd').eq(0);
         commentWnd.attr({
            'comment_type': comment_type
         });
         commentWnd.fadeIn(200);
      });
   }
   ret.hideModal = () => {
      $('.com_comment_grey_bgr').hide();
      $('.com_comment_wnd').hide();
      commentsContainer.empty().text('Комментариев еще нет');
   }

   return ret;
})();



$(document).ready(function(){
   $('body')

      .on('click', '.com_info-redactBtn', function(){
         var url = window.location.pathname.split('/'),
             com_id = url[url.length-1],
             comment_type = $(this).attr('redact_type');
          $.ajax({
             url: '/index.php/ajax/getComments/' + comment_type + '/' + com_id,
             type: 'POST',
             dataType: 'json',
             success: function(data) {
                c_app.renderModalComments(data);
                c_app.showModal(comment_type);
             },
             error: function(){
               alert('Ошибка открытия комментариев');
             }
          });
      })

      .on('click', '.com_comment_devider > img', function(){
         c_app.hideModal();
      })

      .on('click', '#comment_add_button', function(){
         var url = window.location.pathname.split('/'),
             com_id = url[url.length-1],
             ta = $('#comment_textarea');
         $.ajax({
           url: '/index.php/ajax/saveComment/' + $('.com_comment_wnd').eq(0).attr('comment_type') + '/' + com_id,
           type: 'POST',
           data: {
             text: ta.val()
           },
           dataType: 'json',
           success: function(data) {
             if( !c_app.commentsCleaned ){
                c_app.getCommentsContainer().empty();
                c_app.commentsCleaned = true;
             }
             c_app.addModalComment({
                add_date: data.date,
                text: ta.val()
             });
             ta.val('');
           }
         });
      })


});//docready ends
