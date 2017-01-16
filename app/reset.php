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

</head>

<body>

    <div class="wrapper">
        <div class="container">
            <h1>Welcome</h1>
            <h2 style="font-size: xx-large">Inventory and Warranty Management System</h2>

            <form name="frmReset" id="frmReset" method="post" onSubmit="return validate_password_reset();">
<h1>Reset Password</h1>
    <?php if(!empty($success_message)) { ?>
    <div class="success_message"><?php echo $success_message; ?></div>
    <?php } ?>

    <div id="validation-message">
        <?php if(!empty($error_message)) { ?>
    <?php echo $error_message; ?>
    <?php } ?>
    </div>

    <div class="field-group">
        <div><label for="Password">Password</label></div>
        <div>
        <input type="password" name="member_password" id="member_password" class="input-field"></div>
    </div>
    
    <div class="field-group">
        <div><label for="email">Confirm Password</label></div>
        <div><input type="password" name="confirm_password" id="confirm_password" class="input-field"></div>
    </div>
    
    <div class="field-group">
        <div><input type="submit" name="reset-password" id="reset-password" value="Reset Password" class="form-submit-button"></div>
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
