// js/script.js
document.addEventListener("DOMContentLoaded", function () {
  // Select all elements with the class 'add-to-cart-btn'
  const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");

  // Add a click event listener to each 'Add to Cart' button
  addToCartButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      // Get the card title from the closest parent card
      const cardTitle =
        this.closest(".card").querySelector(".card-title").textContent;

      // Update the modal content with the selected service
      const modalBody = document.querySelector("#addToCartModal .modal-body");
      modalBody.textContent = `Service added to the cart: ${cardTitle}`;

      // Show the modal
      $("#addToCartModal").modal("show");
    });
  });

  // Add a click event listener to the 'Go to Cart' button
  const goToCartButton = document.querySelector("#goToCartButton");
  if (goToCartButton) {
    goToCartButton.addEventListener("click", function () {
      // Define the behavior when the 'Go to Cart' button is clicked
      // For example, you can navigate to a dedicated cart page or perform other actions.
      alert("Go to Cart button clicked. Add your custom logic here.");
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  var parallaxElements = document.querySelectorAll('.parallax');

  window.addEventListener("scroll", function () {
      parallaxElements.forEach(function (element) {
          var scrollPosition = window.scrollY;
          element.style.backgroundPositionY = -scrollPosition * 0.5 + "px";
      });
  });
});
