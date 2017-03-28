// JavaScript Document

$(document).ready(function() {
  var i = 8;
  setInterval(function() {
    i-=1;
    if (i < 1) {
      window.location = "http://localhost/form.html";
    }
    $("#time i").text(i);
  }, 1000);
});

