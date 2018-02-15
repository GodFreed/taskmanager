//скрипт берёт данные из полей формы и вносит их текст в элементы модального окна
$(document).ready(function() {
  $('#previousView').click(function () {
    var name = 'Имя: ' + $('input[name="name"]').val();
    var email = 'Email: ' + $('input[name="email"]').val();
    var description = $('textarea[name="description"]').val();
    $('.modal-body p:first').text(name);
    $('.modal-body p:eq(1)').text(email);
    $('.modal-body div').text(description);
  });
});