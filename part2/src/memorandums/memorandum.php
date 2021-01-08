<?php

function dbConnect()
{
    $link = mysqli_connect('db', 'book_log', 'pass', 'book_log');
    if (!$link) {
        echo 'Error: データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    return $link;    
}

function validate($memo)
{
    $errors = [];

    // 題名が正しく入力されているかチェック
    if (!strlen($memo['title'])) {
        $errors['title'] = '題名を入力してください';
    } elseif (strlen($memo['title']) > 255) {
        $errors['title'] = '題名は255文字以内で入力してください';
    }

    // 内容が正しく入力されているかチェック
    if (strlen($memo['content']) > 1024) {
        $errors['content'] = '内容は1024文字以内で入力してください';
    }

    return $errors;
}

function createMemorandum($link)
{
    $memo = [];

    echo 'メモを登録してください' . PHP_EOL;
    echo '題名：';
    $memo['title'] = trim(fgets(STDIN));

    echo '内容：';
    $memo['content'] = trim(fgets(STDIN));

    $validated = validate($memo);
    if (count($validated) > 0) {
        foreach ($validated as $error) {
            echo $error . PHP_EOL;
        }
        return;
    }

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
    if ($result) {
        echo 'メモを追加しました' . PHP_EOL;
    } else {
        echo 'Error: メモの追加に失敗しました' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_error($link) . PHP_EOL;
    }

    echo '登録が完了しました' . PHP_EOL . PHP_EOL;
}

function displayMemorandums($link) 
{
    echo 'メモを表示します' . PHP_EOL;

    $sql = 'SELECT id, title, content FROM memorandums';
    $results = mysqli_query($link, $sql);

    while ($memo = mysqli_fetch_assoc($results)) {
        echo 'ID：' . $memo['id'] . PHP_EOL;
        echo '題名：' . $memo['title'] . PHP_EOL;
        echo '内容：' . $memo['content'] . PHP_EOL;
        echo '------------' . PHP_EOL;
    }

    mysqli_free_result($results);
}

function updateMemorandum($link)
{
    $memo = [];

    displayMemorandums($link);
    echo '編集するメモの番号を選んでください:';
    $num = trim(fgets(STDIN));

    echo '内容を変更してください' . PHP_EOL;
    echo '題名：';
    $memo['title'] = trim(fgets(STDIN));

    echo '内容：';
    $memo['content'] = trim(fgets(STDIN));

    $validated = validate($memo);
    if (count($validated) > 0) {
        foreach ($validated as $error) {
            echo $error . PHP_EOL;
        }
        return;
    }
    
    $sql = <<<EOT
    UPDATE memorandums
        SET title = "{$memo['title']}", content = "{$memo['content']}"
        WHERE id = {$num}
    EOT;

    $result = mysqli_query($link, $sql);
    if ($result) {
        echo 'メモを更新しました' . PHP_EOL;
    } else {
        echo 'Error: メモの更新に失敗しました' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_error($link) . PHP_EOL;
    }
}

function deleteMemorandum($link)
{
    displayMemorandums($link);
    echo '削除するメモの番号を選んでください:';
    $num = (int) trim(fgets(STDIN));
    
    $sql = <<<EOT
    DELETE FROM memorandums WHERE id = {$num}
    EOT;

    $result = mysqli_query($link, $sql);
    if ($result) {
        echo 'メモを削除しました' . PHP_EOL;
    } else {
        echo 'Error: メモの削除に失敗しました' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_error($link) . PHP_EOL;
    }
}

$link = dbConnect();

while (true) {
    echo '1. メモを登録' . PHP_EOL;
    echo '2. メモを表示' . PHP_EOL;
    echo '3. メモを編集' . PHP_EOL;
    echo '4. メモを削除' . PHP_EOL;
    echo '9. アプリケーションを終了' . PHP_EOL;
    echo '番号を選択してください（1,2,9）:';
    $num = trim(fgets(STDIN));

    if ($num === '1') {
        // 新規メモを登録
        createMemorandum($link);
    } elseif ($num === '2') {
        // 登録したメモを表示
        echo 'メモ一覧を表示します' . PHP_EOL;
        displayMemorandums($link);
    } elseif ($num === '3') {
        // 登録したメモを編集
        updateMemorandum($link);
    } elseif ($num === '4') {
        // 登録したメモを削除
        deleteMemorandum($link);
    } elseif ($num === '9') {
        // アプリケーションを終了する
        break;
    }
}

echo 'Bye Bye!';