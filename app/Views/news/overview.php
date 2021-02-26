<h2><?= esc($title) ?></h2>

<?php if (! empty($news) && is_array($news)) : ?>

<?php foreach ($news as $item): ?>

    <h3><?= esc($item->title) ?></h3>

    <div class="main">
        <?php echo word_limiter(esc($item->body), 15); ?>
    </div>
    <p><a href="<?php echo base_url("news/" . esc($item->slug, 'url')) ?>">View article</a></p>

<?php endforeach; ?>

<?php else : ?>

<h3>No News</h3>

<p>Unable to find any news for you.</p>

<?php endif ?>