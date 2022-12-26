var swiper = new Swiper(".swiper-one", {
  // Optional parameters
  //   direction: "horizontal",
  loop: true,
  freeMode: true,

  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },

  //   // If we need pagination
  //   pagination: {
  //     el: ".swiper-pagination",
  //   },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  slidesPerView: 4,
  spaceBetween: 1,

  //   // And if we need scrollbar
  //   scrollbar: {
  //     el: ".swiper-scrollbar",
  //   },
  //   grid: {
  //     column: 3,
  //   },
  //   pagination: {
  //     el: ".swiper-pagination",
  //     clickable: true,
  //   },
});

var swiperTwo = new Swiper(".swiper-two", {
  // Optional parameters
  //   direction: "horizontal",
  loop: true,
  freeMode: true,

  //   // If we need pagination
  //   pagination: {
  //     el: ".swiper-pagination",
  //   },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  slidesPerView: 6,
  spaceBetween: 1,
  //   autoplay: {
  //     delay: 200,
  //     disableOnInteraction: false,
  //   },

  //   // And if we need scrollbar
  //   scrollbar: {
  //     el: ".swiper-scrollbar",
  //   },
  //   grid: {
  //     column: 3,
  //   },
  //   pagination: {
  //     el: ".swiper-pagination",
  //     clickable: true,
  //   },
});
var swiperThree = new Swiper(".swiper-three", {
  // Optional parameters
  //   direction: "horizontal",
  loop: true,
  freeMode: true,

  //   // If we need pagination
  //   pagination: {
  //     el: ".swiper-pagination",
  //   },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  slidesPerView: 4,
  spaceBetween: 1,

  //   // And if we need scrollbar
  //   scrollbar: {
  //     el: ".swiper-scrollbar",
  //   },
  //   grid: {
  //     column: 3,
  //   },
  //   pagination: {
  //     el: ".swiper-pagination",
  //     clickable: true,
  //   },
});

// if register button clicked then change modal title to register and change name submit button to register and add one more input for confirm password
let addConfirmPassword = true;

const registerClick = () => {
  $("#exampleModalLabel").text("Sign Up");
  $("button[name='login']").text("Sign Up");
  $("button[name='login']").attr("name", "register");
  if (addConfirmPassword) {
    $("div[id='registerLink']").remove();
    $("#authForm").append(`
            <div class="mb-3" id="confirmPassword">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control rounded-0" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
            </div>
          `);
  }
  addConfirmPassword = false;
};

$(".register").click(function () {
  registerClick();
});

// if login button clicked then change modal title to login and change name submit button to login and remove confirm password input
$("#login").click(function () {
  $("#exampleModalLabel").text("Login");
  $("button[name='register']").text("Login");
  $("button[name='register']").attr("name", "login");
  $("div[id='confirmPassword']").remove();
  // add register link in bottom of password input
  if (!addConfirmPassword) {
    $("#authForm").append(`
            <div class="mb-3 register" id="registerLink">
                Don't have an account? Sign Up Here
            </div>
          `);
  }
  addConfirmPassword = true;

  // cobas
  $(".register").click(function () {
    registerClick();
  });
});

$(document).ready(function () {
  $("#result").hide();
});

$(document).ready(function () {
  $("#keyword").on("keyup", function () {
    if ($("#keyword").val() == "") {
      $("#result").hide();
    } else {
      $("#result").show();
    }
  });
});

$(document).ready(function () {
  // event ketika keyword ditulis
  $("#keyword").on("keyup", function () {
    $("#result").load("Search/search.php?keyword=" + $("#keyword").val());
  });
});
