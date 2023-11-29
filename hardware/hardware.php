<!DOCTYPE html>
<html lang="bg">

<head>
    <?php include_once 'logic-hardware.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hardware</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <!-- Include Swiper and Owl Carousel scripts -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="hardware.css">
    <script type="text/javascript" src="/hardware/hardware.js"></script>
    <style>
        .slider {
            max-width: 110vw;
            display: flex;
            margin-bottom: 20vh;
        }

        .slider .card {
            flex: 10;
            margin: 0 1%;
            background: #313131;
        }

        .slider .card .img {
            height: 30vh;
            width: 100%;
        }

        .slider .card .img img {
            height: 100%;
            width: 100%;
            object-fit:cover;
            border-radius: 5%;
        }

        .slider .card .content {
            padding: 1vw 2vh;
        }

        .card .content .title {
            font-size: 2.5vh;
            font-weight: 600;
        }

        .card .content .sub-title {
            font-size: 2vh;
            font-weight: 600;
            color: #bcff1f;
            line-height: 2vh;
        }

        .card .content p {
            text-align: justify;
            margin: 1vw 0;
        }

        .card .content .btn {
            display: block;
            text-align: left;
            margin: 1vw 0;
        }

        .card .content .btn button {
            background: #bcff1f;
            color: #fff;
            border: none;
            outline: none;
            font-size: 1.7vh;
            padding: 0.5vw 0.8vh;
            border-radius: 0.5%;
            cursor: pointer;
            transition: 0.2s;
        }

        .card .content .btn button:hover {
            transform: scale(0.9);
        }
       
       
    </style>
</head>

<body>
    <div class="header">
        <nav id="navbar">
            <ul>
                <li id="li-section"><a id="gfg">Лого</a></li>

                <section id="li-section">
                    <li><a id="gfg1" href="/ecology/ecology.php">Екология</a></li>
                    <li><a id="gfg2" href="#">Хардуер</a></li>
                    <li><a id="gfg3" href="#">Всекидневие </a></li>
                </section>

                <section id="li-section">
                    <li>
                        <a id="gfg4" href="/log-in/log-in.php">Вписване</a>
                        <a id="gfg5" href="/sign-up/sign-up.php">Регистрация</a>
                    </li>
                </section>
            </ul>
        </nav>

        
        <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">
    
    <div class="container2">
        <input type="text" class="search" id="search-inp" placeholder="Search..." >
        <button class="search-btn"  id="search-inp-btn" onclick="search()">&#x027A4;</button>

    </div>


    
        <div id="searchResults">
            <?php echo $output; ?>
        </div>
    </div>





    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Swiper and Owl Carousel scripts -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Owl Carousel initialization script -->
    <script>
        $(document).ready(function () {
            $(".slider").owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000, // 2000ms = 2s;
                autoplayHoverPause: true,
                items: 1, // Number of items per slide
                responsive: {
                    520: {
                        items: 2
                    },
                    950: {
                        items: 3
                    }
                }
            });
        });


        function search() {
    // Get the value from the search input
    var searchTerm = $("#search-inp").val().toLowerCase();

    // Get all elements with the classes 'title' and 'sub-title'
    var titles = document.querySelectorAll('.title, .sub-title','card');

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

    <!-- Swiper initialization script -->
    <script>
        var swiper = new Swiper(".slide-content", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            centerSlide: 'true',
            fade: 'true',
            grabCursor: 'true',
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                520: {
                    slidesPerView: 2
                },
                950: {
                    slidesPerView: 3
                }
            }
        });
    </script>

</body>

</html>
