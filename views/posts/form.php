<fieldset>
    <legend>General Information</legend>

    <label for="title">Title:</label>
    <input type="text" id="title" name="post[title]" placeholder="Post Title" value="<?php echo s($post->title); ?>">

    <label for="image">Image:</label>
    <input type="file" id="image" accept="image/jpeg, image/png" name="post[image]">

    <?php if($post->image): ?>

        <img src="/images/<?php echo $post->image; ?>" alt="post" class="imagen-small">

    <?php endif; ?>

    <label for="content">Content:</label>
    <textarea id="content" name="post[content]"><?php echo htmlspecialchars($post->content); ?></textarea>

</fieldset>
