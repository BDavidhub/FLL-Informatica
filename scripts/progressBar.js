// const prev = document.querySelector(".js-prev");
const next = document.querySelectorAll(".js-next");
const progressBar = document.querySelector(".js-bar");
const circles = document.querySelectorAll(".js-circle");
const next1 = document.querySelectorAll(".btn-acquista");
var url_string = window.location.href;
var url = new URL(url_string);
var n = url.searchParams.get("n");

let currentActive = n;
const update = function () {
  circles.forEach((circle, i) => {
    i < currentActive
      ? circle.classList.add("active")
      : circle.classList.remove("active");
  });

  const actives = document.querySelectorAll(".active");

  progressBar.style.width = `${
    ((actives.length - 2) / (circles.length-1)) * 100
  }%`;

  // if (currentActive === 1) prev.disabled = true;
  // else if (currentActive === circles.length) next.disabled = true;
  // else {
  //   prev.disabled = false;
  //   next.disabled = false;
  // }
};
if(currentActive>0){

  currentActive > circles.length && (currentActive = circles.length);

  update();
}
next.forEach(next => next.addEventListener("click", () => {
  currentActive++;

  currentActive > circles.length && (currentActive = circles.length);

  update();
}));

