/* global $ */

var randomNumber = Math.floor(Math.random() * 99) + 1;
var guesses = document.querySelector('#guesses');
var lastResult = document.querySelector('#lastResult');
var lowOrHi = document.querySelector('#lowOrHi');
var guessSubmit = document.querySelector('.guessSubmit');
var guessField = document.querySelector('.guessField');
var guessCount = 1;
var resetButton = document.querySelector('#reset');
var userGuesses = "";
var totalNumberOfGames = 1;

$(document).ready(function() {
    console.log("running on ready");
    guessField.focus();
    resetButton.style.display = 'none';
    guessSubmit.addEventListener("click", checkGuess);

    function checkGuess() {
        var userGuess = Number(guessField.value);
        if (userGuess > 99 || isNaN(userGuess) == true || userGuess == "") {
            guesses.innerHTML = "Please enter a number from 0-99";
            guessField.value = "";
            guessField.focus();
            return;
        }

        if (isNaN(userGuess) == false) {
            console.log(userGuess);
            console.log(typeof(userGuess));
            userGuesses += userGuess + " ";
            guesses.innerHTML = "Previous guesses: " + userGuesses;
        }

        if (userGuess === randomNumber) {
            lastResult.innerHTML = "Congratulations! You got it right!";
            lastResult.style.backgroundColor = "green";
            lowOrHi.innerHTML = "";
            totalNumberOfGames += 1;
            setGameOver();
        }
        else if (guessCount === 7) {
            lastResult.innerHTML = "Sorry, you lost!";
            setGameOver();
            if (userGuess < randomNumber) {
                lowOrHi.innerHTML = "Last guess was too low! <br> Total number of games: " + totalNumberOfGames;
            }
            else if (userGuess > randomNumber) {
                lowOrHi.innerHTML = "Last guess was too high! <br> Total number of games: " + totalNumberOfGames;
            }
            totalNumberOfGames += 1;
        }
        else {
            lastResult.innerHTML = "Wrong!";
            lastResult.style.backgroundColor = "red";
            if (userGuess < randomNumber) {
                lowOrHi.innerHTML = "Last guess was too low!";
            }
            else if (userGuess > randomNumber) {
                lowOrHi.innerHTML = "Last guess was too high!";
            }
        }
        guessCount++;
        guessField.value = "";
        guessField.focus();
    }

    function setGameOver() {
        guessField.disabled = true;
        guessSubmit.disabled = true;
        resetButton.style.display = "inline";
        resetButton.addEventListener("click", resetGame);
    }

    // function setGameOver() {
    //     console.log("JQUERY SETGAMEOVER");
    //     $(".guessField").prop("enabled", false);
    //     $(".guessSubmit").prop("enabled", false);
    //     $("#reset").css("display", "inline-block");
    //     $("#resetButton").on("click", resetGame());
    //     
    // } doesn't work

    function resetGame() {
        guessCount = 1;

        var resetParas = document.querySelectorAll(".resultParas p");
        for (var i = 0; i < resetParas.length; i++) {
            resetParas[i].textContent = "";
        }

        resetButton.style.display = "none";

        userGuesses = "";

        guessField.disabled = false;
        guessSubmit.disabled = false;
        guessField.value = "";
        guessField.focus();

        lastResult.style.backgroundColor = "white";

        randomNumber = Math.floor(Math.random() * 99) + 1;
    }
})
