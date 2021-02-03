<div class="gcontainer">

    <?php
    //dd($stories);
    foreach ($stories as $story) :
        // dd(getimage('story_id', $story->id, 1)[0]->location ??= 'Not Provided');
        // dd($story->id);
    ?>
        <a href="../story?id=<?= $story->id; ?>">
            <div class="item">
                <img src="<?= ltrim(getimage('story_id', $story->id, 1)[0]->location ?? './public/images/default.webp', '.'); ?>" alt="">
                <p>Posted By : <?= $story->name; ?></p>
                <h4><?= $story->title; ?></h4>
            </div>
        </a>
    <?php endforeach; ?>
</div>