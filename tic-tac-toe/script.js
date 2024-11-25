const cells = document.querySelectorAll('[data-cell]');
const winningMessageTextElement = document.getElementById('winner');
const winningMessageElement = document.getElementById('winningMessage');
const restartButton = document.getElementById('restartButton');
let isCircleTurn = false;

const winningCombinations = [
  [0, 1, 2],
  [3, 4, 5],
  [6, 7, 8],
  [0, 3, 6],
  [1, 4, 7],
  [2, 5, 8],
  [0, 4, 8],
  [2, 4, 6],
];

function startGame() {
  isCircleTurn = false;
  cells.forEach(cell => {
    cell.classList.remove('taken', 'x', 'o'); // Remove all classes
    cell.textContent = ""; // Clear the cell's text
    cell.removeEventListener('click', handleClick); // Remove old event listener
    cell.addEventListener('click', handleClick, { once: true }); // Add new listener
  });
  winningMessageElement.classList.remove('show'); // Hide the winning message
}

function handleClick(e) {
  const cell = e.target;
  const currentClass = isCircleTurn ? 'o' : 'x';
  placeMark(cell, currentClass);
  
  if (checkWin(currentClass)) {
    endGame(false);
  } else if (isDraw()) {
    endGame(true);
  } else {
    swapTurns();
  }
}

function placeMark(cell, currentClass) {
  cell.classList.add(currentClass, 'taken');
  cell.textContent = currentClass.toUpperCase();
}

function swapTurns() {
  isCircleTurn = !isCircleTurn;
}

function checkWin(currentClass) {
  return winningCombinations.some(combination => {
    return combination.every(index => {
      return cells[index].classList.contains(currentClass);
    });
  });
}

function isDraw() {
  return [...cells].every(cell => {
    return cell.classList.contains('x') || cell.classList.contains('o');
  });
}

function endGame(draw) {
  if (draw) {
    winningMessageTextElement.textContent = "It's a Draw!";
  } else {
    winningMessageTextElement.textContent = `${isCircleTurn ? "O's" : "X's"} Wins!`;
  }
  winningMessageElement.classList.add('show');
}

restartButton.addEventListener('click', startGame);

startGame();
