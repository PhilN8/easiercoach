toastr.options = {
  closeButton: true,
  debug: false,
  newestOnTop: false,
  progressBar: false,
  positionClass: "toast-bottom-right",
  preventDuplicates: false,
  onclick: null,
  showDuration: "300",
  hideDuration: "1000",
  timeOut: "5000",
  extendedTimeOut: "1000",
  showEasing: "swing",
  hideEasing: "linear",
  showMethod: "fadeIn",
  hideMethod: "fadeOut",
};

$(".login__form--btn").click(() => {
  var username = $("#username").val();
  var password = $("#password").val();

  if (username == "" || password == "") {
    toastr.warning("Fill in the required details", "Missing Info");

    if (username == "") $("#uname").focus();
    if (password == "") $("#password").focus();
    return;
  }

  document.forms[0].submit();
});
