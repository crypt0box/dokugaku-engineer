<h1>読書ログの一覧</h1>
<a href="new.php">読書ログを登録する</a>
<main>
    <?php if (count($reviews) > 0) : ?>
        <?php foreach ($reviews as $review) : ?>
            <section>
                <h2>
                    <?php echo escape($review['title']) ?>
                </h2>
                <div>
                    <?php echo escape($review['author']) ?>&nbsp;/&nbsp;
                    <?php echo escape($review['status']) ?>&nbsp;/&nbsp;
                    <?php echo escape($review['rate']) ?>点
                </div>
                <p>
                    <?php echo nl2br(escape($review['review']), false) ?>
                </p>
            </section>
        <?php endforeach; ?>
    <?php else : ?>
        <p>会社情報が登録されていません。</p>
    <?php endif; ?>
</main>