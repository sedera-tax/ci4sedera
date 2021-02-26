<h2><?= esc($news['title']) ?></h2>
<p><?= esc($news['body']) ?></p>
<br>
<div style="border: 1px dotted #000000; padding: 20px;">
    <h3>Les dernières actualités</h3>
    <?php
    foreach ($last_news as $item) :
    ?>
        <h4><?= esc($item->title) ?></h4>
        <div class="main">
            <?php echo word_limiter(esc($item->body),15); ?>
        </div>
        <p><a href="<?php echo base_url("news/" . esc($item->slug, 'url')) ?>">View article</a></p>
    <?php
    endforeach;
    ?>
</div>