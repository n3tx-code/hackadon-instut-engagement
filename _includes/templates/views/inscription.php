<?php
ob_start();
?>
<div class="row">
    <div class="col-md-6 text-white" id="home-left">
        <h3>Institut de l'engagement Feat Hackadon <i class="fas fa-rocket"></i></h3>
        <br><br><br>
        <h1>Plateforme de mise en relation entre lauréats et bénévoles</h1>
        <div class="row" id="buttonChoises">
            <div class="col-6">
                <button type="button" class="btn btn-danger btn-block" id="btnLaureat">Lauréat</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary btn-block" id="btnBenevole">Bénévole</button>
            </div>
        </div>
        <div class="row" style="margin-top: 50px" id="btnConnexion">
            <div class="col-12">
                <a href="/" class="btn btn-secondary btn-block">Connexion</a>
            </div>
        </div>
        <div class="row" id="formLaureat" style="display: none">
            <div class="col-12">
                <button type="button" class="btn btn-link text-white btnBack float-left">
                    <h3>
                        <i class="fas fa-chevron-circle-left"></i>
                    </h3>
                </button>
                <h3 class="text-center">Inscription Lauréat</h3>
            </div>
            <div class="col-12">
                <form action="" method="POST">
                    <input type="hidden" name="type" value="LAUREAT">
                    <div class="form-group">
                        <label>Nom et prénom</label>
                        <input type="text" class="form-control" placeholder="Comment vous appelez vous ?" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email de connexion</label>
                        <input type="email" class="form-control" placeholder="Email de connexion" name="email1" required>
                    </div>
                    <div class="form-group">
                        <label>Confirmation email de connexion</label>
                        <input type="email" class="form-control" placeholder="Confirmaiton email de connexion" name="email2" required>
                    </div>
                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Votre mot de passe" name="pwd1" required>
                    </div>
                    <div class="form-group">
                        <label>Confirmation mot de passe</label>
                        <input type="password" class="form-control" placeholder="Confirmation de votre mot de passe" name="pwd2" required>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="/" class="btn btn-info btn-block">
                                Connexion
                            </a>
                        </div>
                        <div class="col-md-8 offset-md-1">
                            <button class="btn btn-danger btn-block">
                                Inscription <i class="fas fa-rocket"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" id="formBenevol" style="display: none">
            <div class="col-12">
                <button type="button" class="btn btn-link text-white btnBack float-left">
                    <h3>
                        <i class="fas fa-chevron-circle-left"></i>
                    </h3>
                </button>
                <h3 class="text-center">Inscription bénévole</h3>
            </div>
            <div class="col-12">
                <form action="" method="POST">
                    <input type="hidden" name="type" value="BENEVOLE">
                    <div class="form-group">
                        <label>Nom et prénom</label>
                        <input type="text" class="form-control" placeholder="Comment vous appelez vous ?" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email de connexion</label>
                        <input type="email" class="form-control" placeholder="Email de connexion" name="email1" required>
                    </div>
                    <div class="form-group">
                        <label>Confirmation email de connexion</label>
                        <input type="email" class="form-control" placeholder="Confirmaiton email de connexion" name="email2" required>
                    </div>
                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Votre mot de passe" name="pwd1" required>
                    </div>
                    <div class="form-group">
                        <label>Confirmation mot de passe</label>
                        <input type="password" class="form-control" placeholder="Confirmation de votre mot de passe" name="pwd2" required>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="/" class="btn btn-info btn-block">
                                Connexion
                            </a>
                        </div>
                        <div class="col-md-8 offset-md-1">
                            <button class="btn btn-danger btn-block">
                                Inscription <i class="fas fa-rocket"></i>
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
    $("#btnLaureat").click(() => {
        $("#buttonChoises").hide();
        $("#formLaureat").show();
        $("#btnConnexion").hide();
    });
    $("#btnBenevole").click(() => {
        $("#buttonChoises").hide();
        $("#formBenevol").show();
        $("#btnConnexion").hide();
    });
    $(".btnBack").click(() => {
        $("#formLaureat").hide();
        $("#formBenevol").hide();
        $("#buttonChoises").show();
        $("#btnConnexion").show();
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
