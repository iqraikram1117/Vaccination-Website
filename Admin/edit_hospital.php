<?php
    include("connection.php");
    session_start();
    if(!isset($_SESSION['admin_session']))
    {
        echo "<script>window.location.href='login.php'</script>";
    }

    $query = "SELECT * FROM tbl_hospital WHERE id=$_GET[id]";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination System</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<style>
    .mainContent
    {
        padding: 30px;
        display: flex;
        justify-content: space-around;
    }
    .mainContent .leftSide
    {
        width: 45%;
    }
    .mainContent form input,
    .mainContent form select
    {
        width: 100%;
        border: none;
        outline: none;
        padding: 15px 20px;
        border-radius: 6px;
        background-color: #eee;
        margin: 12px 0px;
        font-size: 16px;
    }
    .mainContent form input[type="submit"]
    {
        background-color: #4763e0;
        color: #fff;
    }
    .mainContent .rightSide
    {
        width: 45%;
    }
    .mainContent .rightSide .image
    {
        width: 100%;
        height: 300px;
        border: 1px solid #4763e0;
        margin-top: 40px;
    }
    .mainContent .rightSide .image img
    {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    /* =============== Navigation ================ */
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
    
</style>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <?php
            include("navigation.php");
        ?>

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
                <div class="leftSide">
                <h2>Edit / Update Hospital</h2>
                <form method="post" enctype="multipart/form-data" autocomplete="off">
                    <input type="text" placeholder="Enter Hospital Name" name="name" value="<?php echo $row['name'];?>"><br>
                    <input type="number" placeholder="Enter Hospital Number" name="phone" value="<?php echo $row['contact'];?>"><br>
                    <select name="city">
                        <option hidden>Select Any City</option>
                        <?php 
                            $query = "SELECT * FROM tbl_city";
                            $result = mysqli_query($connection,$query);
                            foreach ($result as $row1) {
                                echo "<option value='".$row1['id']."'";
                                if ($row['cid'] == $row1['id']) {
                                    echo " selected";
                                }
                                echo ">".$row1['name']."</option>";
                            }
                        ?>
                    </select><br>
                    <input type="email" placeholder="Enter Hospital Email" name="email" value="<?php echo $row['email'];?>"><br>
                    <input type="password" placeholder="Enter Hospital Password" name="password" value="<?php echo $row['password'];?>"><br>
                    <input type="text" placeholder="Enter Hospital Address" name="address" value="<?php echo $row['address'];?>"><br>
                    <input type="submit" value="Update Hospital" name="btnadd">
                </form>
                <?php
                    if(isset($_POST['btnadd']))
                    {
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $city = $_POST['city'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $address = $_POST['address'];
                        $query = "UPDATE tbl_hospital SET name='$name',contact='$phone',cid='$city',email='$email',password='$password',address='$address' WHERE id=$_GET[id]";
                        $result = mysqli_query($connection,$query);
                        if($result)
                        {
                            echo 
                            "<script>
                                alert('Hospital Updated Successfully');
                                window.location.href='hospital.php'
                            </script>";
                        }
                    }
                ?>
                </div>
                <div class="rightSide">
                    <div class="image">
                        <img src="<?php echo $row['image'];?>">
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="image">
                        <input type="submit" value="Uplaod Image" name="btnupload">
                    </form>
                    <?php
                        if(isset($_POST['btnupload']))
                        {
                            $imageName = $_FILES['image']['name'];
                            $tmpName = $_FILES['image']['tmp_name'];
                            $path = "assets/imgs/hospital-images/$imageName";
                            move_uploaded_file($tmpName,$path);
                            $query = "UPDATE tbl_hospital SET image='$path' WHERE id=$_GET[id]";
                            $result = mysqli_query($connection,$query);
                            if($result)
                            {
                                echo 
                                "<script>
                                    alert('Image Updated Successfully');
                                    window.location.href='hospital.php'
                                </script>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>