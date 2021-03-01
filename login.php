<!DOCTYPE html>
<html>
<head>
    <title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- MATERIAL DESIGN ICONIC FONT -->
<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
<!-- STYLE CSS -->
<link rel="stylesheet" href="css/style.css">

</head>


<body style='background:#1a0ebd;'>
<!-- <?php include'header.php'; ?> -->
<br>
<br>
<br>
<br>

    <div class='container' style='background:white; width:700px; border-radius:15px;
								  height:400px; padding-top:20px;'>
        <div id="login">
        <!-- <h3 class="text-center text-white pt-5">Connexion</h3> -->
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <div class="container bg-secondary">
                   <!-- <div style=""> -->
                        <form id="login-form" class="form" action="" method="post">
                            <center><h2 class="text-light">SE CONNECTER</h2></center> <br>
                    
                            <h3 class="text-center text-light"></h3>
                            <div class="form-group">
                                <label for="email" class="text-light">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-light">Mot de passe</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="form-group">
                               <button type="button" name="save" class="btn btn-primary" value="Login" style='background:#1a0ebd;' id="butlogin" >Se connecter</button>
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="register.php" class="text-light">Inscrivez-vous</a>
                            </div>
                            <div id="register-link" class="text-left">
                                <a href="index.php" class="text-light">Accueil</a>
                            </div>
                            <div id="register-link" class="text-center">
                                <a href="loginprof.php" class="text-light">Espace professeur</a>
                            </div>
                        
                        </form>
                    <!-- </div> -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


<script>
$(document).ready(function() {
    $('#butlogin').on('click', function() {
        $("#butlogin").attr("disabled", "disabled");
        var email = $('#email').val();
        var password = $('#password').val();
        if(email!="" && password!=""){
            $.ajax({
                url: "save.php",
                type: "POST",
                data: {
                    type: 2,
                    email: email,
                    password: password              
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        location.href = "accueiletu.php";                              
                    }
                    else if(dataResult.statusCode==201){
                       alert("Erreur du mail ou mot de passe !");
                    }
                    
                }
            });
        }
        else{
            alert('Veillez remplir tous les champs !');
        }
    });
});
</script>
</body>
</html>


