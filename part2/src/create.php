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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $review = [
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'status' => $_POST['status'],
        'rate' => $_POST['rate'],
        'review' => $_POST['review']
    ];

    $link = dbConnect();
    createReview($link, $review);
    mysqli_close($link);
}

header("Location: index.php");