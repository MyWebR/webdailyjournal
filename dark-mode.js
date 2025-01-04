document.getElementById("darkMode").addEventListener("click", function () {
  const body = document.body;

  // NAVBAR
  const navLinks = document.querySelectorAll(
    ".nav-link, #nav-brand, #navbarDropdown"
  );

  // CABANG DAN ARTICLE
  const card = document.querySelectorAll(".card");

  // semua text yang custom
  const smallcard = document.querySelectorAll("#smallcard");

  // TABLE
  const table = document.querySelectorAll("#table");

  // Breadcrumb
  const breadcrumb = document.querySelector(".breadcrumb");

  // CARD HARGA/PRICE-LIST
  // Change this line if you have multiple price cards
  const cardPrices = document.querySelectorAll("#cardPrice"); // Changed to querySelectorAll

  if (body.classList.contains("bg-dark")) {
    // ===== LIGHT MODE CLASSES =====

    // BODY
    body.classList.remove("bg-dark", "text-white");
    body.classList.add("bg-white", "text-dark");

    // NAVBAR
    navLinks.forEach((link) => {
      link.classList.remove("text-white");
      link.classList.add("text-dark");
    });

    // CABANG DAN ARTICLE
    card.forEach((link) => {
      link.classList.remove("card-dark");
      link.classList.add("card-light");
    });

    // TAG SMALL CABANG DAN ARTICLE
    smallcard.forEach((link) => {
      link.classList.remove("cardTextDark");
      link.classList.add("cardTextLight");
    });

    // TABLE
    table.forEach((link) => {
      link.classList.remove("table-dark");
      link.classList.add("table-light");
    });

    // NAV ADMIN
    if (breadcrumb) {
      breadcrumb.classList.remove("breadcrumb-dark");
      breadcrumb.classList.add("breadcrumb-light");
    }

    // CARD HARGA/PRICE-LIST
    cardPrices.forEach((link) => {
      link.classList.remove("price-dark");
      link.classList.add("price-light");
    });
  } else {
    // ===== DARK MODE CLASSES =====

    // BODY
    body.classList.remove("bg-white", "text-dark");
    body.classList.add("bg-dark", "text-white");

    // NAVBAR
    navLinks.forEach((link) => {
      link.classList.remove("text-dark");
      link.classList.add("text-white");
    });

    // CABANG DAN ARTICLE
    card.forEach((link) => {
      link.classList.remove("card-light");
      link.classList.add("card-dark");
    });

    // TAG SMALL CABANG DAN ARTICLE
    smallcard.forEach((link) => {
      link.classList.remove("cardTextLight");
      link.classList.add("cardTextDark");
    });

    // TABLE
    table.forEach((link) => {
      link.classList.remove("table-light");
      link.classList.add("table-dark");
    });

    // NAV ADMIN
    if (breadcrumb) {
      breadcrumb.classList.remove("breadcrumb-light");
      breadcrumb.classList.add("breadcrumb-dark");
    }

    // CARD HARGA/PRICE-LIST
    cardPrices.forEach((link) => {
      link.classList.remove("price-light");
      link.classList.add("price-dark");
    });
  }
});
