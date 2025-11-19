<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="about vaccination system, healthcare mission, our story" />
  <meta name="description" content="Learn about our mission to provide accessible vaccination services and quality healthcare" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title>About Us - Vaccination System</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  
  <style>
    .about-hero {
      background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
      color: white;
      padding: 100px 0 80px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .about-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('images/pattern.png');
      opacity: 0.1;
    }
    .about-hero .container {
      position: relative;
      z-index: 2;
    }
    .mission-vision {
      padding: 80px 0;
      background: #f8f9fa;
    }
    .mission-card {
      background: white;
      padding: 40px 30px;
      border-radius: 15px;
      text-align: center;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      height: 100%;
      transition: transform 0.3s ease;
      border-top: 4px solid #4763e0;
    }
    .mission-card:hover {
      transform: translateY(-10px);
    }
    .mission-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #4763e0, #4763e0);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 25px;
    }
    .mission-icon i {
      font-size: 2rem;
      color: white;
    }
    .journey-section {
      padding: 80px 0;
      background: white;
    }
    .timeline {
      position: relative;
      max-width: 1200px;
      margin: 0 auto;
    }
    .timeline::after {
      content: '';
      position: absolute;
      width: 6px;
      background: #4763e0;
      top: 0;
      bottom: 0;
      left: 50%;
      margin-left: -3px;
    }
    .timeline-item {
      padding: 10px 40px;
      position: relative;
      width: 50%;
      box-sizing: border-box;
    }
    .timeline-item::after {
      content: '';
      position: absolute;
      width: 20px;
      height: 20px;
      background: white;
      border: 4px solid #4763e0;
      border-radius: 50%;
      top: 15px;
      z-index: 1;
    }
    .left {
      left: 0;
    }
    .right {
      left: 50%;
    }
    .left::after {
      right: -10px;
    }
    .right::after {
      left: -10px;
    }
    .timeline-content {
      padding: 20px 30px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      border-left: 4px solid #4763e0;
    }
    .values-section {
      padding: 80px 0;
      background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
      color: white;
    }
    .value-card {
      text-align: center;
      padding: 30px 20px;
    }
    .value-icon {
      font-size: 3rem;
      margin-bottom: 20px;
      color: #4763e0;
    }
    .team-section {
      padding: 80px 0;
      background: #f8f9fa;
    }
    .team-card {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      margin-bottom: 30px;
      transition: transform 0.3s ease;
      border-top: 4px solid #4763e0;
    }
    .team-card:hover {
      transform: translateY(-10px);
    }
    .team-image {
      height: 250px;
      overflow: hidden;
    }
    .team-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    .team-card:hover .team-image img {
      transform: scale(1.1);
    }
    .team-info {
      padding: 25px;
      text-align: center;
    }
    .team-social {
      margin-top: 15px;
    }
    .team-social a {
      display: inline-block;
      width: 35px;
      height: 35px;
      background: #f8f9fa;
      border-radius: 50%;
      text-align: center;
      line-height: 35px;
      margin: 0 5px;
      transition: all 0.3s ease;
      color: #2c3e50;
    }
    .team-social a:hover {
      background: #4763e0;
      color: white;
    }
    .stats-section {
      padding: 60px 0;
      background: white;
    }
    .stat-card {
      text-align: center;
      padding: 30px 20px;
    }
    .stat-number {
      font-size: 3rem;
      font-weight: bold;
      color: #4763e0;
      margin-bottom: 10px;
    }
    .stat-label {
      font-size: 1.1rem;
      color: #7f8c8d;
    }
    .impact-section {
      padding: 80px 0;
      background: linear-gradient(135deg, #4763e0);
      color: white;
    }
    .impact-card {
      text-align: center;
      padding: 40px 20px;
    }
    .impact-icon {
      font-size: 3rem;
      margin-bottom: 20px;
      opacity: 0.9;
    }
    .story-section {
      padding: 80px 0;
      background: #f8f9fa;
    }
    .story-image {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    .story-image img {
      width: 100%;
      height: auto;
    }
    .btn-primary-custom {
      background: #4763e0;
      border-color: #4763e0;
      color: white;
    }
    .btn-primary-custom:hover {
      background: #4763e0;
      border-color: #4763e0;
    }
    .section-title {
      color: #2c3e50;
      margin-bottom: 40px;
      text-align: center;
    }
    .section-title::after {
      content: '';
      display: block;
      width: 80px;
      height: 3px;
      background: #4763e0;
      margin: 15px auto;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .timeline::after {
        left: 31px;
      }
      .timeline-item {
        width: 100%;
        padding-left: 70px;
        padding-right: 25px;
      }
      .timeline-item::after {
        left: 21px;
      }
      .left::after, .right::after {
        left: 21px;
      }
      .right {
        left: 0%;
      }
    }
  </style>
</head>

<body>

 <div class="hero_area">

    <div class="hero_bg_box">
      <img src="images/hero.png" alt="">
    </div>

    <!-- header section strats -->
    <?php
      include("header.php");
    ?>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      We Provide Best Healthcare
                    </h1>
                    <p>
                      Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                    </p>
                    <div class="btn-box">
                      <a href="appointment.php" class="btn1">
                        Appointment
                      </a>
                      <a href="covid-test.php" class="btn1">
                        Covid Test
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

 

  <!-- Mission & Vision -->
  <section class="mission-vision">
    <div class="container">
      <h2 class="section-title">Our Purpose</h2>
      <div class="row">
        <div class="col-md-6">
          <div class="mission-card">
            <div class="mission-icon">
              <i class="fa fa-bullseye"></i>
            </div>
            <h3>Our Mission</h3>
            <p>To provide safe, accessible, and affordable vaccination services to every individual, ensuring healthier communities through preventive healthcare and education.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="mission-card">
            <div class="mission-icon">
              <i class="fa fa-eye"></i>
            </div>
            <h3>Our Vision</h3>
            <p>A world where preventable diseases are eliminated through universal vaccination access and community health awareness.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Story -->
  <section class="story-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="story-image">
            <img src="images/yes.png" alt="Our Story">
          </div>
        </div>
        <div class="col-md-6">
          <h2 class="section-title">Our Story</h2>
          <p class="lead">Founded in 2010, Vaccination System began as a small initiative to address the growing need for organized vaccination services in urban communities.</p>
          <p>What started as a single clinic has now grown into a network of 50+ partner hospitals and clinics, serving thousands of patients monthly. Our journey has been guided by the belief that quality healthcare should be accessible to all.</p>
          <p>Through innovation and dedication, we've revolutionized how vaccination services are delivered, making them more efficient, transparent, and patient-friendly.</p>
          <a href="contact.php" class="btn btn-primary-custom btn-lg mt-3">
            <i class="fa fa-handshake-o"></i> Join Our Mission
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Statistics -->
  <section class="stats-section">
    <div class="container">
      <h2 class="section-title">Our Impact in Numbers</h2>
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="stat-card">
            <div class="stat-number" data-count="50000">0</div>
            <div class="stat-label">Vaccines Administered</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="stat-card">
            <div class="stat-number" data-count="50">0</div>
            <div class="stat-label">Partner Hospitals</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="stat-card">
            <div class="stat-number" data-count="25">0</div>
            <div class="stat-label">Cities Covered</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="stat-card">
            <div class="stat-number" data-count="98">0</div>
            <div class="stat-label">Satisfaction Rate</div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>

  <script>
    $(document).ready(function() {
      // Animate statistics counting
      $('.stat-number').each(function() {
        var $this = $(this);
        var target = parseInt($this.data('count'));
        $this.prop('Counter', 0).animate({
          Counter: target
        }, {
          duration: 2000,
          easing: 'swing',
          step: function(now) {
            if(target === 98) {
              $this.text(now.toFixed(1) + '%');
            } else {
              $this.text(Math.ceil(now).toLocaleString());
            }
          }
        });
      });
    });
  </script>

</body>
</html>