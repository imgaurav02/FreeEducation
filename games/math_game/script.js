let timer = document.querySelector('.timer');
let number1 = document.querySelector('.num1');
let number2 = document.querySelector('.num2');
let oper = document.querySelector('.operator');
let answer = document.querySelector('input'); 
let del = document.querySelector('.del');
let progress = document.querySelector('.progress');
let levels = document.querySelector('.level');
let start = document.querySelector('.start');
let reload = document.querySelector('.reload');
let scoreElem = document.querySelector('.score');

let level = 1;
let operArray = ['+', '-', '*', '/'];
let currentOper = operArray[0];
let levelTime = 1000;
let time = levelTime;
let seconds = "";
let problemNumber = 1;
let max = 0;
let maxNumber = 10;
let score = 0;
let randomNumber = 0;
let randomNumber2 = 0;


function setLevelOptions(level){
    for(let i = 0; i < level; i++){
        time = levelTime - (i * 10);
    }

    switch(true){
        case level >= 10 && level < 20: maxNumber = 100;
        break;

        case level >= 20 && level < 50: max = 1; maxNumber = 100;
        break;

        case level >= 50 && level < 75: max = 2; maxNumber = 100;
        break;

        case level >= 75: max = 3; maxNumber = 1000;
        break;
    }

    currentOper = operArray[chooseOperator(max)];
}


function reloadGame(){
    answer.style.animation = 'none';
    level = 1;
    levelTime = 1000;
    time = levelTime;
    score = 0;
    max = 0;
    clearInterval(seconds);
    reload.removeEventListener('click', reloadGame);
    start.addEventListener('click', startGame);
    
    timer.innerText = "";
    number1.innerText = "";
    number2.innerText = "";
    oper.innerText = "";
    answer.value = '';
    levels.innerText = "";
    scoreElem.innerText = "";
    for(let i = 0; i < progress.children.length; i++){
        progress.children[i].classList.remove('complete');
    }
    problemNumber = 1;
    setLevelOptions(level);
    start.style.background = '#1ae5a8';
}

function chooseOperator(max){
    return Math.floor(Math.random() * (max - 0 + 1)) - 0;
}


function startGame(){
    start.removeEventListener('click', startGame);
    reload.addEventListener('click', reloadGame);

    answer.style.animation = '5s focus infinite alternate cubic-bezier(0.215, 0.610, 0.355, 1)';


    let sec = 1;

    if(time > 0){
        seconds = setInterval(function(){
            timer.innerText = time;
            time -= 1;
            sec = 1000;
            clearInterval(seconds);
            seconds = setInterval(function(){
                timer.innerText = time;
                time -= 1;
                seconds ;
                if(time == 0){
                    levels.innerText = level;
                    number1.innerText = "X";
                    number2.innerText = "X";
                    timer.innerText = "Time's up, you loose!";
                    clearInterval(seconds);
                }
            }, sec);
        }, sec);
    }

    if(currentOper === '/'){
        divisionNumberGenerator();
    } else {
        randomNumber = Math.floor(Math.random() * (maxNumber - 0 + 1)) - 0;
        randomNumber2 = Math.floor(Math.random() * (maxNumber - 0 + 1)) - 0;
    }
    

    number1.innerText = randomNumber;
    number2.innerText = randomNumber2;
    oper.innerText = currentOper;
    levels.innerText = level+"/100";
    scoreElem.innerText = score;
}

function add(num1, num2){
    return Number(num1) + Number(num2);
}

function substract(num1, num2){
    return num1 - num2;
}

function multiply(num1, num2){
    return num1 * num2;
}

function divide(num1, num2){
    return num1 / num2;
}


function nextProblem(level){
    clearInterval(seconds);

    answer.value = '';
    setLevelOptions(level);
    startGame();
}

function divisionNumberGenerator(){
    randomNumber = Math.floor(Math.random() * (1000 - 0 + 1)) - 0;
    randomNumber2 = Math.floor(Math.random() * (1000 - 0 + 1)) - 0;
    
    if(!Number.isInteger(randomNumber / randomNumber2)){
        divisionNumberGenerator();
    } else {
        return;
    }
}

function checkLevel(){

    if(score === 999){
        scoreElem.innerText = "You Win!!!";
        clearInterval(seconds);
        timer.innerText = "";
        number1.innerText = "";
        number2.innerText = "";
        oper.innerText = "";
        answer.value = '';
        levels.innerText = "";
        start.style.background = 'gold';
        return;
    }

    if(problemNumber < 10){
        for(let i = 0; i < problemNumber; i++){
            progress.children[i].classList += ' complete';
        }
        problemNumber++;
        score++;
        scoreElem.innerText = score;
    } else {
        for(let i = 0; i < progress.children.length; i++){
            progress.children[i].classList.remove('complete');
        }
        problemNumber = 1;
        level++;
        setLevelOptions(level);
        levels.innerText = level;
        score++;
        scoreElem.innerText = score;
    }
    nextProblem(level);
}

setLevelOptions(level);
start.addEventListener('click', startGame);

del.addEventListener('click', () => {
    answer.value = '';
});

answer.addEventListener('keyup', (e) => {
    switch(currentOper){
        case '+': if(add(number1.innerText, number2.innerText) == e.target.value){
            checkLevel();
        };
        break;
        
        case '-': if(substract(number1.innerText, number2.innerText) == e.target.value){
            checkLevel();
        };
        break;

        case '*': if(multiply(number1.innerText, number2.innerText) == e.target.value){
            checkLevel();
        };
        break;

        case '/': if(divide(number1.innerText, number2.innerText) == e.target.value){
            checkLevel();
        };
        break;
    }
});