const prev = document.querySelector(".js-prev");
const next = document.querySelector(".js-next");
const progressBar = document.querySelector(".js-bar");
const circles = document.querySelectorAll(".js-circle");

let currentActive = 0;

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

  if (currentActive === 1) prev.disabled = true;
  else if (currentActive === circles.length) next.disabled = true;
  else {
    prev.disabled = false;
    next.disabled = false;
  }
};

next.addEventListener("click", () => {
  currentActive++;

  currentActive > circles.length && (currentActive = circles.length);

  update();
});

prev.addEventListener("click", () => {
  currentActive--;

  currentActive < 1 && (currentActive = 1);

  update();
});
