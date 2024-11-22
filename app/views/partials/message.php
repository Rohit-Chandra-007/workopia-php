<?php
use Framework\Session;
?>

<?php $succesMessage = Session::getFlashMessage('success_message'); ?>
<?php if ($succesMessage !== null): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline"><?= $succesMessage ?></span>
    </div>
<?php endif; ?>

<?php $error_message = Session::getFlashMessage('error_message'); ?>
<?php if ($error_message !== null): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline"><?= $error_message ?></span>
    </div>
<?php endif; ?>