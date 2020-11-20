<section id="indexfull">
</section>

<section id="indexNosotros" class="indexcont">
    <h1>Sobre Nosotros</h1>
    <h2>¿Por qué somos tu mejor opción?</h2>
    <div>
        <img src="<?=base_url?>assets/images/indexnosotros.jpg">
        <div>
            <p>Encuentra lo último en tecnología y disfruta de los mejores productos, todo al alcance de tu teléfono.</p>
            <a href="<?=base_url?>main/nosotros" class="button">Descubre más</a>
        </div>
    </div>
</section>
<section id="indexProductos" class="indexcont">
    <h1>Productos</h1>
    <h2>Descubre los mejores productos</h2>
    <!-- Container for the image gallery -->
    <div class="container">

        <!-- Full-width images with number text -->
        <a href="Smartphones.html" class="mySlides">
            <div class="numbertext">1 / 5</div>
            <img src="<?=base_url?>assets/images/phone.jpg" style="height:350px">
        </a>

        <a href="Tablets.html" class="mySlides">
            <div class="numbertext">2 / 5</div>
            <img src="<?=base_url?>assets/images/tablet.jpg" style="height:350px">
        </a>

        <a href="Laptops.html" class="mySlides">
            <div class="numbertext">3 / 5</div>
            <img src="<?=base_url?>assets/images/laptop.jpg" style="height:350px">
        </a>

        <a href="Wearables.html" class="mySlides">
            <div class="numbertext">4 / 5</div>
            <img src="<?=base_url?>assets/images/watch.jpg" style="height:350px">
        </a>

        <a href="Others.html" class="mySlides">
            <div class="numbertext">5 / 5</div>
            <img src="<?=base_url?>assets/images/otros.jpg" style="height:350px">
        </a>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <!-- Image text -->
        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <!-- Thumbnail images -->
        <div class="row">
            <div class="column">
                <img class="demo cursor" src="<?=base_url?>assets/images/phone.jpg" style="height: 100px;" onclick="currentSlide(1)" alt="Smartphones">
            </div>
            <div class="column">
                <img class="demo cursor" src="<?=base_url?>assets/images/tablet.jpg" style="height:100px" onclick="currentSlide(2)" alt="Tablets">
            </div>
            <div class="column">
                <img class="demo cursor" src="<?=base_url?>assets/images/laptop.jpg" style="height:100px" onclick="currentSlide(3)" alt="Laptops">
            </div>
            <div class="column">
                <img class="demo cursor" src="<?=base_url?>assets/images/watch.jpg" style="height:100px" onclick="currentSlide(4)" alt="Smartwatches">
            </div>
            <div class="column">
                <img class="demo cursor" src="<?=base_url?>assets/images/otros.jpg" style="height:100px" onclick="currentSlide(5)" alt="Otro">
            </div>

        </div>
    </div>
</section>
<section id="indexContacto">

</section>