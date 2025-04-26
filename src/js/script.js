// function toggleDarkMode() {
//     const body = document.body;
//     const navbar = document.querySelector(".navbar");
  
//     body.classList.toggle("dark");
  
//     if (body.classList.contains("dark")) {
//       localStorage.setItem("darkMode", "enabled");
//       navbar?.classList.remove("bg-white", "text-gray-800");
//       navbar?.classList.add("bg-gray-900", "text-white");
//     } else {
//       localStorage.setItem("darkMode", "disabled");
//       navbar?.classList.remove("bg-gray-900", "text-white");
//       navbar?.classList.add("bg-white", "text-gray-800");
//     }
//   }
  
//   document.addEventListener("DOMContentLoaded", () => {
//     const body = document.body;
//     const navbar = document.querySelector(".navbar");
//     const footer = document.getElementById("footer");
//     const year = document.querySelector(".year");
  
//     // Restore dark mode if previously saved
//     if (localStorage.getItem("darkMode") === "enabled") {
//       body.classList.add("dark");
//       navbar?.classList.add("bg-gray-900", "text-white");
//       navbar?.classList.remove("bg-white", "text-gray-800");
//     }
  
//     // Scroll-based navbar background toggle
//     function updateNavBg() {
//       if (window.scrollY > 50) {
//         navbar?.classList.add("scrolled-navbar");
//       } else {
//         navbar?.classList.remove("scrolled-navbar");
//       }
//     }
//     window.addEventListener("scroll", updateNavBg);
  
//     // Footer hover logic (light mode only)
//     if (footer) {
//       footer.addEventListener("mouseenter", () => {
//         if (!body.classList.contains("dark")) {
//           footer.classList.remove("bg-gray-100", "text-gray-600");
//           footer.classList.add("bg-gray-900", "text-white");
//         }
//       });
  
//       footer.addEventListener("mouseleave", () => {
//         if (!body.classList.contains("dark")) {
//           footer.classList.remove("bg-gray-900", "text-white");
//           footer.classList.add("bg-gray-100", "text-gray-600");
//         }
//       });
//     }
  
//     // Set year in footer
//     if (year) {
//       year.textContent = new Date().getFullYear();
//     }
//   });
  