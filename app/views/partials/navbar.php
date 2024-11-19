<?php

use Framework\Session;

$currentPage = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

?>

<!-- Navbar -->
<header class="bg-blue-900 text-white p-4">

    <nav class="container mx-auto flex justify-between items-center px-4">

        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-3xl font-semibold"><a href="/">Workopia</a></h1>
            <div>
                <?php if (Session::hasSession('user')): ?>
                    <div class=" flex justify-between items-center gap-4">

                        <div class="text-lg mr-4 font-medium">Welcome,
                            <?php echo htmlspecialchars(Session::getSession('user')['name']); ?>
                        </div>

                        <a href="/listings/create"
                            class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300 inline">
                            <i class="fa fa-edit"></i> Post a Job
                        </a>
                        <form method="post" action="/auth/logout">
                            <button type="submit" class="text-white inli px-4 py-2 "><i class="fas fa-sign-out-alt"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                <?php else: ?>
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
                <?php endif; ?>

            </div>
        </div>
    </nav>

</header>