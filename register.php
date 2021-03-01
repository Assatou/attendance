<!DOCTYPE html>
<html>
<head>
  <title>Inscription</title>
  
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
 <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
  -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->


<!-- MATERIAL DESIGN ICONIC FONT -->
<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
<!-- STYLE CSS -->
<link rel="stylesheet" href="css/style.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body class="container" style='background:#1a0ebd;'>



<div class="container" >
        <div class="wrapper" style="">
			<div class="inner" style='background:white; width:700px; border-radius:15px;
								  height:650px; padding-top:20px;'>
                   <form class="well form-horizontal" method="post" action="checkdata1.php" id="Form" enctype="multipart/form-data" onsubmit="return checkall();">
                       <h1 style="text-align: center;">INSCRIPTION</h1>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label class="col-md-4 control-label">Nom </label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="UserName" name="username" placeholder="Name" class="form-control" value="" type="text"></div>
                                        </div>
                                </div>

                                <div class="form-wrapper">
                                    <label class="col-md-4 control-label">Email</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="UserEmail" name="useremail" placeholder="Email" class="form-control" value="" type="email" required onkeyup="checkemail();"></div>
                                    <span id="email_status"></span>
                                    </div>
                                </div>
                           </div>   

                            <div class="form-wrapper">
                                <label class="col-md-4 control-label">Telephone</label>
                                <div class="col-md-8 inputGroupContainer">
                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="UserPhone" name="userphone" placeholder="07 00 00 00 00" class="form-control" type="tel" required onkeyup="checkphone();"> 
                                <span id="phone_status"></span>
                                </div>
                                </div>
                            </div>

                         
                         <!-- <div class="form-wrapper"> -->
                            <label class="col-md-4 control-label">Sexe</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-user"></i></span>
                                  <div>
                                   <input type="radio" name="sex" id="agree-term" class="agree-term" value="male"checked />
                                    <label for="agree-term" class="label-agree-term">H</label>
                                    
                                    <input type="radio" name="sex" id="agree-term" class="agree-term" value="femelle" />
                                    <label for="agree-term" class="label-agree-term">F</label>
                                    
                                    <input type="radio" name="sex" id="agree-term" class="agree-term" value="autre" />
                                    <label for="agree-term" class="label-agree-term">Autre</label>
                                  </div>
                               </div>
                            </div>
                         <!-- </div> -->
                         <div class="form-wrapper">
                            <label class="col-md-4 control-label">Mot de passe</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-password"></i></span><input id="UserPassword" name="userpass" placeholder="Password (10 Max)" class="form-control" value="" type="password" required maxlength="10">

                              </div>
                              </div>   
                               
                            </div>
                         
                        <div class="form-wrapper">
                            <label class="col-md-4 control-label">Confirmer mot de passe</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-password"></i></span><input id="UserPassword2" name="userpass2" placeholder="Confirmer (10 Max)" class="form-control" value="" type="password" required maxlength="10"  onkeyup="checkpass();">
                                <span id="pass_status"></span>

                               </div>
                            </div>
                         </div>

                    <div class="form-wrapper">
                      <label class="col-md-4 control-label">Photo</label>
                       <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="file" name="file"/> 
                    </div>
                    </div>
                    </div>
                            <div class="form-wrapper">
                                <button type="submit" name="submit_form" style='background:#1a0ebd;' class="btn btn-primary" value="Save to database" >Enregister</button>
                            </div>
                      </fieldset>
                           <div id="register-link" class="text-right">
                                <a href="login.php" class="text-light">Connectez-vous</a>
                            </div>
                            <div id="register-link" class="text-left">
                                <a href="index.php" class="text-light">Accueil</a>
                            </div>
                            <div id="register-link" class="text-center">
                                <a href="login.php" class="text-light">Espace etudiant</a>
                            </div>

                      <!-- <a href="index.php" class="text-info">Accueil</a> -->
                   </form>
            </div>
		</div>
             
<script>
function checkphone()//Fonction qui vérifie si le téléphone existe ou pas
        {
            var phone=document.getElementById( "UserPhone" ).value;
                
            if(phone)
            {
                $.ajax({
                    type: 'post',
                    url: 'checkdata1.php',
                    data: {
                    user_phone:phone,
                    },
                    success: function (response) {
                        $( '#phone_status' ).html(response);
                        if(response=="OK")  
                        {
                            return true;  
                        }
                        else
                        {
                            return false; 
                        }
                    }
                });
            }
                else
                {
                    $( '#phone_status' ).html("");
                    return false;
                }
        }

        function checkemail()//Fonction qui vérifie si le mail existe ou pas
        {
        var email=document.getElementById( "UserEmail" ).value;
            
        if(email)
        {
            $.ajax({
                type: 'post',
                url: 'checkdata1.php',
                data: {
                user_email:email,
                },
                success: function (response) {
                    $( '#email_status' ).html(response);
                    if(response=="OK")  
                    {
                        return true;  
                    }
                    else
                    {
                        return false; 
                    }
                }
            });
            }
            else
            {
                $( '#email_status' ).html("");
                return false;
            }
        }

        function checkpass()//Fonction qui vérifie si les mMdp correspondent
        {
            var pass2=document.getElementById( "UserPassword2" ).value;
            var pass=document.getElementById( "UserPassword" ).value;
            
                
            if(pass2)
            {
                $.ajax({
                    type: 'post',
                    url: 'checkdata1.php',
                    data: {
                    user_pass2:pass2,
                    user_pass:pass,
                    },
                    success: function (response) {
                        $( '#pass_status' ).html(response);
                        if(response=="OK")  
                        {
                            return true;  
                        }
                        else
                        {
                            return false; 
                        }
                    }
                });
            }
                else
                {
                    $( '#pass_status' ).html("");
                    return false;
                }
        }


        function checkall()
        {
            var namehtml=document.getElementById("phone_status").innerHTML;
            var emailhtml=document.getElementById("email_status").innerHTML;
            var passhtml=document.getElementById("pass_status").innerHTML;

            if((namehtml && emailhtml && passhtml)=="OK")
            {
                return true;//On peut s'inscrire
            }
            else
            {
                return false;//On ne peut pas s'incrire
            }
        }



</script>



</body>
</html>


  
