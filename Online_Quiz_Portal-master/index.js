let heading = document.querySelector(".heading");

let str = "come to Quizlet.io";
let animation = str.split('');
let n = 0;
let stop = setInterval(() => {
    heading.innerHTML += animation[n]
    n++;
    if(n == animation.length){
        clearInterval(stop);
    }
}, 50);