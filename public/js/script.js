
//navigation bar 

const list = document.querySelectorAll('.list');

function activeLink() {
  list.forEach(item =>
    item.classList.remove('active'));
  this.classList.add('active');
}

list.forEach(item => item.addEventListener('click', activeLink));

// filter the catagory ..
document.addEventListener("DOMContentLoaded", function () {
  const filters = document.querySelectorAll(".portfolio-flters li");
  const portfolioItems = document.querySelectorAll(".portfolio-item");

  filters.forEach(function (filter) {
    filter.addEventListener("click", function () {
      filters.forEach(function (f) {
        f.classList.remove("filter-active");
        f.classList.add("filter-inactive");
      });
      this.classList.remove("filter-inactive");
      this.classList.add("filter-active");

      const filterId = this.id;

      portfolioItems.forEach(function (item) {
        item.style.display = "none";
      });

      if (filterId === "filter-new") {
        document.querySelectorAll(".filter-new").forEach(function (content) {
          content.style.display = "block";
        });
      } else if (filterId === "filter-started") {
        document.querySelectorAll(".filter-started").forEach(function (content) {
          content.style.display = "block";
        });
      } else if (filterId === "filter-finished") {
        document.querySelectorAll(".filter-finished").forEach(function (content) {
          content.style.display = "block";
        });
      } else if (filterId === "filter-all") {
        portfolioItems.forEach(function (item) {
          item.style.display = "block";
        });
      }
    });
  });
});

//filter through Search Address

function filterCards() {
  const searchInput = document.getElementById("search-input").value.toLowerCase();
  const cardTitles = document.querySelectorAll(".address_text");
  const builderNames = document.querySelectorAll(".bilderName");
  const invNames = document.querySelectorAll(".customerInv");

  cardTitles.forEach(function (cardTitle) {
    const titleText = cardTitle.textContent.toLowerCase();
    const card = cardTitle.closest(".portfolio-item");

    if (titleText.includes(searchInput)) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
  builderNames.forEach(function (builderName) {
    const builderNameText = builderName.textContent.toLowerCase();
    const card = builderName.closest(".portfolio-item");

    // If the card is already displayed by the title match, we skip further checks
    if (card.style.display === "block") return;

    if (builderNameText.includes(searchInput)) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });

  invNames.forEach(function (invName) {
    const invNameText = invName.textContent.toLowerCase();
    const card = invName.closest(".portfolio-item");

    // If the card is already displayed by the title match, we skip further checks
    if (card.style.display === "block") return;

    if (invNameText.includes(searchInput)) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
}

function filterCards2() {
  const searchInput = document.getElementById("search-invoice").value.toLowerCase();
  const cards = document.querySelectorAll(".InvoicePortfolio");

  cards.forEach(function (card) {
    const cardTitle = card.querySelector("#expandable-title");
    const customerTitle = card.querySelector("#customer-title");
    const customerinvoice = card.querySelector("#customer-inv");

    const cardTitleText = cardTitle ? cardTitle.textContent.toLowerCase() : '';
    const customerTitleText = customerTitle ? customerTitle.textContent.toLowerCase() : '';
    const customerInvoiceText = customerinvoice ? customerinvoice.textContent.toLowerCase() : '';

    if (cardTitleText.includes(searchInput) || customerTitleText.includes(searchInput) || customerInvoiceText.includes(searchInput)) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
}




// filter the catagory ..
document.addEventListener("DOMContentLoaded", function () {
  const filters = document.querySelectorAll(".invoice-flters li");
  const portfolioItems = document.querySelectorAll(".invoice-item");

  filters.forEach(function (filter) {
    filter.addEventListener("click", function () {
      filters.forEach(function (f) {
        f.classList.remove("filter-active");
        f.classList.add("filter-inactive");
      });
      this.classList.remove("filter-inactive");
      this.classList.add("filter-active");

      const filterId = this.id;

      portfolioItems.forEach(function (item) {
        item.style.display = "none";
      });

      if (filterId === "filter-ready") {
        document.querySelectorAll(".filter-ready").forEach(function (content) {
          content.style.display = "block";
        });
      } else if (filterId === "filter-unpaid") {
        document.querySelectorAll(".filter-unpaid").forEach(function (content) {
          content.style.display = "block";
        });
      } else if (filterId === "filter-paid") {
        document.querySelectorAll(".filter-paid").forEach(function (content) {
          content.style.display = "block";
        });
      } else if (filterId === "filter-all") {
        portfolioItems.forEach(function (item) {
          item.style.display = "block";
        });
      }
    });
  });
});

// Total amount calulation in invoice 

document.getElementById('amountInput').addEventListener('input', function () {
  var amount = parseFloat(this.value) || 0;
  var gst = amount * 0.10;
  document.getElementById('gstInput').value = gst.toFixed(2);
  document.getElementById('totalDueInput').value = (amount + gst).toFixed(2);
});

// invoice filde job_id and address ...
document.getElementById('jobSelect').addEventListener('change', function () {
  var selectedOption = this.options[this.selectedIndex];
  document.getElementById('job_id').value = selectedOption.value;
  document.getElementById('job_address').value = selectedOption.getAttribute('data-address');
});

