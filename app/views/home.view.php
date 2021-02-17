<?php
require('partials/header.view.php');
?>
<div class="banner">
    <a href="/story/create/">
        <img src="public/images/banner.jpg" alt=""></a>
</div>

<main>
    <section class="about">
        <h2>About Us</h2>
        <div style="display: flex;">
            <div style="width: 500px;padding: 10px 0;">
                <p> The goal of this project is to spread positive vibes to the mass of people of India.</p>
                <p style="padding-top: 10px;">
                    From an outbreak to a pandemic in the blink of an eye, COVID-19 has taken the media by storm. Staying optimistic in such an unforeseen crisis feels almost impossible as fear engulfs us all. But, practising positivity is a powerful way of keeping stress and worries at bay.
                </p>
                <p style="padding-top: 10px;">
                    It’s easy to let negative thoughts take over during such a strange and scary time. As we navigate our way through the COVID-19 pandemic staying positive is not as easy as it used to be. Nations are quarantined. People are sick. Essential workers are tired. If you’re feeling negative don’t worry, because you are not alone.
                </p>
                <p style="padding-top: 10px;">Here are a few ways our human resources professionals advise us to try to stay positive ...</p>
            </div>
            <div>
                <img src="/public/images/stay-positivity.png" alt="">
            </div>
        </div>
        <button><a href="/about/"> Read More </a></button>
    </section>
    <header>
        <h1>
            <strong>CORONA</strong>
            Warrior Stories
        </h1>
    </header>
    <?php
    require('partials/story.view.php');
    ?>
    <footer>
        <button><a href="/story/create/"> Stories </a></button>
        <button><a href="/stories/">More Stories</a></button>
    </footer>
    <section class="about">
        <h2>LATEST NEWS AND DEVELOPMENT OF COVID19</h2>
        <div class="latest">
            <div class="dvideo">
                <div>
                    <iframe frameborder="0" width="" height="100%" src="https://www.dailymotion.com/embed/video/x7yxswn" allowfullscreen allow="autoplay; fullscreen">
                    </iframe>
                </div>
                <div>
                    <iframe frameborder="0" width="" height="100%" src="https://www.dailymotion.com/embed/video/x7yfoue" allowfullscreen allow="autoplay; fullscreen">
                    </iframe>
                </div>
            </div>
            <div style="overflow: scroll;">
                <a class="twitter-timeline" href="https://twitter.com/coronaviruscare?ref_src=twsrc%5Etfw">Tweets by coronaviruscare</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
        <button><a href="/about/"> Read More </a></button>
    </section>
</main>
<?php
require('partials/footer.view.php');
?>