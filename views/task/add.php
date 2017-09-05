<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container theme-showcase" role="main">   
    <div class="page-header"><h1>Add task</h1></div>
    <?php if ($errors) : ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <p>
        <a href='/task/add' class="btn btn-primary" role="button">Add task</a>
    </p>
    <?php if ($result): ?>
        <div class="alert alert-success" role="alert">
            <p>Task added!</p>
        </div>
    <?php else : ?>  
        <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data" id="form1" runat="server">
            <div class="form-inline">
                <label>Name:</label><br>
                <input type="text" placeholder="Name" name="name" value="<?php echo $name ?>" class="form-control" id="name">
            </div>  
            <div class="form-inline">
                <label>Task text:</label><br>
                <textarea name="text" cols="40" rows="5" placeholder="Task text" class="form-control" id="text"><?php echo $text ?></textarea>
            </div>    
            <div class="form-inline">
                <label>E-mail:</label><br>
                <input type="email" placeholder="E-mail" name="email" value="<?php echo $email ?>" class="form-control" id="email">
            </div>  
            <div class="form-inline">
                <label>Choose image(jpg, gif or png):</label><br>
                <input type="file" name="img" class="form-control" id="img" onchange="readURL(this)">
            </div>  
            <div class="form-inline">
                <input type="submit" name="submit" value="Save" class="btn btn-default"> 
                <button type="button" onclick="preview();" class="btn btn-default" id="prev_button">Preview</button>
            </div>  
        </form>
    <?php endif; ?>
    <div id="prev_div">
        <p id="prev_name"></p>
        <p id="prev_email"></p>
        <img class="img-thumbnail" id="prev_img" src="">
        <p id="prev_text"></p>
    </div>
</div> 

<?php include ROOT . '/views/layouts/footer.php'; ?>