<html>
    
    <head><title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
        <div id="top-nav">
            <div id="header-div"><a id="header-link" href="main.php">Login Page</a></div>
        </div>
        <div id="padding-div"></div>
        <div id="login-div">
        <form method="post" action="postLoginPage.php">
            
            <span>Username:</span><br>
            <input class="text-inputs" name="username"><br><br>
            <span>Password:</span><br><input class="text-inputs" type="password" name="password"><br>
            
            <input type="submit" value="Login"><br>
            
        </form>
        
        <?php
            if(isset($_GET['flag'])){
                echo "<span id='fail-message'>Invalid username or password!</span>";
            }
        ?>
        </div>
    </body>
</html>