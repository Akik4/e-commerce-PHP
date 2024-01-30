<?php

global $data;
include_once './template/header.php';

if(isset($_GET['id']))
{
?>

<?php
        $profile = $data->getUser($_GET['id']);
    ?>
            <div id="profil-content">
                <div id="profil-container">
                    <h1>PROFILE</h1>
                    <?php if($_GET['id'] == $_SESSION['id']): ?>
                    <a href="./action/logout.php">logout</a>
                    <?php endif; ?>
                    <h2>Info</h2>
                    <p>Username : <?= $profile['username']; ?></p>
                    <p>ID : <?= $profile['id']; ?></p>
                    <p>Role : <?= $profile['rolename']; ?></p>
                    <p>Contact : <?= $profile['email']; ?></p>
                    <h2>Edit</h2>
                    <div id="edit-container">
                        <div class="edit-cell">
                            <span>Username </span>
                            <a href="./profile.edit.php?item=Username&id=<?= $_SESSION['id']?>">Edit</a>
                        </div>
                        <div class="edit-cell">
                            <span>Email </span>
                            <a href="./profile.edit.php?item=Email&id=<?= $_SESSION['id']?>">Edit</a>
                        </div>
                        <div class="edit-cell">
                            <span>Password </span>
                            <a href="./profile.edit.php?item=Password&id=<?= $_SESSION['id']?>">Edit</a>
                        </div>
                    </div>
                    <h2>Cart</h2>
                    <h2>Commands</h2>

                </div>
            </div>
            <footer>footer</footer>
        </div>
    </div>
<?php
}
?>


