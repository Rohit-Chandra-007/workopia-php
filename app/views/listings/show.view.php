<?=
loadPartialView('head')
?>
<?=
loadPartialView('navbar')
?>


<div class="max-w-3xl mx-auto mt-6 bg-white rounded-lg shadow-md p-6">
    <a href="/listings" class="text-blue-600 text-sm"><i class="fa fa-arrow-alt-circle-left"></i> Back To Listings</a>
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
                    <?php if (!empty($listing->tags)) : ?>
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