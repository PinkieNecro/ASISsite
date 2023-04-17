var modal = document.getElementById("myModal");
var btn = document.getElementById("TelephoneSend2");
var btn2 = document.getElementById("adminbutton");
var inptvalue = document.getElementById("IntValue");
var inptuser = document.getElementById("TelephoneUser");
var inptmsg = document.getElementById("TelephoneMessage");
var span = document.getElementsByClassName("close");
var myModal2 = document.getElementById("myModal2");
var request;

  $("html").bind('change keyup input click', function () {
      if (inptvalue.value.match(/[^0-9]/g)) {
        inptvalue.value = inptvalue.value.replace(/[^0-9]/g, '');
      }
  });
  $("#TelephoneSend").submit(function(event){
    event.preventDefault();
    if (request) {
      request.abort();
    }
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    $inputs.prop("disabled", true);
    request = $.ajax({
      url: "/auth/src/libs/TelephoneConnection.php",
      type: "post",
      data: serializedData,
    });
    request.always(function () {
      $inputs.prop("disabled", false);
      $(btn).prop('disabled', false);
    });
    request.done(function (jqXHR){
      if (inptvalue.value.length >10){
        if (inptmsg.value.length >0){
          myModal2.innerHTML="Отправка выполнена. Спасибо, с вами свяжутся.";
          $(btn).prop('disabled', true);
          modal.style.display = "block";
          setTimeout(function() {
              inptvalue.value='';
              inptuser.value='';
              inptmsg.value='';
              modal.style.display = "none";
          }.bind(btn), 2e3);
          setTimeout(function() {
              $(btn).prop('disabled', false);
          }.bind(btn), 1e4);
        }
        else
        {
          myModal2.innerHTML="Не заполнено обращение.";
          modal.style.display = "block";
          setTimeout(function() {
            modal.style.display = "none";
          }.bind(btn), 2e3);
        }
      }
      else
      {
        modal.style.display = "block";
        setTimeout(function() {
          modal.style.display = "none";
        }.bind(btn), 2e3);
        myModal2.innerHTML="Не заполнены все данные.";
      }
    });
    request.fail(function (jqXHR){
      modal.style.display = "block";
      setTimeout(function() {
        modal.style.display = "none";
      }.bind(btn), 2e3);
      myModal2.innerHTML="Произошла ошибка.";
    });
    event.preventDefault();
  });
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}