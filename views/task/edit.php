<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container theme-showcase" role="main">   
    <div class="page-header"><h1>Task #<?php echo $taskItem['task_id'] ?></h1></div>
    <p>
        <a href='/task/add' class="btn btn-primary" role="button">Add task</a>
        <a href='/task/edit/<?php echo $taskItem["task_id"] ?>' class="btn btn-warning" role="button">Edit task</a>
    </p>
    <?php if ($result): ?>
        <div class="alert alert-success" role="alert">
            <p>Task edited!</p>
        </div>
    <?php else : ?>   
        <p>
            <b>User: </b><?php echo $taskItem['task_user_name'] ?>
        </p>
        <p>
            <b>E-mail: </b><?php echo $taskItem['task_email'] ?>
        </p>
        <p>
            <?php if ($taskItem['task_img'] != '') : ?>
                <img class="img-thumbnail" src="/<?php echo $taskItem['task_img'] ?>">
            <?php endif; ?>    
        </p>
        <form action="#" method="post" class="form-horizontal">
            <div class="form-inline">
                <label>Task text:</label><br>
                <textarea name="text" cols="40" rows="5" placeholder="Task text" class="form-control"><?php echo $taskItem['task_text'] ?></textarea>
            </div>    
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="status" value="1" <?php if ($taskItem['task_status']) echo "checked"; ?>>Completed
                </label>
            </div> 
            <div class="form-inline">
                <input type="submit" name="submit" value="Save" class="btn btn-default">    
            </div>
        </form>
    <?php endif; ?>
</div> 

<?php include ROOT . '/views/layouts/footer.php'; ?>