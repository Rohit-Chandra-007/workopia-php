<?=
loadPartialView('head')
?>
<?=
loadPartialView('navbar')
?>

<main class="container mx-auto p-4 mt-4">

    <div class="bg-blue-900 h-24 px-4 mb-4 flex justify-center items-center rounded">
        <form action="get" method="get" class="flex flex-wrap justify-center">
            <input type="text" placeholder="Job Title" class="w-full md:w-72 mx-1 px-4 py-2 text-gray-900 rounded-md focus:outline-none" />
            <input type="text" placeholder="Location" class="w-full md:w-72 mx-1 px-4 py-2 text-gray-900 rounded-md focus:outline-none" />
            <button class="bg-blue-600 hover:bg-blue-700 mx-1 px-6 py-2 rounded-md text-white">Search</button>
        </form>
    </div>

    <div class="grid grid-cols-3 gap-6 mb-4">

        <?php foreach ($listings as $listing) : ?>
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
                        <?php if (!empty($listing->tags)) : ?>
                            <li class="mb-3">
                                <strong>Tags:</strong> <?= $listing->tags ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <a href="/listing/<?= $listing->id ?>" class="block w-full text-center px-6 py-3 shadow-md rounded-lg border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"> View Details
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= loadPartialView("bottom_banner") ?>
</main>


<?= loadPartialView("footer") ?>