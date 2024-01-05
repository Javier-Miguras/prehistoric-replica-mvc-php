<section class="post-page contenedor">
    <div class="entry">
        <div class="entry-head">
            <div class="entry-image">
                <img src="<?php echo $post->image ?>" alt="Post Image">
            </div>
            <div class="entry-main">
                <div class="entry-meta">
                    <p class="meta"><?php echo $post->date; ?></p>
                </div>
                <div class="entry-title">
                <h1><?php echo $post->title; ?></h1>
                </div>
            </div>
        </div>
        <div class="entry-content">
            <hr/>
            <p><?php echo nl2br($post->content); ?></p>
        </div>
    </div>
</section>