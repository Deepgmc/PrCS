$(document).ready(function(){
   $('#loginForm').on('submit', (event) => {
      event.preventDefault();
      var login = $('#loginForm').children('input[type=text]').val();
      $.ajax({
         url: '/index.php/ajax/login',
         type: 'POST',
         dataType: 'json',
         data: { 'login': login },
         success: function(data) {
           if(data){
              // успешно, на стороне сервера стартанули сессию, перезагружаемся с логином
              window.location.reload();
           } else {
              $('.hrd_error').fadeIn();
           }
         },
         error: function(){
           alert('Ошибка аутентификации');
         }
      });
   });
   $('#logoutBtn').on('click', (event) => {
      event.preventDefault();
      $.ajax({
         url: '/index.php/ajax/logout',
         type: 'POST',
         success: function(data) {
           window.location.reload();
         }
      });

   });
});
