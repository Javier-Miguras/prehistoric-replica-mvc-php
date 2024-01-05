<form class="form" action="/contact" method="POST">

    <?php if($message): ?>
        <p class='alerta <?php echo $alertType; ?>'><?php echo $message; ?></p>;
    <?php endif; ?>

    <label for="name">Name: </label>
    <input id="name" type="text" placeholder="Your name" name="contact[name]" required>
    <label for="phone">Phone: </label>
    <input id="phone" type="tel" placeholder="Your phone" name="contact[phone]" required>
    <label for="email">E-mail: </label>
    <input id="email" type="email" placeholder="Your e-mail" name="contact[email]" required>
    <label for="message">Message: </label>
    <textarea id="message" cols="30" rows="10" placeholder="Your message" name="contact[message]" required></textarea>
    <input class="btn btn-green" type="submit" value="Send Message">
</form>