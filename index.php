<?php
// echo '<pre>';
// print_r($_COOKIE);
// echo '</pre>';
?>

<?php
include 'layout/head.php';
?>
<?php
if (isset($_SESSION['login_success'])) {
    $welcomeMessage = $_SESSION['login_success'];
    unset($_SESSION['login_success']);
} elseif (isset($_COOKIE['name']) && isset($_COOKIE['last_visit'])) {
    $name = htmlspecialchars($_COOKIE['name']);
    $lastVisit = htmlspecialchars($_COOKIE['last_visit']);
    $welcomeMessage = "Welcome back, {$name}! Last visit: {$lastVisit}";
} else {
    $welcomeMessage = null;
}
?>
<!DOCTYPE html>
<html class="">

<body class="bg-gray-100 dark:bg-gray-900">

    <main class="min-h-screen ">
        <div class="flex justify-center items-center h-screen">
            <div class="fixed left-1/2 transform -translate-x-1/2 z-50" style="top: 100px;">
                <div class="message bg-green-100 text-xl text-green-800 p-4 rounded-lg text-center w-auto px-8 shadow-lg">
                    <?= htmlspecialchars($welcomeMessage) ?>
                </div>
            </div>
        </div>



        <section class="">
            <div class="hero-image flex items-center ">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">

                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-100 md:text-5xl lg:text-6xl dark:text-white">Capturing Nature’s Beauty, One Frame at a Time</h1>
                    <p class="mb-8 text-lg font-normal  lg:text-xl sm:px-16 xl:px-48 text-gray-400">Discover breathtaking landscapes, serene sunsets, and the raw beauty of nature through my lens.</p>
                    <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                        <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            Learn more
                            <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>

                        <a href="pages/services.php"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-white bg-transparent rounded-lg border border-gray-500 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-500 dark:focus:ring-gray-800">
                            <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                            </svg>
                            Explore Our Services
                        </a>

                    </div>
                </div>
            </div>

        </section>

        <section class="py-12 px-4 bg-gray-100 dark:bg-gray-900">
            <div class="py-12 max-w-5xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">What We Offer</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Discover the features that make us stand out</p>
                </div>

                <!-- Feature Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 text-center transform hover:scale-105 hover:shadow-2xl ">
                        <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-blue-100 dark:bg-blue-900 rounded-full">
                            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828673.png" alt="Gallery" class="w-8 h-8 text-blue-600 dark:text-blue-400">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Stunning Galleries</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Explore breathtaking landscapes and nature shots, captured in their purest form.
                        </p>
                    </div>

                    <!-- Card 2 -->

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 text-center transform hover:scale-105 hover:shadow-2xl ">
                        <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-green-100 dark:bg-green-900 rounded-full">
                            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828673.png" alt="Stories" class="w-8 h-8 text-green-600 dark:text-green-400">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Behind-the-Scenes</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Get insider access to our adventures—tips, travel tales, and photo techniques.
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 text-center transform hover:scale-105 hover:shadow-2xl ">
                        <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-yellow-100 dark:bg-yellow-900 rounded-full">
                            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828673.png" alt="Services" class="w-8 h-8 text-yellow-600 dark:text-yellow-400">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Custom Services</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Book high-quality prints or personal photoshoots tailored just for you.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </main>




    <?php include 'layout/footer.php'; ?>
    <script src="js/script.js"></script>

</body>

</html>