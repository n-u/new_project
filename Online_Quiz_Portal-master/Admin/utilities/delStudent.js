let removeStu = 0;
var remove_stu = document.getElementsByName("removeStu");
for (var i = 0; i < remove_stu.length; i++) {
  remove_stu[i].addEventListener("click", function (e) {
    removeStu = e.target.value;
    setCookie("removeStu", removeStu, 1);
  });
}

function setCookie(cname, cvalue, exMinutes) {
  var d = new Date();
  d.setTime(d.getTime() + exMinutes * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
