<?php

require_once __DIR__ . '/lib/escape.php';
require_once __DIR__ . '/lib/mysqli.php';

function listMemos($link)
{
    $memos = [];
    $sql = 'SELECT title, content FROM memorandums;';
    $results = mysqli_query($link, $sql);

    while ($memo = mysqli_fetch_assoc($results)) {
        $memos[] = $memo;
    }

    mysqli_free_result($results);

    return $memos;
}

$link = dbConnect();
$memos = listMemos($link);

$title = 'メモの一覧';
$content = __DIR__ . '/views/index.php';
include __DIR__ . '/views/layout.php';