window.addEventListener("reload", function () {
  console.log("The page has been reloaded");
});

window.onload = function () {
  console.log("The page has been reloaded......");
};

var section1 = document.querySelector(".section1");
var section2 = document.querySelector(".section2");
var section3 = document.querySelector(".section3");
var section4 = document.querySelector(".section4");
var section5 = document.querySelector(".section5");
var btn1 = document.querySelector("#btn1");
var btn2 = document.querySelector("#btn2");
var btn3 = document.querySelector("#btn3");
var btn4 = document.querySelector("#btn4");
var btn5 = document.querySelector("#btn5");

btn1.addEventListener("click", function () {
  section1.style.display = "block";
  section2.style.display = "none";
  section3.style.display = "none";
  section4.style.display = "none";
  section5.style.display = "none";

  btn1.style.backgroundColor = "#fff";
  btn1.style.color = "#000";
  btn2.style.backgroundColor = "#0D6EFD";
  btn2.style.color = "#fff";
  btn3.style.backgroundColor = "#0D6EFD";
  btn3.style.color = "#fff";
  btn4.style.backgroundColor = "#0D6EFD";
  btn4.style.color = "#fff";
  btn5.style.backgroundColor = "#0D6EFD";
  btn5.style.color = "#fff";

  event.preventDefault();
  const section = document.querySelector(".section1");
  section.scrollIntoView({ behavior: "smooth" });
});

btn2.addEventListener("click", function () {
  section1.style.display = "none";
  section2.style.display = "block";
  section3.style.display = "none";
  section4.style.display = "none";
  section5.style.display = "none";

  btn1.style.backgroundColor = "#0D6EFD";
  btn1.style.color = "#fff";
  btn2.style.backgroundColor = "#fff";
  btn2.style.color = "#000";
  btn3.style.backgroundColor = "#0D6EFD";
  btn3.style.color = "#fff";
  btn4.style.backgroundColor = "#0D6EFD";
  btn4.style.color = "#fff";
  btn5.style.backgroundColor = "#0D6EFD";
  btn5.style.color = "#fff";
  const section = document.querySelector(".section2");
  section.scrollIntoView({ behavior: "smooth" });
});

btn3.addEventListener("click", function () {
  section1.style.display = "none";
  section2.style.display = "none";
  section3.style.display = "block";
  section4.style.display = "none";
  section5.style.display = "none";

  btn1.style.backgroundColor = "#0D6EFD";
  btn1.style.color = "#fff";
  btn2.style.backgroundColor = "#0D6EFD";
  btn2.style.color = "#fff";
  btn3.style.backgroundColor = "#fff";
  btn3.style.color = "#000";
  btn4.style.backgroundColor = "#0D6EFD";
  btn4.style.color = "#fff";
  btn5.style.backgroundColor = "#0D6EFD";
  btn5.style.color = "#fff";

  const section = document.querySelector(".section3");
  section.scrollIntoView({ behavior: "smooth" });
});

btn4.addEventListener("click", function () {
  section1.style.display = "none";
  section2.style.display = "none";
  section3.style.display = "none";
  section4.style.display = "block";
  section5.style.display = "none";

  btn1.style.backgroundColor = "#0D6EFD";
  btn1.style.color = "#fff";
  btn2.style.backgroundColor = "#0D6EFD";
  btn2.style.color = "#fff";
  btn3.style.backgroundColor = "#0D6EFD";
  btn3.style.color = "#fff";
  btn4.style.backgroundColor = "#fff";
  btn4.style.color = "#000";
  btn5.style.backgroundColor = "#0D6EFD";
  btn5.style.color = "#fff";

  const section = document.querySelector(".section4");
  section.scrollIntoView({ behavior: "smooth" });
});

btn5.addEventListener("click", function () {
  section1.style.display = "none";
  section2.style.display = "none";
  section3.style.display = "none";
  section4.style.display = "none";
  section5.style.display = "block";

  btn1.style.backgroundColor = "#0D6EFD";
  btn1.style.color = "#fff";
  btn2.style.backgroundColor = "#0D6EFD";
  btn2.style.color = "#fff";
  btn3.style.backgroundColor = "#0D6EFD";
  btn3.style.color = "#fff";
  btn4.style.backgroundColor = "#0D6EFD";
  btn4.style.color = "#fff";
  btn5.style.backgroundColor = "#fff";
  btn5.style.color = "#000";

  const section = document.querySelector(".section5");
  section.scrollIntoView({ behavior: "smooth" });
});

let selected = 0;
var radio_btns = document.getElementsByName("optradio");
for (var i = 0; i < radio_btns.length; i++) {
  radio_btns[i].addEventListener("click", function (e) {
    let selected = e.target.value;
    console.log(selected);
    setCookie("myCookie", selected, 1);
  });
}

//creating cookies to pass varaibles from javascript to php

function setCookie(cname, cvalue, exMinutes) {
  var d = new Date();
  d.setTime(d.getTime() + exMinutes * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

const listItems = document.querySelectorAll("li");
listItems.innerHTML = "";
listItems.forEach(function (item) {
  if (!item) {
    item.innerHTML += item.innerHTML;
  }
});


let remove = 0;
var remove_btns = document.getElementsByName("remove");
for (var i = 0; i < remove_btns.length; i++) {
  remove_btns[i].addEventListener("click", function (e) {
    remove = e.target.value;
    setCookie("remove", remove, 1);
  });
}

var value = "all";
var select = document.getElementById("filter");
select.addEventListener("change", function (e) {
  setCookie("selected", e.target.value, 1);
});
