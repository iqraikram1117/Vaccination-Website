<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title>Contact Us - Vaccination System</title>

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
    .contact-info {
      background-color: #f8f9fa;
      padding: 60px 0;
    }
    .info-box {
      text-align: center;
      padding: 20px;
      margin-bottom: 30px;
    }
    .info-box i {
      font-size: 2rem;
      color: #1a76d1;
      margin-bottom: 15px;
    }
    .form-control.error {
      border-color: #dc3545;
    }
    .error-message {
      color: #dc3545;
      font-size: 0.875rem;
      margin-top: 5px;
      display: none;
    }
    .success-message {
      color: #28a745;
      padding: 10px;
      margin: 10px 0;
      display: none;
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


  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Contact Us
        </h2>
        <p>
          Have questions about our vaccination services? We're here to help. Reach out to us using the form below or through our contact information.
        </p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container contact-form">
            <div class="success-message" id="successMessage">
              Thank you for your message! We'll get back to you soon.
            </div>
            <form method="post" id="contactForm" novalidate>
              <div class="form-row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" />
                    <div class="error-message" id="nameError">Please enter your name</div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" />
                    <div class="error-message" id="phoneError">Please enter a valid phone number</div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                <div class="error-message" id="emailError">Please enter a valid email address</div>
              </div>
              <div class="form-group">
                <select class="form-control" id="subject" name="subject">
                  <option value="">Select Subject</option>
                  <option value="vaccine-info">Vaccine Information</option>
                  <option value="appointment">Appointment Booking</option>
                  <option value="covid-test">COVID-19 Testing</option>
                  <option value="general">General Inquiry</option>
                  <option value="feedback">Feedback</option>
                  <option value="complaint">Complaint</option>
                </select>
                <div class="error-message" id="subjectError">Please select a subject</div>
              </div>
              <div class="form-group">
                <textarea class="form-control message-box" id="message" name="message" placeholder="Message" rows="5"></textarea>
                <div class="error-message" id="messageError">Please enter your message</div>
              </div>
              <div class="btn_box">
                <button type="submit" name="btnsend" id="submitBtn">Send Message</button>
              </div>
            </form>
            <?php
              if(isset($_POST['btnsend']))
              {
                // Server-side validation
                $errors = [];
                
                if(empty($_POST['name'])) {
                  $errors[] = "Name is required";
                }
                
                if(empty($_POST['phone'])) {
                  $errors[] = "Phone is required";
                } elseif (!preg_match('/^[0-9+\-\s()]{10,}$/', $_POST['phone'])) {
                  $errors[] = "Please enter a valid phone number";
                }
                
                if(empty($_POST['email'])) {
                  $errors[] = "Email is required";
                } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                  $errors[] = "Please enter a valid email address";
                }
                
                if(empty($_POST['subject'])) {
                  $errors[] = "Subject is required";
                }
                
                if(empty($_POST['message'])) {
                  $errors[] = "Message is required";
                }
                
                if(empty($errors)) {
                  // Process the form (save to database, send email, etc.)
                  $name = mysqli_real_escape_string($connection, $_POST['name']);
                  $phone = mysqli_real_escape_string($connection, $_POST['phone']);
                  $email = mysqli_real_escape_string($connection, $_POST['email']);
                  $subject = mysqli_real_escape_string($connection, $_POST['subject']);
                  $message = mysqli_real_escape_string($connection, $_POST['message']);
                  
                  // If user is logged in, use their ID, otherwise store as guest
                  $pid = isset($_SESSION['patient_session']) ? $active_patient['id'] : 'NULL';
                  
                  $result = mysqli_query($connection, 
                    "INSERT INTO tbl_contact (p_id, name, phone, email, subject, message) 
                     VALUES ($pid, '$name', '$phone', '$email', '$subject', '$message')");
                  
                  if($result) {
                    echo "<script>document.getElementById('successMessage').style.display = 'block';</script>";
                    echo "<script>document.getElementById('contactForm').reset();</script>";
                  } else {
                    echo "<script>alert('There was an error sending your message. Please try again.')</script>";
                  }
                } else {
                  // Display errors
                  echo "<script>alert('" . implode('\\n', $errors) . "')</script>";
                }
              }
            ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  
              
 

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
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  
  <!-- Contact Form Validation -->
  <script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Reset previous errors
      resetErrors();
      
      // Validate form
      let isValid = true;
      
      // Name validation
      const name = document.getElementById('name');
      if (name.value.trim() === '') {
        showError(name, 'nameError', 'Please enter your name');
        isValid = false;
      }
      
      // Phone validation
      const phone = document.getElementById('phone');
      const phoneRegex = /^[0-9+\-\s()]{10,}$/;
      if (phone.value.trim() === '') {
        showError(phone, 'phoneError', 'Please enter your phone number');
        isValid = false;
      } else if (!phoneRegex.test(phone.value)) {
        showError(phone, 'phoneError', 'Please enter a valid phone number');
        isValid = false;
      }
      
      // Email validation
      const email = document.getElementById('email');
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email.value.trim() === '') {
        showError(email, 'emailError', 'Please enter your email address');
        isValid = false;
      } else if (!emailRegex.test(email.value)) {
        showError(email, 'emailError', 'Please enter a valid email address');
        isValid = false;
      }
      
      // Subject validation
      const subject = document.getElementById('subject');
      if (subject.value === '') {
        showError(subject, 'subjectError', 'Please select a subject');
        isValid = false;
      }
      
      // Message validation
      const message = document.getElementById('message');
      if (message.value.trim() === '') {
        showError(message, 'messageError', 'Please enter your message');
        isValid = false;
      }
      
      // If valid, submit the form
      if (isValid) {
        this.submit();
      }
    });
    
    function showError(input, errorId, message) {
      input.classList.add('error');
      const errorElement = document.getElementById(errorId);
      errorElement.textContent = message;
      errorElement.style.display = 'block';
    }
    
    function resetErrors() {
      const errorElements = document.querySelectorAll('.error-message');
      errorElements.forEach(element => {
        element.style.display = 'none';
      });
      
      const inputElements = document.querySelectorAll('.form-control');
      inputElements.forEach(element => {
        element.classList.remove('error');
      });
    }
    
    // Real-time validation
    document.getElementById('name').addEventListener('blur', function() {
      if (this.value.trim() === '') {
        showError(this, 'nameError', 'Please enter your name');
      } else {
        this.classList.remove('error');
        document.getElementById('nameError').style.display = 'none';
      }
    });
    
    document.getElementById('phone').addEventListener('blur', function() {
      const phoneRegex = /^[0-9+\-\s()]{10,}$/;
      if (this.value.trim() === '') {
        showError(this, 'phoneError', 'Please enter your phone number');
      } else if (!phoneRegex.test(this.value)) {
        showError(this, 'phoneError', 'Please enter a valid phone number');
      } else {
        this.classList.remove('error');
        document.getElementById('phoneError').style.display = 'none';
      }
    });
    
    document.getElementById('email').addEventListener('blur', function() {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (this.value.trim() === '') {
        showError(this, 'emailError', 'Please enter your email address');
      } else if (!emailRegex.test(this.value)) {
        showError(this, 'emailError', 'Please enter a valid email address');
      } else {
        this.classList.remove('error');
        document.getElementById('emailError').style.display = 'none';
      }
    });
  </script>

</body>
</html>