const testimonials = [
  {
    name: "Nama 1",
    position: "Jabatan 1",
    text: `Nam nec faucibus turpis. Sed ac imperdiet lorem. Etiam nisi massa, semper tempor nisl id,
           tempus condimentum quam.`,
    image: "assets/images/testi/testi01.jpg"
  },
  {
    name: "Nama 2",
    position: "Jabatan 2",
    text: `Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.`,
    image: "assets/images/testi/testi02.jpg"
  },
  {
    name: "Nama 3",
    position: "Jabatan 3",
    text: `Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.`,
    image: "assets/images/testi/testi03.jpg"
  },
  {
    name: "Nama 4",
    position: "Jabatan 4",
    text: `Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.`,
    image: "assets/images/testi/testi04.jpg"
  },
  {
    name: "Nama 5",
    position: "Jabatan 5",
    text: `Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.`,
    image: "assets/images/testi/testi05.jpg"
  },
  {
    name: "Nama 6",
    position: "Jabatan 6",
    text: `Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.`,
    image: "assets/images/testi/testi06.jpg"
  }
];

const sliderTrack = document.getElementById("testisliderTrack");
const dotsContainer = document.getElementById("dotsContainer");
let currentIndex = 0;

function renderSlides() {
  testimonials.forEach((t, index) => {
    const slide = document.createElement("div");
    slide.classList.add("testislider-slide");
    slide.innerHTML = `
      <img src="${t.image}" alt="${t.name}" />
      <div class="testimonial-content">
        <p class="testimonial-text">${t.text}</p>
        <p class="testimonial-name">${t.name}</p>
        <p class="testimonial-position">${t.position}</p>
      </div>
    `;
    sliderTrack.appendChild(slide);

    const dot = document.createElement("span");
    dot.classList.add("dot");
    if (index === 0) dot.classList.add("active");
    dot.addEventListener("click", () => goToSlide(index));
    dotsContainer.appendChild(dot);
  });
}

function updateSlider() {
  const offset = -currentIndex * 100;
  sliderTrack.style.transform = `translateX(${offset}%)`;

  document.querySelectorAll(".dot").forEach((d, i) => {
    d.classList.toggle("active", i === currentIndex);
  });
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % testimonials.length;
  updateSlider();
}

function goToSlide(index) {
  currentIndex = index;
  updateSlider();
}

renderSlides();
setInterval(nextSlide, 5000);
