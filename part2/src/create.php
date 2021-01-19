<?php

require __DIR__ . '/lib/mysqli.php';

function createReview($link, $review)
{
    $sql = <<<EOT
    INSERT INTO reviews (
        title,
        author,
        status,
        rate,
        review
    ) VALUES (
        "{$review['title']}",
        "{$review['author']}",
        "{$review['status']}",
        "{$review['rate']}",
        "{$review['review']}"
    )
    EOT;

    $result = mysqli_query($link, $sql);
    if (!$result) {
        error_log('Error: fail to create review');
        error_log('Debugging Error: ' . mysqli_error($link));
    }
}

function validate($review)
{
    $errors = [];

    // タイトル
    if (!strlen($review['title'])) {
        $errors['title'] = 'タイトルを入力してください';
    } elseif (strlen($review['title']) > 255) {
        $errors['title'] = 'タイトルは255文字以内で入力してください';
    }

    // 著者名
    if (!strlen($review['author'])) {
        $errors['author'] = '著者名を入力してください';
    } elseif (strlen($review['author']) > 50) {
        $errors['author'] = '著者名は50文字以内で入力してください';
    }

    // 読書状況
    if (!in_array($review['status'], ['読了', '読んでる', '未読'])) {
        $errors['status'] = '読書状況を選択してください';
    }

    // 評価
    if ($review['rate'] < 1 || $review['rate'] > 5) {
        $errors['rate'] = '評価は1~5の整数を入力してください';
    }

    // 感想
    if (!strlen($review['review'])) {
        $errors['review'] = '感想を入力してください';
    } elseif (strlen($review['review']) > 1024) {
        $errors['review'] = '感想は1024文字以内で入力してください';
    }

    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 読書状況のラジオボタンにチェックがされていない時に登録ボタンを押しても、エラーがでないようにする処理
    $status = '';
    if (array_key_exists('status', $_POST)) {
        $status = $_POST['status'];
    }

    $review = [
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'status' => $status,
        'rate' => $_POST['rate'],
        'review' => $_POST['review']
    ];

    $errors = validate($review);

    if (!count($errors)) {
        $link = dbConnect();
        createReview($link, $review);
        mysqli_close($link);
        header("Location: index.php");
    }
}

$title = '読書ログの登録';
$content = __DIR__ . '/views/new.php';
include __DIR__ . '/views/layout.php';