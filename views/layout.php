<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prehistoric Replica</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header">
        <div class="header-content contenedor">
            <div class="header-image">
                <a href="/"><img src="../build/img/logo-header.png"></a>
            </div>
            <div class="header-nav nav-both">
                <h3 id="hamburguer-button" class="hamburguer-button">☰</h3>
                <nav id="nav" class="nav hidden">
                    <a href="/">Home</a>
                    <a href="/about">About Us</a>
                    <a href="/explore">Explore</a>
                    <a href="/blog">Blog</a>
                    <a href="/contact">Contact Us</a>
                    <?php if($_SESSION['login']): ?>

                        <a href="/admin">Admin</a>
                        <a href="/logout">Logout</a>

                    <?php endif; ?>

                </nav>
            </div>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer">
        <div class="contenedor-footer contenedor">

            <?php include 'paginas/social-icons.php'; ?>

            <div class="footer-nav  nav-both">
                <nav id="nav" class="nav">
                    <a href="/">Home</a>
                    <a href="/about">About Us</a>
                    <a href="/explore">Explore</a>
                    <a href="/blog">Blog</a>
                    <a href="/contact">Contact Us</a>
                    <?php if($_SESSION['login']): ?>

                        <a href="/admin">Admin</a>
                        <a href="/logout">Logout</a>

                    <?php endif; ?>

                </nav>
            </div>
        </div>
        <div class="copyright">
            <div class="footer-copyright contenedor">
                    <p>Prehistoric Replica &copy; 2023 Developed by Javier Miguras</p>
            </div>
        </div>
    </footer>
    
    <script src="../build/js/app.js"></script>
</body>
</html>