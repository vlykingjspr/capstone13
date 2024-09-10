const prevBtns = document.querySelectorAll(".prev-butt");
const nextBtns = document.querySelectorAll(".nxt-butt");
const formSteps = document.querySelectorAll(".fcon");
const progress = document.getElementById("progress");
const progressSteps = document.querySelectorAll(".progress-step");
let formStepsNum = 0;



nextBtns.forEach((btn) => 
{
  btn.addEventListener("click", () => 
  {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => 
{
    btn.addEventListener("click", () => 
    {
      formStepsNum--;
      updateFormSteps();
      updateProgressbar();
    });
  });


function updateFormSteps() 
{
    formSteps.forEach((formStep) => {
      formStep.classList.contains("fcon-active") &&
        formStep.classList.remove("fcon-active");
        window.scrollTo ({top: 0, behavior:'smooth'});
    });
  
    formSteps[formStepsNum].classList.add("fcon-active");
  }

  function updateProgressbar() {
    progressSteps.forEach((progressStep, idx) => {
      if (idx < formStepsNum + 1) {
        progressStep.classList.add("progress-step-active");
      } else {
        progressStep.classList.remove("progress-step-active");
      }
    });
  
    const progressActive = document.querySelectorAll(".progress-step-active");
  
    progress.style.width =
      ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
  }