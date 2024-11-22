<?=
    loadPartialView('head')
    ?>
<?=
    loadPartialView('navbar')
    ?>


<div class="max-w-3xl mx-auto mt-6 bg-white rounded-lg shadow-md p-6">
    <?= loadPartialView('message')
        ?>
    <div class="flex justify-between items-center mt-4">
        <a href="/listings" class="text-blue-600 text-sm"><i class="fa fa-arrow-alt-circle-left"></i> Back To
            Listings</a>
        <?php if (Framework\Authorization::isOnwer($listing->user_id)): ?>
            <div class="flex space-x-4 ml-4">
                <a href="/listings/edit/<?= $listing->id ?>"
                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>

                <!-- delete form -->
                <form method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">Delete</button>
                </form>
                <!-- end delete form -->
            </div>
        <?php endif; ?>

    </div>
    <h1 class="text-2xl font-bold mt-4"><?= $listing->title ?></h1>
    <p class="mt-4 text-gray-700"><?= $listing->description ?></p>

    <div class="mt-6">
        <div class="bg-gray-100 rounded-md p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="text-sm">
                    <span class="font-bold">Job Type: </span><?= $listing->job_type ?>
                </div>
                <div class="text-sm">
                    <span class="font-bold">Remote:</span> Yes
                </div>
                <div class="text-sm">
                    <span class="font-bold">Salary:</span> <?= formatSalary($listing->salary) ?>
                </div>
                <div class="text-sm">
                    <span class="font-bold">Site Location:</span> <?= $listing->city . ", " . $listing->state ?>
                </div>
                <div class="text-sm md:col-span-2">
                    <?php if (!empty($listing->tags)): ?>
                        <span class="font-bold">Tags:</span> <?= $listing->tags ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Job Details</h2>
        <div class="mb-6">
            <h3 class="text-lg font-bold text-blue-600">Job Requirements</h3>
            <p class="mt-2 text-gray-700"><?= $listing->requirements ?> </p>
        </div>
        <div>
            <h3 class="text-lg font-bold text-blue-600">Benefits</h3>
            <p class="mt-2 text-gray-700"><?= $listing->benefits ?></p>
        </div>
    </div>
</div>
<?= loadPartialView("bottom_banner") ?>
<?= loadPartialView("footer") ?>