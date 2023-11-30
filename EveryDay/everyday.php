<!DOCTYPE html>

<html lang="bg">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EveryDay</title>
        <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link href="https://fonts.googleapis.com/css2?family=Rubik+Moonrocks&family=Tektur:wght@600;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./everyday.css">

</head>
<body>

    <!-- Navbar -->

    <div class="header">

        <nav id="navbar">
         <ul>
        <section id="li-section">
        <li><a id="gfg" >лого</a></li></section>
<section id="li-section">
        <li><a id="gfg1" href="/ecology/ecology.php">Екология</a></li>
        <li><a id="gfg2" href="/hardware/hardware.php">Хардуер</a></li>
        <li><a id="gfg3" href="/everyday/everyday.php">Всекидневие</a></li>
            </section>
            <section id="li-section">
        <li><a id="gfg4" href="/log-in/log-in.php">Вписване </a>
            <a id="gfg5" href="/sign-up/sign-up.php"> Регистрация </a></li>
    </section>
      </ul>
    </nav>

  
   </div>
   
                          <!-- TITLE -->

    <div class="container1">
        <div class="center">
            <h1 class="apple">Всекидневие</h1>
        </div>
    </div>
	
    
    <!-- External Media --> 
    
    <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">
    
    <div class="container2">
        <input type="text" class="search" id="search-inp" placeholder="Search..." >
        <button class="search-btn"  id="search-inp-btn" onclick="search()">&#x027A4;</button>
    </div>

         

<div class="slider owl-carousel">
         <div class="card">
            <div class="img">
               <img src="#" alt="">
            </div>
            <div class="content">
               <div class="title">
                  Briana Tozour
               </div>
               <div class="sub-title">
                  Graphic Designer
               </div>
               <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit modi dolorem quis quae animi nihil minus sed unde voluptas cumque.
               </p>
               <div class="btn">
                  <button>Read more</button>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="img">
               <img src="#" alt="">
            </div>
            <div class="content">
               <div class="title">
                  Pricilla Preez
               </div>
               <div class="sub-title">
                  Web Developer
               </div>
               <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit modi dolorem quis quae animi nihil minus sed unde voluptas cumque.
               </p>
               <div class="btn">
                  <button>Read more</button>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="img">
               <img src="#" alt="">
            </div>
            <div class="content">
               <div class="title">
                  Eliana Maia
               </div>
               <div class="sub-title">
                  App Developer
               </div>
               <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit modi dolorem quis quae animi nihil minus sed unde voluptas cumque.
               </p>
               <div class="btn">
                  <button>Read more</button>
               </div>
            </div>
         </div>
      </div>


      <script>
         $(".slider").owlCarousel({
           loop: true,
           autoplay: true,
           autoplayTimeout: 2000, //2000ms = 2s;
           autoplayHoverPause: true,
         });

             //SEARCH!!!!!!!!!!
         function search() {
    // Get the value from the search input
    var searchTerm = $("#search-inp").val().toLowerCase();

    // Get all elements with the classes 'title' and 'sub-title'
    var titles = document.querySelectorAll('.title, .sub-title');
   
    // Reset color for all titles/sub-titles
    titles.forEach(function (title) {
        title.style.color = "";
        
    });

    // Loop through each title/sub-title and check if it contains the search term
    titles.forEach(function (title) {
        var titleText = title.innerText.toLowerCase();
        if (titleText.includes(searchTerm)) {
            title.style.color = "red";
        }
    });
}
      </script>								

 </body>
 <script src="everyday.js"></script>
  
</html>