<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>MEDILOG</title>

</head>

<body onload="resizeMenu()">
<?php
spl_autoload_extensions(".php");
spl_autoload_register();
use yasmf\HttpHelper;
?>
<div class="container-fluid h-100  text-white">
    <div class="row h-100">
        <!-- Menu -->
        <div id="menu" class="pt-3 menu col-md-1 col-3 col-sm-2 d-md-flex d-none flex-column gap-3 blue h-100 align-items-center">
            <span onclick="manageClass('menu','d-none')"class="material-symbols-outlined d-md-none d-sm-block text-end w-100">arrow_back</span>
            <div class=" green border-1 ratio ratio-1x1">

            </div>
            <a href="index.php?controller=administrateur" class="green border-1 ratio ratio-1x1">
					<span class="d-flex display-1 align-items-center justify-content-center material-symbols-outlined">
						settings
					</span>
            </a>
            <a href="index.php?controller=administrateur&action=goListMedecins" class="green border-1 ratio ratio-1x1">
                    <span class="d-flex justify-content-center align-items-center material-symbols-outlined">
                        groups
                    </span>
            </a>
        </div>
        <!-- Main page -->
        <div class="col-md-11 h-100 text-center">
            <!-- Bandeau outils -->

            <nav class="  row h-11 navbar navbar-expand-lg navbar-light green">
                <div class="d-flex justify-content-between px-5 container-fluid green">
                    <span class="h1 d-md-block d-none"> Erreurs d'importations </span>
                </div>
            </nav>

            <span class="fs-1 d-md-none d-sm-block text-green"> Erreurs d'importations </span>
            <!-- content -->
            <div class="row h-89 align-items-center text-center overflow-scroll">

                <table class="table table-danger table-striped, table-hover">
                    <tr>
                        <th class="fw-bold">Nombre d'erreurs</th>
                        <th class="fw-bold">Message d'erreur</th>
                    </tr>
                    <?php
                    $totalErreurs = 0;
                    foreach ($erreursImport as $erreur) {
                        echo "<tr>";
                            echo "<td>" . $erreur['nbreErreurs'] . "</td>";
                            $totalErreurs += $erreur['nbreErreurs'];
                            echo "<td>" . $erreur['messageErreur'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
                <div class="col-12">
                    <span class="fw-bold text-black">Nombre total d'erreurs : <?php echo $totalErreurs; ?></span>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="scripts/script.js"></script>
</div>
</body>
</html>
