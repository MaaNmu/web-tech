const buttons = document.querySelectorAll(".drum");

buttons.forEach(button=>{
    button.addEventListener("click",()=>{
        playSound(button.textContent);
        buttonAnimation(button.textContent);
    });
});

document.addEventListener("keydown",(event)=>{
    playSound(event.key);
    buttonAnimation(event.key);
});

function playSound(key) {
    let audio;
    switch (key) {
      case "w":
        audio = new Audio("sounds/tom-1.mp3");
        break;
      case "a":
        audio = new Audio("sounds/tom-2.mp3");
        break;
      case "s":
        audio = new Audio("sounds/tom-3.mp3");
        break;
      case "d":
        audio = new Audio("sounds/tom-4.mp3");
        break;
      case "j":
        audio = new Audio("sounds/snare.mp3");
        break;
      case "k":
        audio = new Audio("sounds/crash.mp3");
        break;
      case "l":
        audio = new Audio("sounds/kick-bass.mp3");
        break;
      default:
        console.log("Invalid key pressed");
        return;
    }
    audio.play();
  }
  
  function buttonAnimation(currentKey) {
    const activeButton = document.querySelector(`.${currentKey}`);
    if (activeButton) {
      activeButton.classList.add("pressed");
      setTimeout(() => {
        activeButton.classList.remove("pressed");
      }, 100);
    }
  }