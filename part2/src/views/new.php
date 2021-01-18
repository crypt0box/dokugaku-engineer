<!DOCKTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1">
    <link rel="stylesheet" href="stylesheets/css/app.css">
    <title>読書ログの登録</title>
</head>

<body>
    <div class="container">
        <h1 class="h2 text-dark mt-4 mb-4">読書ログの登録</h1>
        <form action="create.php" method="POST"> 
            <?php if (count($errors)) : ?>
                <ul class="text-danger">
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>    
                </ul>
            <?php endif; ?>
    
            <div class="form-froup">
                <label for="title">書籍名</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo $review['title'] ?>">
            </div>
            <div class="form-froup mt-2 mb-2">
                <label for="author">著者名</label>
                <input type="text" id="author" name="author" class="form-control" value="<?php echo $review['author'] ?>">
            </div>
            <div>
                <label>読書状況</label>
                <div>
                    <input type="radio" id="status1" name="status" value="未読"
                        <?php echo ($review['status'] === '未読') ? 'checked' : ''; ?>>
                    <label for="status1">未読</label>
                    <input type="radio" id="status2" name="status" value="読んでる"
                        <?php echo ($review['status'] === '読んでる') ? 'checked' : ''; ?>>
                    <label for="status2">読んでる</label>
                    <input type="radio" id="status3" name="status" value="読了"
                        <?php echo ($review['status'] === '読了') ? 'checked' : ''; ?>>
                    <label for="status3">読了</label>
                </div>
            <div class="mt-2 mb-2">
                <label for="rate">評価(5点満点の整数)</label><br>
                <input type="number" id="rate" name="rate" max="5" min="1" value="<?php echo $review['rate'] ?>">
            </div>
            <div class="form-group">
                <label for="review">感想</label><br>
                <textarea type="text" id="review" name="review" class="form-control"><?php echo $review['review'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">登録する</button>
        </form>
    </div>
</body>
</html>