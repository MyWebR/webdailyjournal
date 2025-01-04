// Ambil elemen gallery dan tombol
const gallery = document.getElementById("gallery");
const myButton = document.getElementById("myButton");

// Fungsi untuk memeriksa apakah gallery sudah menyentuh bagian atas
function checkScroll() {
  // Mendapatkan posisi dari elemen gallery
  const galleryTop = gallery.getBoundingClientRect().top;

  // Jika gallery berada di posisi atas layar (atau lebih dekat), tampilkan tombol
  if (galleryTop <= 0) {
    myButton.style.display = "block"; // Menampilkan tombol
  } else {
    myButton.style.display = "none"; // Menyembunyikan tombol
  }
}

// Menambahkan event listener untuk scroll
window.addEventListener("scroll", checkScroll);

// Memeriksa sekali saat halaman pertama kali dimuat
checkScroll();

// Mengatur tombol untuk scroll ke atas ketika diklik
myButton.addEventListener("click", function (event) {
  event.preventDefault(); // Mencegah link default agar tidak mengarah ke #gallery
  window.scrollTo({
    top: 0, // Mengarah ke posisi atas halaman
    behavior: "smooth", // Animasi smooth scroll
  });
});
