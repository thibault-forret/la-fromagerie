

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
        <h1>Finalisez votre commande</h1>
        <h2>Plongez dans une expérience culinaire inégalée avec nos fromages artisanaux.</h2>
        <form method="POST" action="https://recette-tpeweb.e-transactions.fr/php/">
            <input type="hidden" name="PBX_SITE" value="">
            <input type="hidden" name="PBX_RANG" value="">
            <input type="hidden" name="PBX_IDENTIFIANT" value="">
            <input type="hidden" name="PBX_TOTAL" value="<?php echo $montant ?>">
            <input type="hidden" name="PBX_DEVISE" value="978">
            <input type="hidden" name="PBX_CMD" value="<?php echo $cmd ?>">
            <input type="hidden" name="PBX_PORTEUR" value="<?php echo $email ?>">
            <input type="hidden" name="PBX_RETOUR" value="<?php echo $pbx_retour ?>">
            <input type="hidden" name="PBX_EFFECTUE" value="<?php echo $url_effectue ?>">
            <input type="hidden" name="PBX_REFUSE" value="<?php echo $url_refuse ?>">
            <input type="hidden" name="PBX_ANNULE" value="<?php echo $url_annule ?>">
            <input type="hidden" name="PBX_RUF1" value="POST">
            <input type="hidden" name="PBX_REPONDRE_A" value="<?php echo $url_ipn ?>">
            <input type="hidden" name="PBX_HASH" value="SHA512">
            <input type="hidden" name="PBX_TIME" value="<?php echo $dateTime; ?>">
            <input type="hidden" name="PBX_HMAC" value="<?php echo $hmac; ?>">
            <input type="submit" class="btn btn-outline-white btn-get-started" value="Procéder au paiement">
        </form>
    </div>
</section><!-- End Hero Section -->



