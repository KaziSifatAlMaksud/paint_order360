// profile js

document.addEventListener('DOMContentLoaded', function () {
  const carouselImages = document.querySelectorAll('.carousel-image');
  const fullscreenModal = new bootstrap.Modal(document.getElementById('fullscreenModal'));
  const fullscreenImage = document.getElementById('fullscreenImage');

  carouselImages.forEach(image => {
    image.addEventListener('click', function () {
      fullscreenImage.src = this.src;
      fullscreenModal.show();
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var buttons = document.querySelectorAll(".toggle-card div");
  var contents = document.querySelectorAll(".content");

  buttons.forEach(function (button) {
    button.addEventListener("click", function () {
      buttons.forEach(function (btn) {
        btn.classList.remove("active");
      });
      this.classList.add("active");

      var contentId = this.id + "-content";
      contents.forEach(function (content) {
        content.classList.remove("active");
      });
      document.getElementById(contentId).classList.add("active");
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var toggleState = localStorage.getItem("toggleState");

  if (toggleState === "view2") {
    toggleView(toggleState);
  }
});

function toggleView(toggleState) {
  var view1 = document.querySelector(".view1");
  var view2 = document.querySelector(".view2");

  if (view1.style.display === "block" || toggleState === "view2") {
    view1.style.display = "none";
    view2.style.display = "block";
    localStorage.setItem("toggleState", "view2");
  } else {
    view1.style.display = "block";
    view2.style.display = "none";
    localStorage.setItem("toggleState", "view1");
  }
}


let percentageDataCalled = false;
function toggleTab(tabId) {
  const priceTab = document.getElementById("price");
  const percentageTab = document.getElementById("Percentage");
  if (tabId === "price") {
    priceTab.classList.add("active");
    percentageTab.classList.remove("active");
  } else if (tabId === "Percentage") {
    priceTab.classList.remove("active");
    percentageTab.classList.add("active");
  }
  if (!percentageDataCalled) {
    PercentageData();
    percentageDataCalled = true;
  }
}

document.addEventListener("DOMContentLoaded", function () {
  var buttons = document.querySelectorAll(".toggle-type div");
  var contents = document.querySelectorAll(".content-type");

  buttons.forEach(function (button) {
    button.addEventListener("click", function () {
      buttons.forEach(function (btn) {
        btn.classList.remove("active");
      });
      this.classList.add("active");

      var contentId = this.id + "-content";
      contents.forEach(function (content) {
        content.classList.remove("active");
      });
      document.getElementById(contentId).classList.add("active");
    });
  });
});

function getRandomNumber(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}





function randomData() {
  const dataBody = document.getElementById("dataBody");

  for (let i = 0; i < 10; i++) {
    const newRow = document.createElement("tr");

    for (let j = 0; j < 5; j++) {
      const newCell = document.createElement("td");
      const randomValue = getRandomNumber(100, 1000);
      newCell.textContent = j === 0 ? jobNames[i] : `$${randomValue}`;
      newRow.appendChild(newCell);
    }

    dataBody.appendChild(newRow);
  }
}
randomData();

// function PercentageData() {
//   const dataBody = document.getElementById("percentageBody");

//   for (let i = 0; i < 10; i++) {
//     const newRow = document.createElement("tr");

//     for (let j = 0; j < 5; j++) {
//       const newCell = document.createElement("td");
//       const randomValue = getRandomNumber(100, 1000);
//       newCell.textContent = j === 0 ? jobNames[i] : `${randomValue}%`;
//       newRow.appendChild(newCell);
//     }

//     dataBody.appendChild(newRow);
//   }
// }


