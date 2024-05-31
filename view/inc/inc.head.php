<!doctype html>
<html lang="fr">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <?php $pageActuelle = isset($_GET['page']) ? $_GET['page'] : null; ?>

    <title><?php echo ($pageActuelle === null) ? 'Accueil' : ucfirst($pageActuelle); ?> - La Fromagerie</title>
    <link rel="icon" type="image/png" href="media/logo/la-fromagerie.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="include/vendor/aos/aos.css" rel="stylesheet">
    <link href="include/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="include/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="include/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="include/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="include/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="include/styles/style.css">
</head>
<body>
