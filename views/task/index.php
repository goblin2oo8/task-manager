<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container theme-showcase" role="main">   
    <div class="page-header"><h1>Tasks list</h1></div>        
    <p><a href='/task/add' class="btn btn-primary" role="button">Add task</a></p>
    <form class="form-inline" action="/" method="post">
        <div class="form-group">
            <label>Sort field:</label>
            <select class="form-control" name="sortField">
                <option value="0" <?php if ($_SESSION['sort_field'] == 0) echo 'selected="selected"'; ?>>Id</option>
                <option value="1" <?php if ($_SESSION['sort_field'] == 1) echo 'selected="selected"'; ?>>Name</option>
                <option value="2" <?php if ($_SESSION['sort_field'] == 2) echo 'selected="selected"'; ?>>E-mail</option>
                <option value="3" <?php if ($_SESSION['sort_field'] == 3) echo 'selected="selected"'; ?>>Status</option>
            </select>
        </div>
        <div class="form-group">
            <label>Type:</label>
            <select class="form-control" name="sortOrganize">
                <option value="1" <?php if ($_SESSION['sort_organize'] == 1) echo 'selected="selected"'; ?>>Ascending</option>
                <option value="2" <?php if ($_SESSION['sort_organize'] == 2) echo 'selected="selected"'; ?>>Descending</option>
            </select> 
            <input class="btn btn-default" type="submit" name="submit" value="Sort">  
        </div>
    </form>        
    <table class="table table-striped">
        <thead>       
            <tr>
                <td>Id</td>
                <td>User name</td>
                <td>E-mail</td>
                <td>Text</td>
                <td>Image</td>
                <td>Status</td>
                <td></td>
                <?php if (!User::isGuest()) : ?>
                    <td></td>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taskList as $taskItem) : ?>
                <tr class="<?php if ($taskItem['task_status']) echo 'success'; ?>">
                    <td><?php echo $taskItem['task_id'] ?></td>
                    <td><?php echo $taskItem['task_user_name'] ?></td>
                    <td><?php echo $taskItem['task_email'] ?></td>
                    <td><?php echo $taskItem['task_text'] ?></td>
                    <td>
                        <?php if ($taskItem['task_img'] != '') : ?>
                            <img class="img-thumbnail" src="/<?php echo $taskItem['task_img'] ?>">
                        <?php endif; ?>  </td>
                    <td>
                        <?php
                        if ($taskItem['task_status'])
                            echo "Completed";
                        else
                            echo "New";
                        ?>
                    </td>
                    <td>
                        <a href="/task/<?php echo $taskItem['task_id'] ?>" class="btn btn-info" role="button">View</a>
                    </td>
                    <?php if (!User::isGuest()) : ?>
                        <td>
                            <a href="/task/edit/<?php echo $taskItem['task_id'] ?>" class="btn btn-warning" role="button">Edit</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>  
        </tbody>
    </table>
    <p><?php echo $pagination->get(); ?></p>
</div>   

<?php include ROOT . '/views/layouts/footer.php'; ?>