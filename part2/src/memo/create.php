<?php

require __DIR__ . '/lib/mysqli.php';

function createMemo($link, $memo)
{
    $sql = <<<EOT
    INSERT INTO memorandums (
        title,
        content
    ) VALUES (
        "{$memo['title']}",
        "{$memo['content']}"
    )
    EOT;

    $result = mysqli_query($link, $sql);
    if (!$result) {
        error_log('Error: fail to create review');
        error_log('Debugging Error: ' . mysqli_error($link));
    }
}

function validate($memo)
{
    $errors = [];

    // タイトル
    if (!strlen($memo['title'])) {
        $errors['title'] = 'タイトルを入力してください';
    } elseif (strlen($memo['title']) > 255) {
        $errors['title'] = 'タイトルは255文字以内で入力してください';
    }

    // 内容
    if (!strlen($memo['content'])) {
        $errors['content'] = '内容を入力してください';
    } elseif (strlen($memo['content']) > 10000) {
        $errors['content'] = '内容は10000文字以内で入力してください';
    }

    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $memo = [
        'title' => $_POST['title'],
        'content' => $_POST['content']
    ];

    $errors = validate($memo);

    if (!count($errors)) {
        $link = dbConnect();
        createMemo($link, $memo);
        mysqli_close($link);
        header("Location: index.php");
    }
}

$title = 'メモの登録';
$content = __DIR__ . '/views/new.php';
include __DIR__ . '/views/layout.php';