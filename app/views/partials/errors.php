<?php if (isset($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline"><?= $error ?></span>
        </div>
    <?php endforeach; ?>

<?php endif; ?>