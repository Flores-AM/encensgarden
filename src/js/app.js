var marker = document.querySelector("#marker");
var item = document.querySelectorAll("nav a");

function indicator(e) {
  marker.style.left = e.offsetLeft + "px";
  marker.style.width = e.offsetWidth + "px";
}

item.forEach((link) => {
  link.addEventListener("mousemove", (e) => {
    indicator(e.target);
  });
});

// Accordion

const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute("aria-expanded");

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute("aria-expanded", "false");
  }

  if (itemToggle == "false") {
    this.setAttribute("aria-expanded", "true");
  }
}

items.forEach((item) => item.addEventListener("click", toggleAccordion));

// ? Carousel

const options = document.querySelectorAll(".option");

options.forEach((element) => {
  element.addEventListener("click", (event) => {
    options.forEach((el) => el.classList.remove("active"));
    event.target.closest(".option").classList.add("active");
  });
});
