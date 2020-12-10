<?php
    session_start();
    ob_start();
    require("DatabaseObject.php");
    require("DatabaseVar.php");

    $database = new DatabaseObject($host, $username, $password, $database);

    $output = ob_get_clean();
    require("includes/header.php");
    require("event_show.php");
    echo "<a href='write_post.php'><img class='fixedbutton' src='https://img.icons8.com/color/96/000000/plus--v1.png'/></a>";
    echo $output;
?>

<!--<div class="slideshow-container">
    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="img/img1.png">
        <div class="text">敘述</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="img/img2.png">
        <div class="text">敘述</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="img/img3.png">
        <div class="text">敘述</div>
    </div>

    <a class="prev" onclick="plusSlide(-1)">&#10094;</a>
    <a class="next" onclick="plusSlide(1)">&#10095;</a>
</div>
<br>
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlide(n) {
        showSlides(slideIndex += n);
    }

    function currentSlides(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");

        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }

</script>
-->