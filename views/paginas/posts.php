<div class="posts contenedor">

    <?php foreach($posts as $post): ?>
        <a href="/post?id=<?php echo $post->id; ?>" class="post">
             <div class="post-meta">
                <p class="meta"><?php echo $post->date; ?></p>
            </div>
            <div class="post-image">
                <img src="<?php echo $post->image; ?>" alt="Post Image">
            </div>
            <div class="post-heading">
                <h2 class="post-title"><?php echo $post->title; ?></h2>
            </div>
        </a>
    <?php endforeach; ?>
    </div>