<a href="new.php" class="btn btn-primary mt-4 mb-4">メモを登録する</a>
<main>
    <?php if (count($memos) > 0) : ?>
        <?php foreach ($memos as $memo) : ?>
            <section class="card shadow-sm mb-4">
                <div class="card-body">
                    <h2 class="card-title h4 mb-3">
                        <?php echo escape($memo['title']) ?>
                    </h2>
                    <p>
                        <?php echo nl2br(escape($memo['content']), false) ?>
                    </p>
                </div>
            </section>
        <?php endforeach; ?>
    <?php else : ?>
        <p>メモが登録されていません。</p>
    <?php endif; ?>
</main>