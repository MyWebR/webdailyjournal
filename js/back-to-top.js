const gallery = document.getElementById("gallery");
const myButton = document.getElementById("myButton");

function checkScroll() {
  const galleryTop = gallery.getBoundingClientRect().top;

  if (galleryTop <= 0) {
    myButton.style.display = "block"; 
  } else {
    myButton.style.display = "none"; 
  }
}

window.addEventListener("scroll", checkScroll);

checkScroll();

myButton.addEventListener("click", function (event) {
  event.preventDefault(); 
  window.scrollTo({
    top: 0, 
    behavior: "smooth", 
  });
});
