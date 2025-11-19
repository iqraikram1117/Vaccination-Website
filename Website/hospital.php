<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="hospitals, vaccination centers, healthcare" />
  <meta name="description" content="Find the best vaccination centers and hospitals near you" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title>Find Hospitals - Vaccination System</title>

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
    .page-hero {
      background: linear-gradient(135deg, #4763e0 0%, #3498db 100%);
      color: white;
      padding: 80px 0 60px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .page-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('images/pattern.png');
      opacity: 0.1;
    }
    .page-hero .container {
      position: relative;
      z-index: 2;
    }
    .hospital-grid {
      padding: 60px 0;
    }
    .hospital-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      margin-bottom: 30px;
      transition: all 0.3s ease;
      overflow: hidden;
      height: 100%;
    }
    .hospital-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    .hospital-image {
      height: 200px;
      overflow: hidden;
      position: relative;
    }
    .hospital-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    .hospital-card:hover .hospital-image img {
      transform: scale(1.1);
    }
    .hospital-badge {
      position: absolute;
      top: 15px;
      right: 15px;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: bold;
      z-index: 2;
    }
    .badge-open {
      background: #27ae60;
      color: white;
    }
    .badge-busy {
      background: #f39c12;
      color: white;
    }
    .badge-closed {
      background: #e74c3c;
      color: white;
    }
    .hospital-info {
      padding: 25px;
    }
    .hospital-name {
      color: #2c3e50;
      margin-bottom: 10px;
      font-weight: 700;
    }
    .hospital-location {
      color: #7f8c8d;
      margin-bottom: 15px;
    }
    .hospital-location i {
      color: #4763e0;
      margin-right: 8px;
    }
    .hospital-features {
      margin: 15px 0;
    }
    .feature-tag {
      display: inline-block;
      background: #ecf0f1;
      color: #2c3e50;
      padding: 4px 10px;
      border-radius: 15px;
      font-size: 0.8rem;
      margin-right: 5px;
      margin-bottom: 8px;
    }
    .feature-tag.vaccine {
      background: #d4edda;
      color: #155724;
    }
    .feature-tag.covid {
      background: #ffeaa7;
      color: #856404;
    }
    .feature-tag.pediatric {
      background: #d6eaf8;
      color: #1a5276;
    }
    .feature-tag.travel {
      background: #e8daef;
      color: #6c3483;
    }
    .hospital-stats {
      display: flex;
      justify-content: space-between;
      margin: 15px 0;
      padding: 15px 0;
      border-top: 1px solid #ecf0f1;
      border-bottom: 1px solid #ecf0f1;
    }
    .stat {
      text-align: center;
    }
    .stat-number {
      font-size: 1.5rem;
      font-weight: bold;
      color: #4763e0;
    }
    .stat-label {
      font-size: 0.8rem;
      color: #7f8c8d;
    }
    .hospital-actions {
      display: flex;
      gap: 10px;
    }
    .btn-book {
      flex: 2;
      background: #4763e0;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 8px;
      transition: background 0.3s ease;
    }
    .btn-book:hover {
      background: #155a9c;
      color: white;
    }
    .btn-direction {
      flex: 1;
      background: #ecf0f1;
      color: #2c3e50;
      border: none;
      padding: 10px;
      border-radius: 8px;
      transition: background 0.3s ease;
    }
    .btn-direction:hover {
      background: #bdc3c7;
    }
    .search-section {
      background: #f8f9fa;
      padding: 40px 0;
    }
    .search-box {
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .filter-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin: 20px 0;
    }
    .filter-tag {
      padding: 8px 15px;
      background: #ecf0f1;
      border-radius: 20px;
      cursor: pointer;
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }
    .filter-tag.active {
      background: #4763e0;
      color: white;
    }
    .filter-tag:hover:not(.active) {
      border-color: #4763e0;
    }
    .map-view {
      height: 400px;
      background: #ecf0f1;
      border-radius: 15px;
      margin-bottom: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #7f8c8d;
      background-image: url('images/map-placeholder.jpg');
      background-size: cover;
      background-position: center;
      position: relative;
    }
    .map-view::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0,0,0,0.1);
      border-radius: 15px;
    }
    .map-view .content {
      position: relative;
      z-index: 2;
      background: rgba(255,255,255,0.9);
      padding: 30px;
      border-radius: 10px;
    }
    .hospital-highlights {
      background: linear-gradient(135deg, #4763e0 0%, #764ba2 100%);
      color: white;
      padding: 60px 0;
      margin: 60px 0;
    }
    .highlight-card {
      text-align: center;
      padding: 30px 20px;
    }
    .highlight-card i {
      font-size: 3rem;
      margin-bottom: 20px;
      opacity: 0.9;
    }
    .highlight-card h4 {
      margin-bottom: 15px;
      font-weight: 600;
    }
    .no-results {
      text-align: center;
      padding: 60px 20px;
      display: none;
    }
    .no-results i {
      font-size: 4rem;
      color: #bdc3c7;
      margin-bottom: 20px;
    }
    .results-count {
      color: #7f8c8d;
      margin-bottom: 20px;
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

  <!-- Page Hero -->
  <section class="page-hero">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <h1>Find Vaccination Centers</h1>
          <p class="lead">Discover the best hospitals and clinics for your vaccination needs</p>
          <div class="mt-4">
            <span class="feature-tag vaccine">COVID-19 Vaccines</span>
            <span class="feature-tag pediatric">Pediatric Vaccination</span>
            <span class="feature-tag travel">Travel Vaccines</span>
            <span class="feature-tag">24/7 Service</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Search Section -->
  <section class="search-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="search-box">
            <h4 class="text-center mb-4">Find Your Perfect Vaccination Center</h4>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search by hospital name, location, or service..." id="searchInput">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="searchBtn">
                  <i class="fa fa-search"></i> Search
                </button>
              </div>
            </div>
            <div class="filter-tags">
              <div class="filter-tag active" data-filter="all">All Centers</div>
              <div class="filter-tag" data-filter="covid">COVID-19</div>
              <div class="filter-tag" data-filter="24hr">24/7 Open</div>
              <div class="filter-tag" data-filter="pediatric">Kids Friendly</div>
              <div class="filter-tag" data-filter="travel">Travel Vaccines</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Hospital Grid -->
  <section class="hospital-grid">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="section-title" style="margin-bottom: 0;">Available Vaccination Centers</h3>
            <div class="sort-options">
              <select class="form-control" id="sortSelect">
                <option value="distance">Sort by Distance</option>
                <option value="rating">Sort by Rating</option>
                <option value="availability">Sort by Availability</option>
              </select>
            </div>
          </div>
          <div class="results-count" id="resultsCount"></div>
        </div>
      </div>

      <div class="row" id="hospitalGrid">
        <?php 
          include("../Admin/connection.php");
          
          $query = "SELECT tbl_hospital.*, tbl_city.name as 'cname' 
                    FROM tbl_hospital 
                    INNER JOIN tbl_city ON tbl_hospital.cid=tbl_city.id 
                    WHERE tbl_hospital.status='activate'";
          
          $result = mysqli_query($connection, $query);
          $hospital_count = 0;
          
          if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $hospital_count++;
              // Generate random features and status for demo
              $features = ['covid', '24hr', 'pediatric', 'travel'];
              $hospital_features = [];
              $num_features = rand(2,4);
              
              for($i = 0; $i < $num_features; $i++) {
                $random_feature = $features[array_rand($features)];
                if(!in_array($random_feature, $hospital_features)) {
                  $hospital_features[] = $random_feature;
                }
              }
              
              $statuses = ['open', 'busy', 'closed'];
              $status = $statuses[rand(0,2)];
              $status_badge = '';
              
              switch($status) {
                case 'open':
                  $status_badge = '<span class="hospital-badge badge-open"><i class="fa fa-check"></i> Available</span>';
                  break;
                case 'busy':
                  $status_badge = '<span class="hospital-badge badge-busy"><i class="fa fa-clock-o"></i> Busy</span>';
                  break;
                case 'closed':
                  $status_badge = '<span class="hospital-badge badge-closed"><i class="fa fa-times"></i> Closed</span>';
                  break;
              }
              
              echo '<div class="col-lg-4 col-md-6 hospital-item" 
                    data-features="'.implode(' ', $hospital_features).'">
                <div class="hospital-card">
                  <div class="hospital-image position-relative">
                    <img src="../Admin/'.$row['image'].'" alt="'.$row['name'].'">
                    '.$status_badge.'
                  </div>
                  <div class="hospital-info">
                    <h4 class="hospital-name">'.$row['name'].'</h4>
                    <div class="hospital-location">
                      <i class="fa fa-map-marker"></i> '.$row['address'].', '.$row['cname'].'
                    </div>
                    
                    <div class="hospital-features">
                      <span class="feature-tag vaccine">COVID-19 Vaccine</span>
                      <span class="feature-tag">Flu Shot</span>';
                      
              if(in_array('24hr', $hospital_features)) {
                echo '<span class="feature-tag">24/7 Service</span>';
              }
              if(in_array('pediatric', $hospital_features)) {
                echo '<span class="feature-tag pediatric">Kids Vaccination</span>';
              }
              if(in_array('travel', $hospital_features)) {
                echo '<span class="feature-tag travel">Travel Vaccines</span>';
              }
                      
              echo '</div>
                    
                    <div class="hospital-stats">
                      <div class="stat">
                        <div class="stat-number">'.rand(4,5).'.'.rand(0,9).'</div>
                        <div class="stat-label">Rating</div>
                      </div>
                      <div class="stat">
                        <div class="stat-number">'.rand(50,500).'</div>
                        <div class="stat-label">Vaccinated</div>
                      </div>
                      <div class="stat">
                        <div class="stat-number">'.rand(5,30).'min</div>
                        <div class="stat-label">Wait Time</div>
                      </div>
                    </div>
                    
                    <div class="hospital-actions">
                      <button class="btn-book" data-hospital="'.$row['name'].'" data-id="'.$row['id'].'">
                        <i class="fa fa-calendar"></i> Book Slot
                      </button>
                      <button class="btn-direction">
                        <i class="fa fa-map"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>';
            }
          } else {
            echo '<div class="col-12">
                    <div class="no-results" id="noResults" style="display: block;">
                      <i class="fa fa-hospital-o"></i>
                      <h3>No Hospitals Found</h3>
                      <p>We couldn\'t find any vaccination centers matching your criteria.</p>
                      <button class="btn btn-primary" id="resetFilters">Reset Filters</button>
                    </div>
                  </div>';
          }
        ?>
      </div>
      
   

 
  

 



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
      // Initialize results count
      updateResultsCount();
      
      // Filter functionality
      $('.filter-tag').click(function() {
        $('.filter-tag').removeClass('active');
        $(this).addClass('active');
        
        const filter = $(this).data('filter');
        filterHospitals(filter);
      });
      
      // Search functionality
      $('#searchBtn').click(function() {
        performSearch();
      });
      
      $('#searchInput').keypress(function(e) {
        if(e.which === 13) {
          performSearch();
        }
      });
      
      // Reset filters
      $('#resetFilters').click(function() {
        $('.filter-tag').removeClass('active');
        $('.filter-tag[data-filter="all"]').addClass('active');
        $('#searchInput').val('');
        $('.hospital-item').show();
        updateResultsCount();
        $('#noResults').hide();
      });
      
      // Book button click
      $('.btn-book').click(function() {
        const hospitalName = $(this).data('hospital');
        const hospitalId = $(this).data('id');
        
        if(<?php echo isset($_SESSION['patient_session']) ? 'true' : 'false'; ?>) {
          // Redirect to booking page or show modal
          window.location.href = 'appointment.php?hospital=' + hospitalId;
        } else {
          alert('Please login to book an appointment');
          window.location.href = 'login.php';
        }
      });
      
      function filterHospitals(filter) {
        let visibleCount = 0;
        
        if(filter === 'all') {
          $('.hospital-item').show();
          visibleCount = $('.hospital-item').length;
        } else {
          $('.hospital-item').each(function() {
            const features = $(this).data('features');
            if(features.includes(filter)) {
              $(this).show();
              visibleCount++;
            } else {
              $(this).hide();
            }
          });
        }
        
        updateResultsCount(visibleCount);
        
        // Show/hide no results message
        if(visibleCount === 0) {
          $('#noResults').show();
        } else {
          $('#noResults').hide();
        }
      }
      
      function performSearch() {
        const searchTerm = $('#searchInput').val().toLowerCase();
        let visibleCount = 0;
        
        if(searchTerm === '') {
          $('.hospital-item').show();
          visibleCount = $('.hospital-item').length;
        } else {
          $('.hospital-item').each(function() {
            const hospitalName = $(this).find('.hospital-name').text().toLowerCase();
            const hospitalLocation = $(this).find('.hospital-location').text().toLowerCase();
            
            if(hospitalName.includes(searchTerm) || hospitalLocation.includes(searchTerm)) {
              $(this).show();
              visibleCount++;
            } else {
              $(this).hide();
            }
          });
        }
        
        updateResultsCount(visibleCount);
        
        // Show/hide no results message
        if(visibleCount === 0) {
          $('#noResults').show();
        } else {
          $('#noResults').hide();
        }
      }
      
      function updateResultsCount(count) {
        const totalCount = $('.hospital-item').length;
        const visibleCount = count !== undefined ? count : totalCount;
        
        if(visibleCount === totalCount) {
          $('#resultsCount').text(`Showing all ${totalCount} vaccination centers`);
        } else {
          $('#resultsCount').text(`Showing ${visibleCount} of ${totalCount} vaccination centers`);
        }
      }
      
      // Sort functionality
      $('#sortSelect').change(function() {
        const sortBy = $(this).val();
        // In real implementation, this would reorder the hospitals
        console.log('Sorting by:', sortBy);
      });
    });
  </script>

</body>
</html>