const choices = document.querySelectorAll('.choices')
    score = document.querySelector('#score'),
    result = document.querySelector('#result'),
    modal = document.querySelector('.modal'),
    restart = document.querySelector('#restart')

    scoreBoard = {
        player: 0,
        computer: 0
    };

// Play Game

function play(event) {
    restart.style.display = 'inline-block'
    const playerChoice = event.target.id
    const computerChoice = getComputerChoice()
    const winner = getWinnner(playerChoice ,computerChoice)
    showWinner(winner, computerChoice)
}

// Get Computer Choice

function getComputerChoice() {
    const rand = Math.random()
    if (rand <= 0.34) {
        return 'rock'
    }else if (rand <= 0.67) {
            return 'paper'
    }else {
        return 'scissors'
    }
}

// Get Winner

function getWinnner(player, computer) {
    if (player === computer) {
        return 'draw'
    }else if (player === 'rock') {
        if (computer === 'paper') {
            return 'computer'
        }else{
            return 'player'
        }
    }else if(player === 'paper') {
        if (computer === 'scissors') {
            return 'computer'
        }else{
            return 'player'
        }
    }else if (player === 'scissors') {
        if (computer === 'rock') {
            return 'computer'
        }else{
            return 'player'
        }
    }
}

// Show Winner

function showWinner(winner, computerChoice) {
    if (winner === 'player') {
        scoreBoard.player++
        result.innerHTML = `
            <h1 class='text-win'>You Win!</h1>
            <i class='computer fas fa-hand-${computerChoice} fa-10x'></i>
            <p>Computer Chose <p class="text-win">${computerChoice.charAt(0).toUpperCase() + computerChoice.slice(1)}</p></p>
        `
    }else if (winner === 'computer'){
        scoreBoard.computer++
        result.innerHTML=
            `<h1 class='text-lose'>You Lose!</h1>
            <i class='computer fas fa-hand-${computerChoice} fa-10x'></i>
            <p>Computer Chose <p class="text-lose">${computerChoice.charAt(0).toUpperCase() + computerChoice.slice(1)}</p></p>`
    }else{
        result.innerHTML=
            `<h1 class='text-win'>It's A Draw!</h1>
            <i class='computer fas fa-hand-${computerChoice} fa-10x'></i>
            <p>Computer Chose <p class="text-win">${computerChoice.charAt(0).toUpperCase() + computerChoice.slice(1)}</p></p>`
    }
    score.innerHTML = `
        <p> You: ${scoreBoard.player} </p>
        <p> Computer: ${scoreBoard.computer} </p>
    `
    modal.style.display = 'block'
}

// Restart Game

function restartGame() {
    scoreBoard.player = 0
    scoreBoard.computer = 0
    score.innerHTML = `
    <p> Player: ${scoreBoard.player} </p>
    <p> Computer: ${scoreBoard.computer} </p>`

}
// Clear Modal

function clearModal(event) {
    if (event.target == modal) {
        modal.style.display = 'none'
    }
}

// Event Listener

choices.forEach(choice => {
    return choice.addEventListener('click', play)
})
window.addEventListener('click', clearModal)
restart.addEventListener('click', restartGame)