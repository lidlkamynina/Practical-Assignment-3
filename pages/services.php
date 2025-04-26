<!DOCTYPE html>
<html lang="en">
<?php include '../layout/head.php'; ?>

<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">


<main class="min-h-screen flex justify-center bg-gray-100 dark:bg-gray-900 px-4 py-8">
        <section class="max-w-5xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-2 py-12">
                Our Photography Services
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                We offer professional photography services to capture stunning moments and landscapes.
            </p>

            <!-- Search -->
            <div class="mb-8">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Search for a service…"
                    class="w-full md:w-1/2 mx-auto block px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <!-- Services Grid -->
            <div id="servicesContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- JS will inject cards here -->
            </div>
        </section>
    </main>

    <?php include '../layout/footer.php'; ?>

    <!-- Your existing script.js (renders & filters cards) -->
    <script src="/Practical-Assignment-3/js/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Services Data
            const services = [{
                    title: "Nature & Landscape Photography",
                    desc: "Capturing breathtaking landscapes.",
                    img: "https://cdn-icons-png.flaticon.com/512/2995/2995368.png"
                },
                {
                    title: "Wildlife Photography",
                    desc: "Documenting animals in their natural habitats.",
                    img: "https://cdn-icons-png.flaticon.com/512/189/189655.png"
                },
                {
                    title: "Custom Prints & Framing",
                    desc: "Order high-quality photo prints.",
                    img: "https://cdn-icons-png.flaticon.com/512/1828/1828673.png"
                },
                {
                    title: "Photography Workshops",
                    desc: "Learn photography from professionals.",
                    img: "https://cdn-icons-png.flaticon.com/512/2729/2729007.png"
                }
            ];

            const servicesContainer = document.getElementById("servicesContainer");
            const searchInput = document.getElementById("searchInput");

            // Function to render services
            function renderServices(list) {
                servicesContainer.innerHTML = list.map(service => `
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition p-6 text-center">
                        <img src="${service.img}"
                            alt="${service.title}"
                            class="w-20 h-20 mb-4 rounded-full bg-gray-100 dark:bg-gray-700 p-2 mx-auto">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">
                        ${service.title}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                        ${service.desc}
                        </p>
                    </div>
                `).join("");
            }


            renderServices(services);


            searchInput.addEventListener("input", () => {
                const term = searchInput.value.toLowerCase();
                const filtered = services.filter(s =>
                    s.title.toLowerCase().includes(term) ||
                    s.desc.toLowerCase().includes(term)
                );
                renderServices(filtered);
            });
        });
    </script>

</body>

</html>