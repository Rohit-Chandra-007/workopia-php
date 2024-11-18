<!-- Navbar -->
<header class="bg-blue-900 text-white p-4">
    <?php
    // Get current page URL
    $currentPage = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    ?>
    <nav class="container mx-auto flex justify-between items-center px-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-3xl font-semibold"><a href="/">Workopia</a></h1>
            <div>
                <a href="/"
                    class="px-4 py-2 hover:underline <?= $currentPage === '/' ? 'text-yellow-500 font-bold underline' : '' ?>">
                    Home
                </a>
                <a href="/listings"
                    class="px-4 py-2 hover:underline <?= $currentPage === '/listings' ? 'text-yellow-500 font-bold underline' : '' ?>">
                    All Listings
                </a>
                <a href="/auth/login"
                    class="px-4 py-2 hover:underline <?= $currentPage === "/auth/login" ? 'text-yellow-500 font-bold underline' : '' ?>">
                    Login
                </a>
                <a href="/auth/register"
                    class="px-4 py-2 hover:underline <?= $currentPage === "/auth/register" ? 'text-yellow-500 font-bold underline' : '' ?>">
                    Register
                </a>

            </div>
        </div>
    </nav>

</header>