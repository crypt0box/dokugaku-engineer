<?php
?>
<!DOCKTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1">

    <title>読書ログの登録</title>
</head>

<body>
    <h1>読書ログ</h1>
    <form action="create.php" method="POST">
        <div>
            <label for="title">書籍名</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="author">著者名</label>
            <input type="text" id="author" name="author">
        </div>
        <div>
            <label>読書状況</label>
            <div>
                <label for="status1">未読</label>
                <input type="radio" id="status" name="status1" value="未読">
            </div>
            <div>
                <label for="status2">読んでる</label>
                <input type="radio" id="status" name="status2" value="読んでいる">
            </div>
            <div>
                <label for="status3">読了</label>
                <input type="radio" id="status" name="status3" value="読了">
            </div>
        <div>
            <label for="rate">評価(5点満点の整数)</label>
            <input type="number" id="rate" name="rate" max="5" min="0">
        </div>
        <div>
            <label for="review">感想</label>
            <textarea type="text" id="review" name="review"></textarea>
        </div>
        <button type="submit">登録する</button>
    </form>
</body>
</html>