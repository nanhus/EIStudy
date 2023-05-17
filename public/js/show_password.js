var state1 = false;
function showPassword() {
  if (state1) {
    document.getElementById('password').setAttribute('type', "password");
    state1 = false;
  } else {
    document.getElementById('password').setAttribute("type", "text");
    state1 = true;
  }
}

var state2 = false;
function showRePassword() {
  if (state2) {
    document.getElementById('password_confirmation').setAttribute('type', "password");
    state2 = false;
  } else {
    document.getElementById('password_confirmation').setAttribute("type", "text");
    state2 = true;
  }
}
