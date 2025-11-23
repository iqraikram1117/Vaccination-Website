<?php
include("connection.php");
session_start();
if(!isset($_SESSION['admin_session']))
{
    echo "<script>window.location.href='login.php'</script>";
}

$message = "";
$message_type = "";

if(isset($_POST['btnadd']))
{
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $status = mysqli_real_escape_string($connection, $_POST['status']);
    
    // Image upload handling
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $imageType = $_FILES['image']['type'];
        
        // Create directory if it doesn't exist
        $uploadDir = "assets/imgs/hospital-images/";
        if(!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Generate unique filename to avoid conflicts
        $fileExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        $newImageName = uniqid() . '_' . time() . '.' . $fileExtension;
        $path = $uploadDir . $newImageName;
        
        // Allowed file types
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
        
        if(in_array($imageType, $allowedTypes)) {
            if(move_uploaded_file($tmpName, $path)) {
                $query = "INSERT INTO tbl_hospital(name,contact,cid,email,password,address,status,image) 
                         VALUES('$name','$phone','$city','$email','$password','$address','$status','$path')";
                $result = mysqli_query($connection,$query);
                
                if($result) {
                    $message = "New Hospital Added Successfully!";
                    $message_type = "success";
                    echo "<script>setTimeout(function(){ window.location.href='hospital.php'; }, 2000);</script>";
                } else {
                    $message = "Error: " . mysqli_error($connection);
                    $message_type = "error";
                }
            } else {
                $message = "Failed to upload image!";
                $message_type = "error";
            }
        } else {
            $message = "Invalid image format! Please upload JPEG, JPG, PNG, GIF or WEBP files.";
            $message_type = "error";
        }
    } else {
        $message = "Please select an image file!";
        $message_type = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hospital - Vaccination System</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<style>
    .mainContent {
        padding: 30px 80px;
    }
    .mainContent form input,
    .mainContent form select {
        width: 100%;
        border: none;
        outline: none;
        padding: 15px 20px;
        border-radius: 6px;
        background-color: #eee;
        margin: 12px 0px;
        font-size: 16px;
        box-sizing: border-box;
    }
    .mainContent form input[type="submit"] {
        background-color: #4763e0;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .mainContent form input[type="submit"]:hover {
        background-color: #4763e0;
    }
    .mainContent form input[type="file"] {
        padding: 12px 20px;
    }
    .message {
        padding: 15px;
        margin: 20px 0;
        border-radius: 8px;
        text-align: center;
        font-weight: 500;
    }
    .message.success {
        background-color: #d4edda;
        color: #4763e0;
        border: 1px solid #c3e6cb;
    }
    .message.error {
        background-color: #f8d7da;
        color: #4763e0;
        border: 1px solid #f5c6cb;
    }
    .image-preview {
        margin: 15px 0;
        text-align: center;
    }
    .image-preview img {
        max-width: 200px;
        max-height: 150px;
        border-radius: 8px;
        border: 2px solid #ddd;
        display: none;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }
    .navigation {
  position: fixed;
  width: 300px;
  height: 100%;
  background-color: #4763e0; 
  border-left: 10px solid white;
  transition: 0.5s;
  overflow: hidden;
}
.navigation.active {
  width: 80px;
}
.navigation ul {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
}

.navigation ul li {
  position: relative;
  width: 100%;
  list-style: none;
  border-top-left-radius: 30px;
  border-bottom-left-radius: 30px;
}

.navigation ul li:hover,
.navigation ul li.hovered {
  background-color: var(--white);
}

.navigation ul li:nth-child(1) {
  margin-bottom: 40px;
  pointer-events: none;
}

.navigation ul li a {
  position: relative;
  display: block;
  width: 100%;
  display: flex;
  text-decoration: none;
  color: var(--white);
}
.navigation ul li:hover a,
.navigation ul li.hovered a {
  color: #4763e0;
}

.navigation ul li a .icon {
  position: relative;
  display: block;
  min-width: 60px;
  height: 60px;
  line-height: 75px;
  text-align: center;
}
.navigation ul li a .icon ion-icon {
  font-size: 1.75rem;
}

.navigation ul li a .title {
  position: relative;
  display: block;
  padding: 0 10px;
  height: 60px;
  line-height: 60px;
  text-align: start;
  white-space: nowrap;
}

/* --------- curve outside ---------- */
.navigation ul li:hover a::before,
.navigation ul li.hovered a::before {
  content: "";
  position: absolute;
  right: 0;
  top: -50px;
  width: 50px;
  height: 50px;
  background-color: transparent;
  border-radius: 50%;
  box-shadow: 35px 35px 0 10px var(--white);
  pointer-events: none;
}
.navigation ul li:hover a::after,
.navigation ul li.hovered a::after {
  content: "";
  position: absolute;
  right: 0;
  bottom: -50px;
  width: 50px;
  height: 50px;
  background-color: transparent;
  border-radius: 50%;
  box-shadow: 35px -35px 0 10px var(--white);
  pointer-events: none;
}



/* cards */

/* ======================= Cards ====================== */
.cardBox {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 30px;
}

.cardBox .card {
  position: relative;
  background: var(--white);
  padding: 30px;
  border-radius: 20px;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
}

.cardBox .card .numbers {
  position: relative;
  font-weight: 500;
  font-size: 2.5rem;
  color:  #4763e0;
}

.cardBox .card .cardName {
  color: var(--black2);
  font-size: 1.1rem;
  margin-top: 5px;
}

.cardBox .card .iconBx {
  font-size: 3.5rem;
  color: var(--black2);
}

.cardBox .card:hover {
  background:  #4763e0;
}
.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName,
.cardBox .card:hover .iconBx {
  color: var(--white);
}


</style>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <?php include("navigation.php"); ?>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="user">
                    <a href='profile.php'><img src="assets/imgs/customer01.jpg" alt=""></a>
                </div>
            </div>
            
            <!-- ======================= Cards ================== -->
            <div class="mainContent">
                <h2>Register a New Hospital</h2>
                
                <?php if(!empty($message)): ?>
                    <div class="message <?php echo $message_type; ?>">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <label>Hospital Name</label>
                        <input type="text" placeholder="Enter Hospital Name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="number" placeholder="Enter Hospital Number" name="phone" required>
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <select name="city" required>
                            <option value="">Select Any City</option>
                            <?php 
                                $query = "SELECT * FROM tbl_city";
                                $result = mysqli_query($connection,$query);
                                foreach($result as $row)
                                {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="Enter Hospital Email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Hospital Password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" placeholder="Enter Hospital Address" name="address" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" required>
                            <option value="">Select Any Status</option>
                            <option value="activate">Activate</option>
                            <option value="deactivate">Deactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Hospital Image</label>
                        <input type="file" name="image" accept="image/*" required onchange="previewImage(this)">
                        <div class="image-preview">
                            <img id="imagePreview" src="#" alt="Image Preview">
                        </div>
                    </div>

                    <input type="submit" value="Add New Hospital" name="btnadd">
                </form>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const file = input.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        }

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const fileInput = document.querySelector('input[type="file"]');
            const citySelect = document.querySelector('select[name="city"]');
            const statusSelect = document.querySelector('select[name="status"]');
            
            if (fileInput.files.length === 0) {
                alert('Please select an image file!');
                e.preventDefault();
                return;
            }
            
            if (citySelect.value === '') {
                alert('Please select a city!');
                e.preventDefault();
                return;
            }
            
            if (statusSelect.value === '') {
                alert('Please select a status!');
                e.preventDefault();
                return;
            }
        });
    </script>
</body>
</html>