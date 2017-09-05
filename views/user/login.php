<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container theme-showcase" role="main">   
    <div class="page-header"><h1>Authorization</h1></div>  
    <?php if ($errors) : ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form class="form-inline" action="#" method="post">       
        <div class="form-group">
            <label>Login:</label>
            <input type="text" placeholder="Name" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" placeholder="password" name="password" class="form-control">
        </div>
        <input type="submit" name="submit" value="Login" class="btn btn-default">
    </form>
</div> 

<?php include ROOT . '/views/layouts/footer.php'; ?>


