<?php echo validation_errors(); ?>
<?php echo form_open('compte/connecter'); ?>
<!-- Connexion -->
    <section class="bg-light" id="connexion">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Connecter vous à l'application</h2>
            <h3 class="section-subheading text-muted">Cet espace est réservée aux Formateurs et aux Administrateurs</h3>
          </div>
        </div>
        <div class="text-center">
          <h4><?php echo $inactif; ?></h4>
        </div>
        <br><br><br>
        <div class="row">
          <div class="col-lg-12">
            <form action="" class="form-inline justify-content-center">
              <div class="row">
                <div class="col-md-3"></div>
                  <div class="col-md-3">
                     <label for="pseudo">Pseudo</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" pattern="[a-zA-Z0-9]+" required="required" placeholder="Pseudo" name="pseudo">
                  </div>
                  <div class="col-md-3"></div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <label for="mdp">Mot de passe</label>
                </div>
                <div class="col-md-3"> 
                    <input type="password" class="form-control" required="required" placeholder="Mot de passe" name="mdp">
                </div>
                <div class="col-md-3"></div>
              </div>
              <br><br><br><br>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-s text-uppercase" text-uppercase" value="Connexion">Connexion</button>
                  </div>
                  <div class="col-md-3">
                    <input type="button" class="btn btn-primary btn-s text-uppercase" value="Annuler" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>index.php/accueil/afficher')">
                  </div>
                  <div class="col-md-3"></div>
                </div>
              </div>
            </form>
          </div>
        </div>
    </section>