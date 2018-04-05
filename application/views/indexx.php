<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php  echo base_url();?>css/style1.css">

    <title>Accueil</title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Intranet</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <?php foreach($categories as $categorie): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="<?php echo $categorie->id; ?>" role-"button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $categorie->nomC; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="<?php echo $categorie->id; ?>">
          <?php foreach($sousCategorie as $sc): ?>
          <?php if($categorie->id == $sc->idCategorie) {  ?>
          <a class="dropdown-item" href="#"><?php echo $sc->nomS; ?></a>
          <?php
        }
        endforeach;
          ?>
        </div>
      </li>
    <?php endforeach;?>
    </ul>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <section>
        <h4 style="text-align:center;">Bienvenue</h4>
        <p>Vous pouvez ajouter une catégorie ou sous catégorie en cliquant <a href="<?php  echo site_url("ajout"); ?>">ici</a>.</p>
      </section>
    </div>
  </div>
</div>

</body>
</html>