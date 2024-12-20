<?=
    loadPartialView('head')
    ?>
<?=
    loadPartialView('navbar')
    ?>

<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        <form method="POST" action="/auth/register">
            <?php $errorsData = isset($errors) ? ['errors' => $errors] : []; ?>
            <?= loadPartialView('errors', $errorsData) ?>
            <div class="mb-4">
                <label for="full-name" class="block text-sm font-medium text-gray-700">Full name</label>
                <input type="text" id="full-name" name="name" value="<?= $user['name'] ?? '' ?>"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                <input type="text" id="email" name="email" value="<?= $user['email'] ?? '' ?>"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input type="text" id="city" name="city" value="<?= $user['city'] ?? '' ?>"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                <input type="text" id="state" name="state" value="<?= $user['state'] ?? '' ?>"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm
                    password</label>
                <input type="password" id="confirm-password" name="confirm_password"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Register
            </button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">Already have an account? <a href="#"
                class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>
</div>
<?= loadPartialView('footer') ?>