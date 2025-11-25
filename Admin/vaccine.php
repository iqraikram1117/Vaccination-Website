<?php
    // Start session first
    session_start();
    
    // Include connection
    include("connection.php");
    
    // Check connection
    if (!isset($connection) || $connection === null) {
        die("Database connection failed. Please check your connection.php file.");
    }
    
    if(!isset($_SESSION['admin_session']))
    {
        echo "<script>window.location.href='login.php'</script>";
    }

    // Check and add missing columns if needed
    $check_columns = mysqli_query($connection, "DESCRIBE tbl_vaccine");
    $columns = array();
    while($row = mysqli_fetch_assoc($check_columns)) {
        $columns[] = $row['Field'];
    }
    
    // Add created_at column if it doesn't exist
    if(!in_array('created_at', $columns)) {
        $alter_query = "ALTER TABLE tbl_vaccine ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
        mysqli_query($connection, $alter_query);
    }

    // Handle status toggle
    if(isset($_GET['toggle_id']) && is_numeric($_GET['toggle_id'])) {
        $toggle_id = $_GET['toggle_id'];
        
        // Get current status
        $current_query = "SELECT status FROM tbl_vaccine WHERE id = $toggle_id";
        $current_result = mysqli_query($connection, $current_query);
        
        if(mysqli_num_rows($current_result) > 0) {
            $current_data = mysqli_fetch_assoc($current_result);
            $new_status = ($current_data['status'] == 'available') ? 'unavailable' : 'available';
            
            $toggle_query = "UPDATE tbl_vaccine SET status = '$new_status' WHERE id = $toggle_id";
            if(mysqli_query($connection, $toggle_query)) {
                echo "<script>alert('Vaccine status updated successfully!'); window.location.href='vaccine.php';</script>";
            } else {
                echo "<script>alert('Error updating vaccine status: " . mysqli_error($connection) . "'); window.location.href='vaccine.php';</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination System - Vaccine Management</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<style>
    .mainContent
    {
        padding: 30px;
    }
    .mainContent .title
    {
        font-size: 35px;
    }
    .mainContent table
    {
        width: 100%;
    }
    .mainContent table,td,th 
    {
        margin-top: 20px;
        border: 1px solid #999;
        text-align: center;
        border-collapse: collapse;
        padding: 10px;
    }
    .mainContent table a
    {
        padding: 7px 10px;
        background-color: #4763e0;
        text-decoration: none;
        border-radius: 8px;
        color: #fff;
        display: inline-block;
        margin: 2px;
        font-size: 14px;
    }
    .mainContent .btndeactivate
    {
        background-color: red;
    }
    .mainContent .btnactivate
    {
        background-color: yellowgreen;
        color: #000;
    }
    .mainContent .btntoggle
    {
        background-color: #ffc107;
        color: #000;
    }
    .mainContent .btndelete
    {
        background-color: #dc3545;
    }
    .mainContent .btn
    {
        display: inline-block;
        margin-top: 15px;
        padding: 7px 10px;
        background-color: #4763e0;
        text-decoration: none;
        border-radius: 8px;
        color: #fff;
    }
    .status-available {
        color: green;
        font-weight: bold;
    }
    .status-unavailable {
        color: red;
        font-weight: bold;
    }
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 5px;
        flex-wrap: wrap;
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
                <h2 class="title">Vaccine Management</h2>

                <a href="add_new_vaccine.php" class="btn">Add New Vaccine</a>
            
                <!-- Summary Cards -->
                <div class="cardBox">
                    <?php
                        // Count total vaccines
                        $query_total = "SELECT COUNT(*) as total FROM tbl_vaccine";
                        $result_total = mysqli_query($connection, $query_total);
                        $total_vaccines = mysqli_fetch_assoc($result_total)['total'];
                        
                        // Count available vaccines
                        $query_available = "SELECT COUNT(*) as available FROM tbl_vaccine WHERE status = 'available'";
                        $result_available = mysqli_query($connection, $query_available);
                        $available_vaccines = mysqli_fetch_assoc($result_available)['available'];
                        
                        // Count unavailable vaccines
                        $query_unavailable = "SELECT COUNT(*) as unavailable FROM tbl_vaccine WHERE status = 'unavailable'";
                        $result_unavailable = mysqli_query($connection, $query_unavailable);
                        $unavailable_vaccines = mysqli_fetch_assoc($result_unavailable)['unavailable'];
                    ?>
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $total_vaccines; ?></div>
                            <div class="cardName">Total Vaccines</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="medical-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $available_vaccines; ?></div>
                            <div class="cardName">Available Vaccines</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $unavailable_vaccines; ?></div>
                            <div class="cardName">Unavailable Vaccines</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </div>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Vaccine Name</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM tbl_vaccine ORDER BY id DESC";
                            $result = mysqli_query($connection,$query);
                            if(mysqli_num_rows($result) > 0) {
                                foreach($result as $row)
                                {
                                    $status_class = ($row['status'] == 'available') ? 'status-available' : 'status-unavailable';
                                    
                                    // Safely handle created_at field
                                    if(isset($row['created_at']) && !empty($row['created_at'])) {
                                        $created_date = date('M j, Y', strtotime($row['created_at']));
                                    } else {
                                        $created_date = 'Not set';
                                    }
                                    
                                    echo 
                                    "<tr>
                                        <td>$row[id]</td>
                                        <td>$row[name]</td>
                                        <td class='$status_class'>" . ucfirst($row['status']) . "</td>
                                        <td>$created_date</td>
                                        <td>
                                            <div class='action-buttons'>
                                                <a href='add_new_vaccine.php?id=$row[id]'>Edit</a>
                                                <a href='vaccine.php?toggle_id=$row[id]' class='btntoggle'>Toggle Status</a>
                                                <a href='add_new_vaccine.php?delete_id=$row[id]' class='btndelete' onclick='return confirmDelete()'>Delete</a>
                                            </div>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No vaccines found. <a href='add_new_vaccine.php'>Add the first vaccine</a></td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this vaccine? This action cannot be undone.');
        }
    </script>
</body>
</html>