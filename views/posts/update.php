<section class="form-page contenedor">
    <h1 class="main-heading">Update Post</h1>

    <?php foreach($alertas as $alerta): ?>
            <div class="alerta error">
                <?php echo $alerta; ?>
            </div>
        <?php endforeach; ?>

    <a class="btn btn-ok" href="/admin">Back</a>

    <form class="form" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/form.php'; ?>
        <input type="submit" class="btn btn-blue" value="Save Changes">
    </form>
</section>