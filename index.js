// Handle hover for all FAQ items
const allFAQs = document.querySelectorAll(".FAQ__accordian");
allFAQs.forEach(faq => {
  const title = faq.querySelector(".FAQ__title");
  const content = faq.querySelector(".FAQ__visible");
  const icon = title.querySelector("i");

  // Hover functionality
  title.addEventListener("mouseenter", function() {
    icon.classList.remove("fa-plus");
    icon.classList.add("fa-times");
    content.style.maxHeight = content.scrollHeight + "px";
    content.style.opacity = "1";
  });

  title.addEventListener("mouseleave", function() {
    // Only collapse if not already expanded by click
    if (!icon.classList.contains("fa-times")) {
      content.style.maxHeight = null;
      content.style.opacity = "0";
    }
  });

  // Click functionality
  title.addEventListener("click", function() {
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
      content.style.opacity = "0";
      icon.classList.remove("fa-times");
      icon.classList.add("fa-plus");
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
      content.style.opacity = "1";
      icon.classList.remove("fa-plus");
      icon.classList.add("fa-times");
    }
  });
});
