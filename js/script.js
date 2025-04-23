// Load Navbar
fetch("nav.html")
    .then(response => response.text())
    .then(data => {
        
        document.getElementById("navbar").innerHTML = data;
        const navbar = document.querySelector(".navbar");
        function updateNavBg() {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled-navbar");
            } else {
                navbar.classList.remove("scrolled-navbar");
            }
        }
        window.addEventListener("scroll", updateNavBg);
    })
    .catch(error => console.error("Error loading the navbar:", error));

    
// Load Footer
fetch("footer.html")
    .then(response => response.text())
    .then(data => {
        document.getElementById("footer").innerHTML = data;
        document.querySelector(".year").textContent = new Date().getFullYear();
        footer.addEventListener("mouseover", () => footer.style.backgroundColor = "rgb(36, 35, 41)");
        footer.addEventListener("mouseout", () => footer.style.backgroundColor = "white");
    })
    .catch(error => console.error("Error loading the footer:", error));

    function toggleDarkMode() {
        const body = document.querySelector("body"); // Using body element directly
        if (body.classList.contains("bg-light") || navbar.classList.contains("bg-light")) {
            // If it's in light mode, switch to dark mode
            body.classList.remove("bg-light");
            body.classList.add("bg-dark");
            body.classList.add("text-light");
            localStorage.setItem("darkMode", "enabled"); // Save the dark mode state
        } else {
            // If it's in dark mode, switch to light mode
            body.classList.remove("bg-dark");
            body.classList.add("bg-light");
            body.classList.remove("text-light");
            localStorage.setItem("darkMode", "disabled"); // Save the light mode state
        }
    }
    // Check the local storage on page load and apply the saved dark mode setting
    document.addEventListener("DOMContentLoaded", () => {
        const darkModeStatus = localStorage.getItem("darkMode");    
        if (darkModeStatus === "enabled") {
            toggleDarkMode();  // Apply dark mode if it was previously enabled
        }
    });
    
    