<?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success text-center" id="success-message" role="alert">
        <!-- Shows success message -->
        <?= $_SESSION['success']; ?>
        <?php
            // Removes success message from the session after displaying it.
            unset( $_SESSION['success'] );
        ?>
    </div>
<?php endif; ?>