<?=
loadPartialView('head')
?>
<?=
loadPartialView('navbar')
?>
<?=
loadPartialView('showcase_search')
?>
<?=
loadPartialView('top_banner')
?>

<main class="container mx-auto p-4 mt-4">

    <h1 class="text-3xl font-bold text-center mb-10 border border-gray-300 p-3">
        Welcome To Workopia
    </h1>
    <div class="grid grid-cols-3 gap-6 mb-4">

        <?php foreach ($listings as $listing) : ?>

            <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto my-8">
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


    <a href="/listings" class="block text-xl text-center">
        <i class="fa fa-arrow-alt-circle-right"></i>
        Show All Jobs
    </a>




    <?= loadPartialView("bottom_banner") ?>
</main>


<?= loadPartialView("footer") ?>