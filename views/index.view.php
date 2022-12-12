<?php include("partials/nav.php"); ?>

<head>
    <link rel="stylesheet" href="../css/index.css">
</head>

<main class="main animate-opacity">
    <section class="hero">
        <div class="container hero-container">
            <div class="hero__col">
                <h1 class="hero__title">Book Online</h1>
                <p class="hero__description">
                    Want to avoid queues like this at your departure point, causing
                    you hours of delay as you travel around the country? <br /><br />
                    Book a Ticket online and avoid all the hassle!
                </p>
                <a href="book_online.php" class="hero__btn">Book Now</a>
            </div>
            <div class="hero__col">
                <img src="img/congestion.jpg" alt="picture of congested line" class="hero__img" />
            </div>
        </div>
    </section>

    <section class="services" id="services">
        <div class="container services-container">
            <div class="services__col">
                <h2 class="services__col--title">Passenger Services</h2>
                <img src="img/bus-2.jpg" alt="image of bus" class="services__col--img" />
                <p class="services__col--text">
                    Our reputation has been built upon being the Number 1 transport
                    service in the country. We have a fleet of buses and an
                    experienced team of drivers dedicated to getting you wherever you
                    want to go.
                </p>
                <a href="book_online.php" class="services__col--link">Book a Ticket</a>
            </div>
            <div class="services__col">
                <h2 class="services__col--title">Courier Services</h2>
                <img src="img/package.jpg" alt="image of person inspecting packages" class="services__col--img" />
                <p class="services__col--text">
                    We use our extensive coverage to deliver packages, letters and
                    other goods. Our aim is to provide customized logistic solutions
                    to our esteemed clients through our extensive network.
                </p>
                <a href="services.html" class="services__col--link">More Info</a>
            </div>
        </div>
    </section>

    <section class="inquiry">
        <div class="container inquiry-container">
            <div class="inquiry__col">
                <img src="img/banner-inquiry.jpg" alt="Inquiry banner" class="inquiry__img" />
                <p class="inquiry__text--title">Visit Us</p>
                <p class="inquiry__text--normal">Railways<br />Nairobi, Kenya</p>
                <p class="inquiry__text--title">Call Us</p>
                <p class="inquiry__text--normal">0738200301</p>
                <p class="inquiry__text--title">Write to Us</p>
                <p class="inquiry__text--normal">info@easycoach.co.ke</p>
            </div>
            <div class="inquiry__col inquiry__col--comment">
                <h2 class="inquiry__title">Write Us a Comment!</h2>
                <div class="book__form--box">
                    <input type="text" name="fname" id="fname" class="book__form--input" placeholder=" " />
                    <label for="fname" class="book__form--label">Name</label>
                </div>

                <div class="book__form--box">
                    <input type="text" name="email" id="email" class="book__form--input" placeholder=" " />
                    <label for="email" class="book__form--label">Email</label>
                </div>
                <div class="book__form--box">
                    <textarea name="comment" id="comment" cols="30" rows="7" class="book__form--input" placeholder=" "></textarea>
                    <label for="comment" class="book__form--label">Comment</label>
                </div>
                <button type="submit" class="inquiry__btn" onclick="sendComment()">
                    Submit
                </button>
            </div>
        </div>
    </section>
</main>

<?php include("partials/footer.php"); ?>