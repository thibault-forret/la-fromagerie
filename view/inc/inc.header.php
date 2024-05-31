<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

        <div id="logo">
            <!-- Uncomment below if you prefer to use a text logo -->
         <h1><a href="/">La Fromagerie</a></h1>
        </div>

        <?php $pageActuelle = isset($_GET['page']) ? $_GET['page'] : null; ?>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link <?php echo ($pageActuelle === null) ? 'active' : ''; ?>" href="/">Accueil</a></li>
                <li><a class="nav-link <?php echo ($pageActuelle === 'produit') ? 'active' : ''; ?>" href="produit">Produits</a></li>
                <li><a class="nav-link <?php echo ($pageActuelle === 'actualite') ? 'active' : ''; ?>" href="actualite">Actualités</a></li>
                <li><a class="nav-link <?php echo ($pageActuelle === 'panier') ? 'active' : ''; ?>" href="panier">Panier</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
<main>


