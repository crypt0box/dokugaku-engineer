<?php

function createMemorandum()
{
    echo '新しいメモを登録してください' . PHP_EOL;
    echo '題名：';
    $title = trim(fgets(STDIN));

    echo '内容：';
    $content = trim(fgets(STDIN));

    echo '登録が完了しました' . PHP_EOL . PHP_EOL;

    return [
      'title' => $title,
      'content' => $content,
    ];
}

function displayMemorandums($memorandums) 
{
    foreach ($memorandums as $number => $memorandum) {
        echo $number + 1 . '.' . PHP_EOL;
        echo '題名：' . $memorandum['title'] . PHP_EOL;
        echo '内容：' . $memorandum['content'] . PHP_EOL;
        echo '---------' . PHP_EOL;
    }
}

function updateMemorandum($memorandums)
{
    displayMemorandums($memorandums);
    echo '編集するメモの番号を選んでください:';
    $num = trim(fgets(STDIN));
    $memorandums[(int)$num-1] = createMemorandum();

    return $memorandums;
}

function deleteMemorandum()
{
    displayMemorandums($memorandums);
    echo '削除するメモの番号を選んでください:';
    $num = trim(fgets(STDIN));
    unset($memorandums[(int)$num-1]);
    $memorandums = array_values($memorandums);

    return $memorandums;
}

$memorandums = [];

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
        $memorandums[] = createMemorandum();
    } elseif ($num === '2') {
        // 登録したメモを表示
        echo 'メモ一覧を表示します' . PHP_EOL;
        displayMemorandums($memorandums);
    } elseif ($num === '3') {
        // 登録したメモを編集
        $memorandums = updateMemorandum($memorandums);
    } elseif ($num === '4') {
        // 登録したメモを削除
        $memorandums = deleteMemorandum($memorandums);
    } elseif ($num === '9') {
        // アプリケーションを終了する
        break;
    }
}