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

$("#loginForm").submit((evt) => {
  evt.preventDefault();

  var username = $("#uname").val();
  var password = $("#password").val();

  if (username == "" || password == "") {
    toastr.warning("Fill in the required details", "Missing Info");

    if (password == "") $("#password").focus();
    if (username == "") $("#uname").focus();
    return;
  }

  $.ajax({
    url: "controllers/login.php",
    method: "POST",
    data: {
      username: username,
      password: password,
    },
    success: (result) => {
      console.log(result);
      if (result.message == 1) window.location.href = "admin.php";

      if (result.message == 2)
        toastr.error("Incorrect Username or Password", "Invalid Credentials");
    },
    error: () => toastr.error("Something went wrong"),
  });
});
