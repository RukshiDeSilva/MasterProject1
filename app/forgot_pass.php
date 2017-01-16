<?php
    if(!empty($_POST["forgot-password"])){
        $conn = mysqli_connect("localhost", "root", "", "warranty_management");
        
        $condition = "";
        if(!empty($_POST["user-login-name"])) 
            $condition = " username = '" . $_POST["user-login-name"] . "'";
        if(!empty($_POST["user-email"])) {
            if(!empty($condition)) {
                $condition = " and ";
            }
            $condition = "email = '" . $_POST["user-email"] . "'";
        }
        
        if(!empty($condition)) {
            $condition = " where " . $condition;
        }
        //echo 'gfdh'.$condition;
        $sql = "Select * from sales_person " . $condition;
        $result = mysqli_query($conn,$sql);
        
        $user = mysqli_fetch_array($result);
        
        if(!empty($user)) {
            require_once("forgot-password-recovery-mail.php");
        } else {
            $error_message = 'No User Found';
        }
    }

?>


<!DOCTYPE html>
<html>

  <head>

    <meta charset="UTF-8">
    <title>Login Screen</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <style>
            input[type=submit] {
    border-radius: 5px;
    font-family: Tahoma;
    background: ;
    /* Old browsers */
    background: -moz-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
    /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(1%, #f4f4f4), color-stop(100%, #ededed));
    /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
    /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
    /* Opera 11.10+ */
    background: -ms-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
    /* IE10+ */
    background: linear-gradient(to bottom, #f4f4f4 1%, #ededed 100%);
    /

}
    </style>
       
    }
    <script>
        window.console = window.console || function(t) {};
        window.open = function(){ console.log('window.open is disabled.'); };
        window.print = function(){ console.log('window.print is disabled.'); };
        if (false) {
            window.ontouchstart = function(){};
        }
    </script>
    
    <script src='js/jquery.js'></script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage('resize', "*");
        }
    </script>

    <script src="js/timeout.js"></script>
    <script>
        $('#login-button').click(function (event) {
            event.preventDefault();
            $('form').fadeOut(800);
            $('.wrapper').addClass('form-success');
        });

    </script>
    <script>
function validate_forgot() {
    if((document.getElementById("user-login-name").value == "") && (document.getElementById("user-email").value == "")) {
        document.getElementById("validation-message").innerHTML = "Login name or Email is required!"
        return false;
    }
    return true
}
</script>

</head>

<body>

    <div class="wrapper">
        <div class="container">
           
            <form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">
<h1>Forgot Password?</h1>
    <?php if(!empty($success_message)) { ?>
    <div class="success_message"><?php echo $success_message; ?></div>
    <?php } ?>

    <div id="validation-message">
        <?php if(!empty($error_message)) { ?>
    <?php echo $error_message;?>
    <?php } ?>
    </div>
    <div class="field-group">
        <div><label for="username">Username</label></div>
        <div><input type="text" name="user-login-name" id="user-login-name" class="input-field"> Or</div>
    </div>
    
    <div class="field-group">
        <div><label for="email">Email</label></div>
        <div><input type="text" name="user-email" id="user-email" class="input-field"></div>
    </div>
    
    <div class="field-group">
        <div><input style="color:red" type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button"></div>
    </div>
                
</form>

        </div>


        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>

    </div>


</body>

</html>

