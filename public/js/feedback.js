
    function sendFeedback() {

      if (validateForm() === false) {
        alert('Необходимо заполнить все поля!')

        return;
      }

      axios.post('/feedback', {
        sender_name: $('#sender_name').val(),
        sender_mail_or_phone: $('#sender_mail_or_phone').val(),
        body: $('#body').val(),
    })
    .then(function (response) {
        if (response.data.status == 'ok') {
          $('#feedback-form').html('<center>Ваше сообщение отправлено</center><br>')
        } else {
          $('#feedback-form').html('<center><b>Ошибка. Сообщение не отправлено!</b></center><br>')
        }
    })
    .catch(function (error) {
      console.log(error);
    });
  }

  function validateForm() {

    let isValid = true;

    $('.form-field').each(function () {
        if ($(this).val() === '') {
            isValid = false;
        }
    })

    return isValid;
  }
