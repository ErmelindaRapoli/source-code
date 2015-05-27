<?php

$login=<<<LOGIN
<form id="login-form" method="post">
   <div class="form-control username">
      <span class="icon"><i class="fa fa-user"></i></span>
      <input type="text" name="username" placeholder="Username" class="required" autocomplete="off"/>
   </div>
   <div class="form-control password">
      <span class="icon"><i class="fa fa-lock"></i></span>
      <input type="password" name="password" placeholder="Password" class="required"/>
   </div>   
   <div class="form-control submit">
      <input id="submit-button" type="submit" value="SIGN IN">
   </div>   
</form>
LOGIN;
?>
<!DOCTYPE html>

<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
        Pannello Amministrativo
    </title>
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
</head>
<body>

<script>
    $(document).ready(function(){
        $("#submit-button").click(function(e){
            e.preventDefault();
            $('.fa-user, .fa-lock').css('color', '#CCCCCC');
            $('.message').remove();
            var iserror = false;
            $('.required').each(function(){
                var requiredItem = $(this);
                if(requiredItem.val() == ""){
                    iserror = true;
                    showMessage(requiredItem.parents('.form-control'),'error', 'Required');
                }
            });
            if(!iserror){
                $('#submit-button').val('Signing in...').css('opacity','.3');
                $.post( "ajax.php", $('#login-form').serialize(), function( data ) {
                    if(data.status == 1){
                        showMessage($('.username'),'error', data.message);
                        $('#submit-button').val('SIGN IN').css('opacity','1');
                    }else if(data.status == 2){
                        showMessage($('.password'),'error', data.message);
                        $('#submit-button').val('SIGN IN').css('opacity','1');
                    }
                    else if(data.status == 3){
                        $('#submit-button').val('Success!').css({
                            'opacity' : 1,
                            'background' : '#229C1E'
                        });
                        setTimeout(function(){
                            $('#submit-button').val('Redirecting...')
                        },1000);
                        setTimeout(function(){
                            window.location.href = "index.php";
                        },1500);
                    }
                },'json');
            }
        });
    });

    function showMessage(appendTo, messageType, message){
        appendTo.find('i').css('color', '#D12136');
        var message = $('<span class="message">'+message+'</span>');
        appendTo.append(message);
        message.addClass(messageType).fadeIn();
    }
</script>
<?php
echo $login;
?>
</body>
</html>