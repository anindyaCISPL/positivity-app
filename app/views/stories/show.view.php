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
                        <span style="margin-right: 10px">
                            <a href="/story/likes?id=<?= $story[0]->id; ?>">
                                <i class="fas fa-thumbs-up" <?php if ($likes->count) echo "style='color:olivedrab'"; ?>></i>
                            </a>
                            <?= $likes->count; ?>
                        </span>
                        <span>
                            <a href="/story/dislikes?id=<?= $story[0]->id; ?>">
                                <i class="fas fa-thumbs-down" <?php if ($likes->count) echo "style='color:slategrey'"; ?>></i>
                            </a>
                            <?= $dislikes->count; ?>
                        </span>
                    </span>
                    <span class="story_keywords">
                        <?= $story[0]->keywords; ?>
                    </span>
                    <span class="story_comment">
                        <i class="far fa-comment"></i> <?= count($comments); ?> comments
                    </span>
                </div>
                <?php
                // if any comments registerd against that story only then replies section display
                if (count($comments)) { ?>
                    <div class="replies">
                        <h3>Replies</h3>
                        <?php foreach ($comments as $comment) : ?>
                            <div class="reply_box">
                                <div class="avatar">
                                    <i class="fas fa-user-circle fa-3x"></i>
                                </div>
                                <div class="content">
                                    <span class="commenter"><?= username($comment->user_id); ?></span>says
                                    <p class="comment_time"><?= date('F j,Y', strtotime($comment->updated)); ?></p>
                                    <p class="comment_body"><?= $comment->body; ?></p>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php
                    // Only logined user can be able to make comment
                }
                if (auth()) {
                    // if the post belongs to logined user only then update previlage granted 
                    if (auth()->id == $story[0]->user_id) { ?>
                        <div class="modify_btn">
                            <a href="/story/edit?id=<?= $story[0]->id; ?>" class="btn">Update</a>
                        </div>
                    <?php } else {
                        //for other registered users  Comment section display
                    ?>
                        <div class="comment_box">
                            <h3>Leave a Reply</h3>
                            <form action="story/comment" method="post">
                                <input type="hidden" name="user_id" value="<?= auth()->id ?>">
                                <input type="hidden" name="story_id" value="<?= $story[0]->id ?>">
                                <p>Comment</p>
                                <textarea name="body" id="" cols="30" rows="10" required="required"></textarea>
                                <div class="control">
                                    <input type="submit" value="Post" class="btn">
                                </div>
                            </form>
                        </div>
                    <?php }
                } else {
                    //the following section display for guest
                    ?>
                    <div class="login_box">
                        <span class="sign_in">
                            <a href="/login/">
                                <i class="fas fa-sign-in-alt fa-2x"></i>
                            </a>
                        </span>
                        <span class="sign_in_content">
                            Login to post your comment <a href="/login/"><button>Login</button></a>
                        </span>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</main>

<?php require(dirname(__DIR__) . '/partials/footer.view.php');
