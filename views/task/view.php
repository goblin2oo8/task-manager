<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container theme-showcase" role="main">   
    <div class="page-header"><h1>Task #<?php echo $taskItem['task_id'] ?></h1></div>
    <p>
        <a href='/task/add' class="btn btn-primary" role="button">Add task</a>
        <a href='/task/edit/<?php echo $taskItem["task_id"] ?>' class="btn btn-warning" role="button">Edit task</a>
    </p>
    <p>
        <b>User: </b><?php echo $taskItem['task_user_name'] ?>
    </p>
    <p>
        <b>E-mail: </b><?php echo $taskItem['task_email'] ?>
    </p>
    <p>
        <b>Status: </b><?php
        if ($taskItem['task_status']) {
            echo "Completed";
        } else {
            echo "New";
        }
        ?>
    </p>  
    <p>
        <?php if ($taskItem['task_img'] != '') : ?>
            <img class="img-thumbnail" src="/<?php echo $taskItem['task_img'] ?>">
        <?php endif; ?>    
        <?php echo $taskItem['task_text'] ?>
    </p>
</div> 

<?php include ROOT . '/views/layouts/footer.php'; ?>