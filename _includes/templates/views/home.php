<?php
ob_start();
?>
    <div class="row">
        <div class="col-md-6 text-white" id="home-left">
            <h3>Institut de l'engagement Feat Hackadon <i class="fas fa-rocket"></i></h3>
            <br><br><br>
            <h1>Plateforme de mise en relation entre lauréats et bénévoles</h1>

            <div class="row">
                <div class="col-12">
                    <br>
                    <br>
                    <br>
                    <h3 class="text-center">Connexion</h3>
                </div>
                <div class="col-12">
                    <form action="" method="POST">
                        <input type="hidden" name="type" value="LAUREAT">
                        <div class="form-group">
                            <label>Email de connexion</label>
                            <input type="email" class="form-control" placeholder="Email de connexion" name="email">
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" class="form-control" placeholder="Votre mot de passe" name="pwd">
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="/inscription/" class="btn btn-info btn-block">
                                    Inscription
                                </a>
                            </div>
                            <div class="col-md-8 offset-md-1">
                                <button class="btn btn-danger btn-block">
                                    Connexion <i class="fas fa-rocket"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(function() {
            $("body").css({"background-image": "url(\"https://engagement.fr/wp-content/uploads/2019/02/IDE-18-e1549018765190.jpg\"",
                "background-position": "center",
                "background-repeat": "no-repeat",
                "background-size": "cover"})
        });
    </script>
<style>
    #home-left {
        background-color: #0560bba3;
        min-height: 100vh;
        height: 100%;
        padding: 70px;
    }
    #buttonChoises {
        margin-top: 150px;
    }
    .btnBack {
        margin-top: -10px;
    }
    #formBenevol, #formLaureat {
        margin-top: 20px;
    }
</style>
<?php
$content = ob_get_clean();
?>
