document.addEventListener("DOMContentLoaded", function () {
  // ================= HEADER ================= //

  // Toggle mobile navigation menu
  const burgerMenu = document.getElementById("burgerMenu");
  const mobileNav = document.getElementById("mobileNav");

  if (burgerMenu && mobileNav) {
    burgerMenu.addEventListener("click", function () {
      mobileNav.classList.toggle("active");
    });
  }

  // Toggle dropdown on icon click
  window.toggleDropdown = function (icon) {
    const dropdown = icon.nextElementSibling;
    if (dropdown) {
      dropdown.classList.toggle("show-dropdown");
    }
  };

  // Close dropdown if click outside
  window.addEventListener("click", function (e) {
    const isIcon = e.target.closest(".dropdown-icon");
    const isDropdown = e.target.closest(".dropdown-content");

    if (!isIcon && !isDropdown) {
      document.querySelectorAll(".dropdown-content").forEach((el) => {
        el.classList.remove("show-dropdown");
      });
    }
  });

  // ================ SLIDER UTAMA ================ //
  const slides = document.querySelectorAll(".slide");
  const nextBtn = document.querySelector(".next");
  const prevBtn = document.querySelector(".prev");
  let mainSlideIndex = 0;

  function showMainSlide(index) {
    const slider = document.querySelector(".slider");
    if (slider) {
      slider.style.transform = `translateX(-${index * 100}vw)`;
      mainSlideIndex = index;
    }
  }

  if (nextBtn && prevBtn && slides.length > 0) {
    nextBtn.addEventListener("click", () => {
      mainSlideIndex = (mainSlideIndex + 1) % slides.length;
      showMainSlide(mainSlideIndex);
    });

    prevBtn.addEventListener("click", () => {
      mainSlideIndex = (mainSlideIndex - 1 + slides.length) % slides.length;
      showMainSlide(mainSlideIndex);
    });

    setInterval(() => {
      mainSlideIndex = (mainSlideIndex + 1) % slides.length;
      showMainSlide(mainSlideIndex);
    }, 5000);
  }

  // ===== SCROLL BUTTON & WHATSAPP VISIBILITY ===== //
  const scrollBtn = document.getElementById("scrollToTop");
  const waBtn = document.getElementById("whatsappBtn");
  let lastScrollTop = 0;

  window.addEventListener("scroll", function () {
    const st = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollBtn && waBtn) {
      if (st < 100) {
        scrollBtn.style.display = "none";
        waBtn.style.display = "none";
      } else if (st > lastScrollTop) {
        // Scrolling down
        scrollBtn.style.display = "none";
        waBtn.style.display = "block";
      } else {
        // Scrolling up
        scrollBtn.style.display = "block";
        waBtn.style.display = "none";
      }
    }

    lastScrollTop = st <= 0 ? 0 : st;
  });

  if (scrollBtn) {
    scrollBtn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  // ============ MOBILE ONLY: NEWS SLIDER ============ //
  const isMobile = window.innerWidth < 768;

  if (isMobile && typeof Swiper !== "undefined") {
    new Swiper(".news-slider", {
      slidesPerView: 1,
      spaceBetween: 10,
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }
  
  // Filter Kategori Berita //
  const newsFilterButtons = document.querySelectorAll(".news-filter-btn");
  const newsSlides = document.querySelectorAll(".news-slider .swiper-slide");
  const emptyMessage = document.getElementById("news-empty-message");

  function updateNewsFilter(category) {
    let matchCount = 0;
    newsSlides.forEach((slide) => {
      const card = slide.querySelector(".news-card");
      if (!card) return;

      const cardCategory = card.dataset.category;
      const visible =
        !category || category === "all" || cardCategory === category;
      slide.style.display = visible ? "" : "none";
      if (visible) {
        matchCount += 1;
      }
    });

    if (emptyMessage) {
      emptyMessage.style.display = matchCount === 0 ? "block" : "none";
    }
  }

  newsFilterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const selectedCategory = button.dataset.category;
      newsFilterButtons.forEach((btn) => btn.classList.remove("active"));
      button.classList.add("active");
      updateNewsFilter(selectedCategory);
    });
  });

  if (newsFilterButtons.length) {
    updateNewsFilter("all");
  }

  // ===== TOGGLE KARTU PRODI (Bisa di-toggle di Desktop & Mobile) ===== //
  window.toggleCard = function (headerElement) {
    const card = headerElement.closest(".card-prodi");
    if (card) {
      card.classList.toggle("expanded");
    }
  };

  // ===== TOGGLE SEMUA KARTU KURIKULUM (Buka Semua / Tutup Semua) ===== //
  window.toggleAllCurriculum = function (btnElement, expand) {
    const parentContainer = btnElement.closest(".container") || btnElement.closest("section") || document;
    const cards = parentContainer.querySelectorAll(".card-prodi");
    cards.forEach(card => {
      if (expand) {
        card.classList.add("expanded");
      } else {
        card.classList.remove("expanded");
      }
    });
  };

  // ===== GENERATE BADGE JUMLAH MK OTOMATIS ===== //
  function initCurriculumBadges() {
    document.querySelectorAll(".card-prodi").forEach(card => {
      const items = card.querySelectorAll(".card-prodi-body > ul > li");
      const header = card.querySelector(".card-prodi-header");
      if (items.length > 0 && header && !header.querySelector(".card-prodi-badge")) {
        const badge = document.createElement("span");
        badge.className = "card-prodi-badge";
        badge.textContent = `${items.length} MK`;
        header.appendChild(badge);
      }
    });
  }

  // Inisialisasi badge mata kuliah
  initCurriculumBadges();
});
