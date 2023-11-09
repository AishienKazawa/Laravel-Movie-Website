import "./bootstrap";
import "./loading";
import { loadingScreen } from "./loading";

let swiperLoop;
let swiperHero;
let infiniteLoop;

document.addEventListener("DOMContentLoaded", function () {
  loadingScreen();

  swiperHero = new Swiper("#swiperHero", {
    centeredSlides: true,
    loop: true,
    allowTouchMove: false,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  infiniteLoop = new Swiper("#swiper-infinite-loop", {
    slidesPerView: 2,
    centeredSlides: true,
    spaceBetween: 15,
    grabCursor: true,
    loop: true,
    preloadImages: true,
    breakpoints: {
      640: { slidesPerView: 3.5 },
      768: { slidesPerView: 4 },
      1024: { slidesPerView: 5.5 },
      1280: { slidesPerView: 7.5 },
    },
  });

  if (window.innerWidth >= 768) {
    let swipers = document.querySelectorAll("#swiper-loop");
    let swiperWrappers = document.querySelectorAll("#swiper-to-grid");
    swipers.forEach((swiper) => {
      swiper.removeAttribute("id");
    });

    swiperWrappers.forEach((swiperWrapper) => {
      swiperWrapper.classList.remove("swiper-wrapper");
    });
  } else {
    swiperLoop = new Swiper("#swiper-loop", {
      slidesPerView: 2,
      centeredSlides: true,
      spaceBetween: 15,
      grabCursor: true,
      loop: true,
      preloadImages: true,
      breakpoints: {
        640: { slidesPerView: 3.5 },
        768: { slidesPerView: 4 },
        1024: { slidesPerView: 5.5 },
        1280: { slidesPerView: 7.5 },
      },
    });
  }

  // show and hide search component
  let formContainer = document.getElementById("search-form-container");
  let btnSearch = document.getElementById("button-search-form");
  let form = document.querySelector("#search-form-container form");

  document.addEventListener("click", function (e) {
    if (
      btnSearch.contains(e.target) ||
      formContainer.contains(e.target) ||
      form.contains(e.target)
    ) {
      formContainer.classList.remove("hidden");
      formContainer.classList.add("block");
    } else {
      formContainer.classList.remove("block");
      formContainer.classList.add("hidden");
    }
  });

  // show and hide user avatar menu
  let profileBtn = document.getElementById("profile-btn");
  let profilePop = document.getElementById("profile-pop");

  document.addEventListener("click", function (e) {
    if (profileBtn.contains(e.target)) {
      profilePop.classList.remove("hidden");
      profilePop.classList.add("grid");
    } else {
      profilePop.classList.remove("grid");
      profilePop.classList.add("hidden");
    }
  });

  const imageInput = document.getElementById("image");
  const imagePreview = document.getElementById("profile-image-preview");

  if (imageInput && imagePreview) {
    imageInput.addEventListener("change", (event) => {
      const file = event.target.files[0];
      const reader = new FileReader();

      reader.onload = (e) => {
        imagePreview.src = e.target.result;
      };

      reader.readAsDataURL(file);
    });
  }
});
