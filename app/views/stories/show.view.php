<?php require(dirname(__DIR__) . '/partials/header.view.php'); ?>
<main>
    <header>
        <h1>
            <strong>CORONA</strong>
            Warrior Stories
        </h1>
    </header>
    <div class="form-body">

        <div class="box">
            <span class="story_author"><?= $story[0]->name; ?></span>
            <span class="story_time"><?= date('F j,Y', strtotime($story[0]->created_at)); ?></span>
            <span class="story_location"><?= $story[0]->district; ?>, <?= $story[0]->state; ?></span>
            <span class="story_title"><?= $story[0]->title; ?></span>
            <iframe width="700" height="315" src="https://www.youtube.com/embed/<?= substr(strstr($story[0]->video, '?v='), 3); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="story_images">
                <img src="<?= ltrim(getimage('story_id', $story[0]->id, 1)[0]->location ??= './public/images/default.webp', '.'); ?>" alt="" width="700" height="450" id="primary">
            </div>
            <?php
            $allImages = getimage('story_id', $story[0]->id);
            //  dd($allImages);
            foreach ($allImages as $image) {
            ?>
                <div class="story_all_images">
                    <a href="#<?= ltrim($image->location, '.'); ?>"><img src="<?= ltrim($image->location, '.'); ?>" alt="100" width="75"></a>
                </div>
                <!-- modal section -->
                <div id="<?= ltrim($image->location, '.'); ?>" class="overlay">
                    <a href="#primary" class="cancel"></a>
                    <div class="modal"><img src="<?= ltrim($image->location, '.'); ?>" alt="" width="700" height="450"></div>
                </div>
                <!-- modal section end -->
            <?php } ?>
            <div class="comment">
                <div class="story_review">
                    <span class="story_like">
                        <i class="far fa-heart"></i> 0
                    </span>
                    <span class="story_keywords">
                        <?= $story[0]->keywords; ?>
                    </span>
                    <span class="story_comment">
                        <i class="far fa-comment"></i> 0 comments
                    </span>
                </div>
                <?php
                if (auth()) {
                    if (auth()->id == $story[0]->user_id) { ?>
                        <div class="modify_btn">
                            <a href="/story/edit?id=<?= $story[0]->id; ?>" class="btn">Update</a>
                        </div>
                    <?php } else { ?>
                        <div class="comment_box">
                            <h3>Leave a Reply</h3>
                            <form action="">
                                <p>Comment</p>
                                <textarea name="comment" id="" cols="30" rows="10"></textarea>
                                <div class="control">
                                    <input type="submit" value="Post" class="btn">
                                </div>
                            </form>
                        </div>
                    <?php }
                } else { ?>
                    <div class="login_box">
                        <span class="sign_in">
                            <i class="fas fa-sign-in-alt fa-2x"></i>
                        </span>
                        <span class="sign_in_content">
                            Login to post your comment <button>Login</button>
                        </span>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</main>

<?php require(dirname(__DIR__) . '/partials/footer.view.php');
