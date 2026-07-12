<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Header Section -->
    <header>
        <div class="container">
            <h1><?php echo "Welcome to My Project"; ?></h1>
            <p>Your one-stop solution for all your needs</p>
            <a href="#about" class="cta-button">Discover More</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <h2>About Us</h2>
            <p>We offer creative solutions that combine design and technology to give your business an edge. Our goal is to help you succeed and grow with confidence.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="services-grid">
                <div class="service-item">
                    <h3>Design</h3>
                    <p>Crafting stunning visuals for your brand's identity.</p>
                </div>
                <div class="service-item">
                    <h3>Development</h3>
                    <p>Creating functional, responsive websites and apps.</p>
                </div>
                <div class="service-item">
                    <h3>Consulting</h3>
                    <p>Providing insights and advice for growth and success.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Project. All rights reserved.</p>
    </footer>

</body>

</html>