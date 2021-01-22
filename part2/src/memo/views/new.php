<h1 class="h2 text-dark mt-4 mb-4">メモの登録</h1>
<form action="create.php" method="POST"> 
    <?php if (count($errors)) : ?>
        <ul class="text-danger">
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>    
        </ul>
    <?php endif; ?>

    <div class="form-froup">
        <label for="title">タイトル</label>
        <input type="text" id="title" name="title" class="form-control" value="<?php echo $memo['title'] ?>">
    </div>
    <div class="form-group">
        <label for="content">内容</label><br>
        <textarea type="text" id="content" name="content" class="form-control"><?php echo $memo['content'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">登録する</button>
</form>