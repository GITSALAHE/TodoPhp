<?php include('includes/header.php') ?>
    <nav class="menu" tabindex="0" style="margin-top:96px;">
        <div class="smartphone-menu-trigger"></div>
        <header class="avatar">
            <img src="<?php echo $image ?>" />
            <?php

            ?>
        </header>
        <ul>
            <li tabindex="0" class="icon-dashboard"><i class="fas fa-cogs" style="color: black;"></i>&nbsp;<span><a href="addTodo.php">Add Todolist</a></span></li>
            <li tabindex="0" class="icon-customers"><i class="fas fa-clipboard-list" style="color: black;"></i>&nbsp;<span><a href="manageTodo.php">List Todolists</a> </span></li>
            <li tabindex="0" class="icon-users"><i class="far fa-address-card" style="color: black;"></i>&nbsp;<span><a href="manageProfile.php">Manage Profile</a></span></li>
        </ul>
    </nav>
    