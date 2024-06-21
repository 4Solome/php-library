<?php
if (isset($_SESSION['message'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismis="alert" aria-label="Close"></button>

    </div>

<?php
    unset($_SESSION['message']);
endif;
?>