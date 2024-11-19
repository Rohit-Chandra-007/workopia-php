<?=
    loadPartialView('head')
    ?>
<?=
    loadPartialView('navbar')
    ?>

<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto p-8 py-12">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <form method="post" action="/auth/login">
            <?php $errorsData = isset($errors) ? ['errors' => $errors] : []; ?>
            <?= loadPartialView('errors', $errorsData) ?>
            <div class="mb-4">
                <label for="login-email" class="block text-sm font-medium text-gray-700">Email address</label>
                <input type="text" id="login-email" name="email"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="login-password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="login-password" name="password"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Login
            </button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">Don't have an account? <a href="#"
                class="text-blue-600 hover:underline">Register</a>
        </p>
    </div>