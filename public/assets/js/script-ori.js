// ==== NAVBAR TOGGLE ====
const hamburger = document.getElementById('hamburger');
const navbar = document.getElementById('navbar');

hamburger.addEventListener('click', () => {
  navbar.classList.toggle('show');
});

const navLinks = navbar.querySelectorAll('a');
navLinks.forEach(link => {
  link.addEventListener('click', () => {
    navbar.classList.remove('show');
  });
});


// ==== SLIDER UTAMA (DENGAN PREV/NEXT) ====
const slides = document.querySelectorAll('.slide');
const nextBtn = document.querySelector('.next');
const prevBtn = document.querySelector('.prev');
let mainSlideIndex = 0;

function showMainSlide(index) {
  const slider = document.querySelector('.slider');
  slider.style.transform = `translateX(-${index * 100}vw)`;
  mainSlideIndex = index;
}

nextBtn.addEventListener('click', () => {
  mainSlideIndex = (mainSlideIndex + 1) % slides.length;
  showMainSlide(mainSlideIndex);
});

prevBtn.addEventListener('click', () => {
  mainSlideIndex = (mainSlideIndex - 1 + slides.length) % slides.length;
  showMainSlide(mainSlideIndex);
});

setInterval(() => {
  mainSlideIndex = (mainSlideIndex + 1) % slides.length;
  showMainSlide(mainSlideIndex);
}, 5000);


// ==== TESTIMONIAL SLIDER ====
const testiData = [
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

const testiSliderTrack = document.getElementById("testisliderTrack");
const testiDotsContainer = document.getElementById("dotsContainer");
let testiIndex = 0;

function renderTestiSlides() {
  testiData.forEach((t, index) => {
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
    testiSliderTrack.appendChild(slide);

    const dot = document.createElement("span");
    dot.classList.add("dot");
    if (index === 0) dot.classList.add("active");
    dot.addEventListener("click", () => goToTestiSlide(index));
    testiDotsContainer.appendChild(dot);
  });
}

function updateTestiSlider() {
  const offset = -testiIndex * 100;
  testiSliderTrack.style.transform = `translateX(${offset}%)`;

  document.querySelectorAll(".dot").forEach((d, i) => {
    d.classList.toggle("active", i === testiIndex);
  });
}

function nextTestiSlide() {
  testiIndex = (testiIndex + 1) % testiData.length;
  updateTestiSlider();
}

function goToTestiSlide(index) {
  testiIndex = index;
  updateTestiSlider();
}

renderTestiSlides();
setInterval(nextTestiSlide, 5000);
