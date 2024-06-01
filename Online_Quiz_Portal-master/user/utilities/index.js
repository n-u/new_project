let questions = window.arraysModule.getQuestions();
let option = window.arraysModule.getOptions();
let answers = window.arraysModule.getAnswers();
let question_num = [];

for (let i = 0; i < questions.length; i++) {
  question_num[i] = i + 1;
}

console.log(question_num);

let zero = document.getElementsByClassName("zero")[0];
let main_btn = document.getElementsByClassName("start")[0];
let info = document.getElementsByClassName("info")[0];
let exit = document.getElementsByClassName("info-exit")[0];
let cont = document.getElementsByClassName("info-con")[0];
let exit_quiz = document.getElementsByClassName("exit-quiz")[0];
let res = document.getElementsByClassName("res")[0];
let question = document.getElementsByClassName("question")[0];
let ques_no = document.getElementById("ques-no");
let ques = document.getElementsByClassName("ques")[0];
let options = document.getElementsByClassName("options");
let left = document.getElementById("left");
let sec = document.getElementById("sec");
let next_btn = document.getElementsByClassName("next-btn")[0];
let end = document.getElementsByClassName("end")[0];
let obtained = document.getElementById("obtained");
let total_ques = document.getElementsByClassName("total-ques");
let tries = document.getElementsByClassName("tries")[0];
let logout_btn = document.getElementById("logout-btn");
let crown = document.querySelector(".crown h2");
console.log(crown);
total_ques[0].innerHTML = questions.length;
total_ques[1].innerHTML = questions.length;
total_ques[2].innerHTML = questions.length;
let i = 0;
let stop_time = 0;
let score = 0;
let chk_next = false;

if (questions.length == 0) {
  zero.style.display = "block";
  info.style.display = "none";
  tries.style.display = "none";
}

logout_btn.addEventListener("click", () => {
  console.log("logout button clicked");
  setCookie("logout", false, 1);
});

exit.addEventListener("click", () => {
  info.style.display = "block";
  main.style.display = "none";
});

cont.addEventListener("click", () => {
  info.style.display = "none";
  question.style.display = "block";
  startQuiz(i);
});

exit_quiz.addEventListener("click", () => {
  resetter();
  info.style.display = "block";
  main.style.display = "block";
});

next_btn.addEventListener("click", () => {
  if (chk_next) {
    ColorSetter();
    optionEnabler();
    i++;
    if (i == questions.length) {
      if (score <= questions.length / 2) {
        crown.innerText = "Better luck next time!!!";
      }
      info.style.display = "none";
      question.style.display = "none";
      end.style.display = "block";
    } else {
      startQuiz(i);
      chk_next = false;
    }
  } else alert("Please select an option!!!");
});

function ColorSetter() {
  for (let j = 0; j < options.length; j++) {
    options[j].style.backgroundColor = "#1e8fff28";
  }
}

function optionDisabler() {
  for (let j = 0; j < options.length; j++) {
    options[j].classList.add("disable");
  }
}

function optionEnabler() {
  for (let j = 0; j < options.length; j++) {
    options[j].classList.remove("disable");
  }
}

function resetter() {
  end.style.display = "none";
  score = 0;
  i = 0;
}

function setCookie(cname, cvalue, exMinutes) {
  var d = new Date();
  d.setTime(d.getTime() + exMinutes * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

for (let j = 0; j < options.length; j++) {
  options[j].addEventListener("click", () => {
    chk_next = true;
    if (options[j].innerHTML == answers[i]) {
      options[
        j
      ].innerHTML += `<i class="fa fa-check-circle" style="color:green"></i>`;
      options[j].style.backgroundColor = `rgba(0, 128, 0, 0.217)`;
      score++;
    } else {
      options[
        j
      ].innerHTML += `<i class="fa fa-times-circle" style="color:red"></i>`;
      options[j].style.backgroundColor = `rgba(255, 0, 0, 0.215)`;
      let index = option[i].indexOf(answers[i]);
      console.log("value of index is:", index);
      options[
        index
      ].innerHTML += `<i class="fa fa-check-circle" style="color:green"></i>`;
      options[index].style.backgroundColor = `rgba(0, 128, 0, 0.217)`;
    }
    optionDisabler();
    obtained.innerHTML = score;
    setCookie("score", score, 1);
  });
}

function startQuiz(i) {
  clearInterval(stop_time);

  let seconds = 15;
  ques_no.innerHTML = question_num[i];
  ques.innerHTML = questions[i];
  left.innerHTML = question_num[i];
  for (let j = 0; j < option[i].length; j++) {
    options[j].innerHTML = option[i][j];
  }
  stop_time = setInterval(() => {
    sec.innerHTML = seconds;
    seconds--;
    if (seconds == -1) {
      optionDisabler();
      clearInterval(stop_time);
      if (!chk_next) {
        let index = option[i].indexOf(answers[i]);
        options[
          index
        ].innerHTML += `<i class="fa fa-check-circle" style="color:green"></i>`;
        options[index].style.backgroundColor = `rgba(0, 128, 0, 0.217)`;
      }
      chk_next = true;
    }
  }, 900);
}
