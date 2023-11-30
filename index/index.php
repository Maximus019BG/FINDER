<!DOCTYPE html>
<html lang="bg">
<head>
<?php 
include_once 'logic.index.php';
?>
<?php

function logout() {
    session_start();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/index/index.css">
    <script src="/index/index.js"></script>
    <title>F!NDER</title>
</head>

<body>
  <div class="color">
  
  </div>
  <a href = "/index/index.php"></a>
    <div class="header">

        <nav id="navbar">
         <ul>
        <section id="li-section">
        <li><a >Лого</a></li></section>
<section id="li-section">
        <li><a  href="/ecology/ecology.php">Екология</a></li> 
        <li><a  href="/hardware/hardware.php">Хардуер</a></li>
        <li><a  href="#">Всекидневие </a></li>
            </section>
            <section id="li-section">
            <li><a href="#" > <?php echo  $loginLinkText ?> </a></li> <li id="date"></li> <li><a href="/index/index.php?logout=true">Излизане</a></li>
              
                  
         </section>
      </ul></div>
    </nav>

 
    <img class= "background "src="/images/laptop-iphone-notebook-black-and-white-technology-monochrome-1174754-pxhere.com.jpg">
  

  <h1 class = "typewrite-box">
      <a href="" class="typewrite" data-period="2000" data-type='[ "This place will help you with your choice", "Please first choose which category to help you with" ]'>
      <span class="wrap"></span>
      
    </a>
  </h1>  
   </div>
  
</section>




  <div class="parallax">
<section id="category">
 <div class = "brightness"></div>
 <section id="flexbox">
<!--Ecology-->
<section id="ecology">
  <!--Slide-->
  <div class="box" data-animation="slideInUp" data-animation-delay=".2s">

    <h1 id="ecologyH1"> Екология </h1>
   
      
  </div> 
   <!--Slide-->
   <div class="box" data-animation="slideInUp" data-animation-delay=".2s">

    <h1 class="description"> Тази страница ще ви помогне с избора на екологическа дейност </h1>
      
  </div>
 <!--Slide-->
   <div class="box" data-animation="slideInUp" data-animation-delay=".2s">
    <a href="/ecology/ecology.php">
    <div id="TheHoleButton">  
      <div class="button-wrapper">
      <button  class="button" type="submit" value="Sign Up"> Екология</button>
   <div class="button-bg"></div>
  

   </div>
  </a>

   

   </section>
 
   



 

<!--category-->
   <section id="category" class="category2">
    <!--Slide-->
    
    <div class="box" data-animation="slideInUp" data-animation-delay=".2s">
  
      <h1 id="ecologyH1"> Хардуер </h1>
     
        
    </div> 
     <!--Slide-->
     <div class="box" data-animation="slideInUp" data-animation-delay=".2s">
  
      <h1 class="description"> Тази страница ще ви помогне с избора на части за компютъра </h1>
        
    </div>
   <!--Slide-->
     <div class="box" data-animation="slideInUp" data-animation-delay=".2s">
      <a href="#" >
      <div id="TheHoleButton">  
        <div class="button-wrapper">
        <button  class="button" type="submit" value="Sign Up" >Хардуер </button>
     <div class="button-bg" id = "button-bg2" ></div>
        </a>
  
     </div>
     

     </section>



     <!--category-->
     <section id = "category" class="category3">

      <!--Slide-->
      <div class="box" data-animation="slideInUp" data-animation-delay=".2s">
    
        <h1 id="ecologyH1"> Всекидневие </h1>
       
          
      </div> 
       <!--Slide-->
       <div class="box" data-animation="slideInUp" data-animation-delay=".2s">
    
        <h1 class="description"> Тази страница ще ви помогне с избора на дейности всекидневието </h1>
          
      </div>
     <!--Slide-->
       <div class="box" data-animation="slideInUp" data-animation-delay=".2s">
    <a href="#">
        <div id="TheHoleButton">  
          <div class="button-wrapper">
          <button  class="button" type="submit" value="Sign Up">Всекидневие </button>
       <div class="button-bg" id = "button-bg3"></div>
      
    </a>
       </div>
       
      
       </section>
      </section>
    </section>
    
   
    
   </section>
  <div class = "margin-rep">
   <div class="box" data-animation="slideInUp" data-animation-delay=".2s">
  <section id = "reason">
   
   <section class="why">
    <div class="evenboxinner">
     
       
      <p > Our team decided to build this because we had problem with finding an ecology activity for school project. So we thought that we are not the only one with this problem. 
        So we decided to create this website. </p>
    </div>
  </section>
  <section class="why" >
  <div class="evenboxinner">
     
   
    <p >  One of the other reasons for creating this website is because we wanted to know the price of a specific hardware product (Nvidia GeForce RTX 4060) but we did not know where to search.
    </p>
  </div>
  
  </section>

  <section class="why" id = "last-why">
    <div class="evenboxinner">
       
      
      <p >  One of the other reasons for creating this website is because we wanted to know the price of a specific hardware product (Nvidia GeForce RTX 4060) but we did not know where to search.
      </p>
    </div>
    
    </section>
  </section>
 </div>
  </div>
  <div class = "margin-rep">
   <div class="box" data-animation="slideInUp" data-animation-delay=".2s">
  <section class="why" id="bottom" >
  <div class="evenboxinner">
     
    
    <p >  One of the other reasons for creating this website is because we wanted to know the price of a specific hardware product (Nvidia GeForce RTX 4060) but we did not know where to search.
    </p>
  </div>
  </section>
  </section>
</div>

</body>
</html>