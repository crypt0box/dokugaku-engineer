<?php

function dbConnect()
{
    $link = mysqli_connect('db', 'book_log', 'pass', 'book_log');
    if (!$link) {
        echo 'Error: データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    echo 'データベースに接続できました' . PHP_EOL;
    
    return $link;
}

function createBook($link)
{
    echo '読書ログを登録してください' . PHP_EOL;
    echo '書籍名：';
    $title = trim(fgets(STDIN));

    echo '著者名：';
    $author = trim(fgets(STDIN));

    echo '読書状況（未読，読んでる，読了）：';
    $status = trim(fgets(STDIN));

    echo '評価（５点満点の整数）：';
    $rate = (int) trim(fgets(STDIN));

    echo '感想：';
    $review = trim(fgets(STDIN));

    $sql = <<<EOT
    INSERT INTO books (
        title,
        author,
        status,
        rate,
        review
    ) VALUES (
        "{$title}",
        "{$author}",
        "{$status}",
        $rate,
        "{$review}"
    )
    EOT;

    $result = mysqli_query($link, $sql);
    if ($result) {
        echo 'データを追加しました' . PHP_EOL;
    } else {
        echo 'Error: データの追加に失敗しました' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_error($link) . PHP_EOL;
    }

    echo '登録が完了しました' . PHP_EOL . PHP_EOL;

    // return [
    //   'title' => $title,
    //   'author' => $author,
    //   'status' => $status,
    //   'rate' => $rate,
    //   'review' => $review,
    // ];
}

function displayBooks($books)
{
    echo '読書ログを表示します' . PHP_EOL;
    foreach ($books as $book) {
        echo '書籍名：' . $book['title'] . PHP_EOL;
        echo '著者名：' . $book['author'] . PHP_EOL;
        echo '読書状況：' . $book['status'] . PHP_EOL;
        echo '評価：' . $book['rate'] . PHP_EOL;
        echo '感想：' . $book['review'] . PHP_EOL;
        echo '------------' . PHP_EOL;
    }
}

$link = dbConnect();
$books = [];

while (true) {
    echo '1. 読書ログを登録' . PHP_EOL;
    echo '2. 読書ログを表示' . PHP_EOL;
    echo '9. アプリケーションを終了' . PHP_EOL;
    echo '番号を選択してください（1,2,9）:';
    $num = trim(fgets(STDIN));
    
    if ($num === '1') {
        createBook($link);
    } elseif ($num === '2') {
        displayBooks($books);
    } elseif ($num === '9') {
        // アプリケーションを終了する
        mysqli_close($link);
        echo 'データベースとの接続を切断しました' . PHP_EOL;
        break;
    }
}