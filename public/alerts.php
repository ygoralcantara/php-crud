
<?php if (isset($_SESSION['create_success']) && $_SESSION['create_success'] === "YES") : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['name'] ?> Contact added with success!
        <button onclick="hide()" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times</span>
        </button>
    </div>
    <?php session_destroy() ?>
<?php endif ?>

<?php if (isset($_SESSION['update_success']) && $_SESSION['update_success'] === "YES") : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['name'] ?> Contact updated with success!
        <button onclick="hide()" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times</span>
        </button>
    </div>
    <?php session_destroy() ?>
<?php endif ?>

<?php if (isset($_SESSION['delete_success']) && $_SESSION['delete_success'] === "YES") : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['name'] ?> Contact removed with success!
        <button onclick="hide()" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times</span>
        </button>
    </div>
    <?php session_destroy() ?>
<?php endif ?>

<?php if (isset($_SESSION['error_contact_empty']) && $_SESSION['error_contact_empty'] === "YES") : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Contact with ID = <?php echo $_SESSION['Contact_ID'] ?> doesn't exists!
        <button onclick="hide()" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times</span>
        </button>
    </div>
    <?php session_destroy() ?>
<?php endif ?>

<?php if (isset($_SESSION['error_id_empty']) && $_SESSION['error_id_empty'] === "YES") : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Contact ID not entered!
        <button onclick="hide()" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times</span>
        </button>
    </div>
    <?php session_destroy() ?>
<?php endif ?>
