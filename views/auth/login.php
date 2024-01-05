<section class="contenedor">
    <div class="login">
        <div class="login-image">
            <h1>Admin Access</h1>
        </div>
        <div class="login-form">
            <?php foreach($alertas as $alerta): ?>
                <div class="alerta error">
                    <?php echo $alerta; ?>
                </div>
            <?php endforeach; ?>
            <form class="form" method="POST" action="/login">
                <fieldset>
                    <label for="email">Email:</label>
                    <input id="email" name="email" class="login-input" type="email" placeholder="Your E-mail">
                    <label for="password">Password:</label>
                    <input id="password" name="password" class="login-input" type="password" placeholder="Your Password">

                    <input type="submit" class="btn btn-ok" value="Login">
                </fieldset>
            </form>
        </div>
    </div>
</section>