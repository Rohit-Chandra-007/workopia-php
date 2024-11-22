<?=
    loadPartialView('head')
    ?>
<?=
    loadPartialView('navbar')
    ?>

<main class="container mx-auto p-4 mt-4">

    <div class="bg-blue-900 h-24 md:mx-auto px-4 mb-4 flex justify-center items-center rounded">
        <form method="GET" action="/listings/search" class="mb-4 block md:mx-auto">
            <input type="text" name="keywords" placeholder="Keywords"
                class="w-full md:w-auto mb-2 px-4 py-2 focus:outline-none" />
            <input type="text" name="location" placeholder="Location"
                class="w-full md:w-auto mb-2 px-4 py-2 focus:outline-none" />
            <button class="w-full md:w-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 focus:outline-none">
                <i class="fa fa-search"></i> Search
            </button>
        </form>
    </div>

    <?= loadPartialView('message')
        ?>

    <div class="grid grid-cols-3 gap-6 mb-4">

        <?php foreach ($listings as $listing): ?>
            <div class="max-w-md rounded overflow-hidden shadow-lg mx-auto my-8">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-indigo-800"><?= $listing->title ?>
                    </h2>

                    <p class="text-gray-600 text-lg mt-4>"><?= $listing->description ?>
                    </p>

                    <ul class=" my-6 bg-gray-50 p-4 rounded-lg">
                        <li class="mb-3"><strong>Salary:</strong> <?= formatSalary($listing->salary) ?>
                        </li>
                        <li class="mb-3">
                            <strong>Location:</strong> <?= $listing->city ?>, <?= $listing->state ?>
                        </li>
                        <?php if (!empty($listing->tags)): ?>
                            <li class="mb-3">
                                <strong>Tags:</strong> <?= $listing->tags ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <a href="/listings/<?= $listing->id ?>"
                        class="block w-full text-center px-6 py-3 shadow-md rounded-lg border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                        View Details
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= loadPartialView("bottom_banner") ?>
</main>


<?= loadPartialView("footer") ?>