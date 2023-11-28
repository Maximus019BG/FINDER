<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Sign Up</title>
    <link rel="stylesheet" href="sign-up.css">
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">  
     <script>
        window.addEventListener('DOMContentLoaded', (e) => {
            var gradient = new Gradient;
            gradient.initGradient("#gradient-canvas");
        });
    </script> <script src="/log-in/log-in.js"></script>
</head>
<body>
    <a href="sign-up.php"></a> 
    <canvas alt="background" id="gradient-canvas" data-js-darken-top data-transition-in ></canvas>
     
    <center>
        <div class="card"> 
        
            <h1>Регистрация</h1>
            <form method="post" action="sign-up-logic.php">
            <div class="email">
                <input class="input-content" type="text" id="username" name="username" required placeholder="Потребител1" maxlength="50" required />
                  <label for="username">Потребителско име </label>
           </div>
           <div class="password">
                 <input class="input-content" type="password" id="password" name="password" required placeholder="Парола2" maxlength="50" required />
                   <label for="password">Парола</label>
           </div>    
           <div id="TheHoleButton">  
           <div class="button-wrapper">
        <button  class="button" type="submit" value="Sign Up">Регистрация</button>
        <div class="button-bg"></div>
        </div></form>
        </div>
        </div>
        <p >Вече имаш акаунт ? <a href="/log-in/log-in.php">Впиши се </a>или<a href="/index/index.php"> продължи без</a> </p>
    </center>    
</body>
</html>