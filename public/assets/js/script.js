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

  let mobileNewsSwiper = null;
  if (isMobile && typeof Swiper !== "undefined") {
    mobileNewsSwiper = new Swiper(".news-slider", {
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

  // ============ FILTER KATEGORI & PAGINATION 8 BERITA (DESKTOP) ============ //
  const newsFilterButtons = document.querySelectorAll(".news-filter-btn");
  const newsSlides = Array.from(document.querySelectorAll(".news-slider .swiper-slide"));
  const emptyMessage = document.getElementById("news-empty-message");
  const desktopPagination = document.getElementById("desktop-news-pagination");

  const ITEMS_PER_PAGE = 8;
  let currentNewsPage = 1;
  let currentCategory = "all";

  function scrollToNewsSection() {
    const section = document.querySelector(".news-section");
    if (section) {
      const yOffset = -90;
      const y = section.getBoundingClientRect().top + window.pageYOffset + yOffset;
      window.scrollTo({ top: y, behavior: "smooth" });
    }
  }

  function renderDesktopPagination(totalPages) {
    if (!desktopPagination) return;

    if (totalPages <= 1) {
      desktopPagination.innerHTML = "";
      desktopPagination.style.display = "none";
      return;
    }

    desktopPagination.style.display = "flex";
    desktopPagination.innerHTML = "";

    // Tombol Sebelumnya
    const prevBtn = document.createElement("button");
    prevBtn.type = "button";
    prevBtn.className = "page-btn prev-btn";
    prevBtn.setAttribute("aria-label", "Sebelumnya");
    prevBtn.innerHTML = '<i class="fa-solid fa-chevron-left" style="font-size: 0.8rem; margin-right: 6px;"></i> Sebelumnya';
    if (currentNewsPage <= 1) {
      prevBtn.disabled = true;
    } else {
      prevBtn.addEventListener("click", () => {
        if (currentNewsPage > 1) {
          currentNewsPage--;
          renderNews();
          scrollToNewsSection();
        }
      });
    }
    desktopPagination.appendChild(prevBtn);

    // Helper Nomor Halaman
    function addPageNumberBtn(num) {
      const pageBtn = document.createElement("button");
      pageBtn.type = "button";
      pageBtn.className = "page-btn" + (num === currentNewsPage ? " active" : "");
      pageBtn.setAttribute("aria-label", "Halaman " + num);
      pageBtn.textContent = num;
      if (num !== currentNewsPage) {
        pageBtn.addEventListener("click", () => {
          currentNewsPage = num;
          renderNews();
          scrollToNewsSection();
        });
      }
      desktopPagination.appendChild(pageBtn);
    }

    // Helper Ellipsis
    function addEllipsis() {
      const span = document.createElement("span");
      span.className = "page-ellipsis";
      span.textContent = "…";
      desktopPagination.appendChild(span);
    }

    // Tampilkan Nomor Halaman
    if (totalPages <= 7) {
      for (let p = 1; p <= totalPages; p++) {
        addPageNumberBtn(p);
      }
    } else {
      addPageNumberBtn(1);
      if (currentNewsPage > 3) addEllipsis();
      const startP = Math.max(2, currentNewsPage - 1);
      const endP = Math.min(totalPages - 1, currentNewsPage + 1);
      for (let p = startP; p <= endP; p++) {
        addPageNumberBtn(p);
      }
      if (currentNewsPage < totalPages - 2) addEllipsis();
      addPageNumberBtn(totalPages);
    }

    // Tombol Selanjutnya
    const nextBtn = document.createElement("button");
    nextBtn.type = "button";
    nextBtn.className = "page-btn next-btn";
    nextBtn.setAttribute("aria-label", "Selanjutnya");
    nextBtn.innerHTML = 'Selanjutnya <i class="fa-solid fa-chevron-right" style="font-size: 0.8rem; margin-left: 6px;"></i>';
    if (currentNewsPage >= totalPages) {
      nextBtn.disabled = true;
    } else {
      nextBtn.addEventListener("click", () => {
        if (currentNewsPage < totalPages) {
          currentNewsPage++;
          renderNews();
          scrollToNewsSection();
        }
      });
    }
    desktopPagination.appendChild(nextBtn);
  }

  function renderNews() {
    if (!newsSlides.length) return;

    const isMobileView = window.innerWidth < 768;

    // Filter slide berdasarkan kategori aktif
    const matchingSlides = [];
    newsSlides.forEach((slide) => {
      const card = slide.querySelector(".news-card");
      if (!card) return;
      const cardCategory = (card.dataset.category || "").toLowerCase().trim();
      const matches = !currentCategory || currentCategory === "all" || cardCategory === currentCategory.toLowerCase().trim();
      if (matches) {
        matchingSlides.push(slide);
      } else {
        slide.style.display = "none";
      }
    });

    if (emptyMessage) {
      emptyMessage.style.display = matchingSlides.length === 0 ? "block" : "none";
    }

    // ============================================
    // JIKA MOBILE: TETAP SEPERTI SAAT INI
    // Tampilkan semua slide yang cocok untuk Swiper slider
    // ============================================
    if (isMobileView) {
      matchingSlides.forEach((slide) => {
        slide.style.display = "";
      });
      if (desktopPagination) {
        desktopPagination.innerHTML = "";
        desktopPagination.style.display = "none";
      }
      if (mobileNewsSwiper && typeof mobileNewsSwiper.update === "function") {
        try {
          mobileNewsSwiper.update();
        } catch (e) {}
      }
      return;
    }

    // ============================================
    // JIKA DESKTOP: PAGINATION PER 8 BERITA
    // ============================================
    const totalMatching = matchingSlides.length;
    const totalPages = Math.ceil(totalMatching / ITEMS_PER_PAGE) || 1;

    if (currentNewsPage > totalPages) {
      currentNewsPage = 1;
    }
    if (currentNewsPage < 1) {
      currentNewsPage = 1;
    }

    const startIndex = (currentNewsPage - 1) * ITEMS_PER_PAGE;
    const endIndex = startIndex + ITEMS_PER_PAGE;

    matchingSlides.forEach((slide, index) => {
      if (index >= startIndex && index < endIndex) {
        slide.style.display = "";
      } else {
        slide.style.display = "none";
      }
    });

    renderDesktopPagination(totalPages);
  }

  newsFilterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const selectedCategory = button.dataset.category;
      newsFilterButtons.forEach((btn) => btn.classList.remove("active"));
      button.classList.add("active");
      currentCategory = selectedCategory;
      currentNewsPage = 1;
      renderNews();
    });
  });

  let newsResizeTimer;
  window.addEventListener("resize", () => {
    clearTimeout(newsResizeTimer);
    newsResizeTimer = setTimeout(() => {
      renderNews();
    }, 150);
  });

  if (newsSlides.length) {
    renderNews();
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

// ===== GLOBAL TOGGLE FUNCTIONS (Available immediately for inline onclick) ===== //
window.toggleCard = function (headerElement) {
  const card = headerElement.closest(".card-prodi");
  if (card) {
    card.classList.toggle("expanded");
  }
};

window.toggleAllCurriculum = function (btnElement, expand) {
  const parentContainer = btnElement.closest("section") || btnElement.closest(".container") || document;
  const cards = parentContainer.querySelectorAll(".card-prodi");
  cards.forEach(card => {
    if (expand) {
      card.classList.add("expanded");
    } else {
      card.classList.remove("expanded");
    }
  });
};

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

if (document.readyState !== "loading") {
  initCurriculumBadges();
} else {
  document.addEventListener("DOMContentLoaded", initCurriculumBadges);
}
