function changeColor() {
    var x = document.getElementById("gfg");
    var y = document.getElementById("gfg1");
    var z = document.getElementById("gfg2");
    var u = document.getElementById("gfg3");
    var i = document.getElementById("gfg4");
    var o = document.getElementById("gfg5");
  
    x.style.color = "black";
    y.style.color = "black";
    z.style.color = "black";
    u.style.color = "black";
    i.style.color = "black";
    o.style.color = "black";

  }

  window.onscroll = () => {
    const nav = document.querySelector('#navbar');
    if(this.scrollY <= 10) nav.className = ''; else nav.className = 'scroll';
  
    
    changeColor();
    };
  /////////
  
 
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
      dynamicBullets: true },
  
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev" },
  
  
    breakpoints: {
      0: {
        slidesPerView: 1 },
  
      520: {
        slidesPerView: 2 },
  
      950: {
        slidesPerView: 3 } } });
  
  ////
