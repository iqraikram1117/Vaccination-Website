<?php
include("connection.php");
session_start();
if(!isset($_SESSION['admin_session']))
{
    echo "<script>window.location.href='login.php'</script>";
}
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
    }
    .mainContent .title
    {
        font-size: 35px;
        color: #2c3e50;
        margin-bottom: 20px;
        text-align: center;
    }
    .mainContent table
    {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .mainContent table,td,th 
    {
        border: 1px solid #e0e0e0;
        text-align: center;
        padding: 15px 10px;
    }
    .mainContent table thead
    {
        background: linear-gradient(135deg, #4763e0, #3498db);
    }
    .mainContent table th
    {
        color: white;
        font-weight: 600;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .mainContent table tbody tr:hover
    {
        background-color: #f8f9fa;
    }
    .mainContent table tbody tr:nth-child(even)
    {
        background-color: #fafafa;
    }
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }
    .status-process {
        background: #fff3cd;
        color: #856404;
    }
    .status-positive {
        background: #f8d7da;
        color: #721c24;
    }
    .status-negative {
        background: #d1edff;
        color: #155724;
    }
    .result-select {
        padding: 6px 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        background: white;
        cursor: pointer;
        min-width: 120px;
    }
    .result-select:focus {
        outline: none;
        border-color: #4763e0;
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

/* Stats Cards for COVID Tests */
.stats-cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    padding: 25px;
    border-radius: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    transition: 0.3s ease;
}

.stat-card:hover {
    background: #4763e0;
    transform: translateY(-5px);
}

.stat-card:hover .numbers,
.stat-card:hover .cardName,
.stat-card:hover .iconBx {
    color: white;
}

.stat-card .numbers {
    font-weight: 600;
    font-size: 2.2rem;
    color: #4763e0;
}

.stat-card .cardName {
    color: #666;
    font-size: 1rem;
    margin-top: 5px;
}

.stat-card .iconBx {
    font-size: 2.8rem;
    color: #999;
}

.stat-card.total .iconBx { color: #4763e0; }
.stat-card.process .iconBx { color: #ffc107; }
.stat-card.positive .iconBx { color: #dc3545; }
.stat-card.negative .iconBx { color: #28a745; }

.stat-card:hover.total .iconBx,
.stat-card:hover.process .iconBx,
.stat-card:hover.positive .iconBx,
.stat-card:hover.negative .iconBx {
    color: white;
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
                <h2 class="title">COVID Test Management</h2>
                
                <?php
                // Statistics cards
                $total_tests = mysqli_query($connection, "SELECT COUNT(*) as total FROM tbl_test");
                $process_tests = mysqli_query($connection, "SELECT COUNT(*) as process FROM tbl_test WHERE result='Process'");
                $positive_tests = mysqli_query($connection, "SELECT COUNT(*) as positive FROM tbl_test WHERE result='Positive'");
                $negative_tests = mysqli_query($connection, "SELECT COUNT(*) as negative FROM tbl_test WHERE result='Negative'");
                
                if($total_tests && $process_tests && $positive_tests && $negative_tests) {
                    $total = mysqli_fetch_assoc($total_tests);
                    $process = mysqli_fetch_assoc($process_tests);
                    $positive = mysqli_fetch_assoc($positive_tests);
                    $negative = mysqli_fetch_assoc($negative_tests);
                } else {
                    $total = ['total' => 0];
                    $process = ['process' => 0];
                    $positive = ['positive' => 0];
                    $negative = ['negative' => 0];
                }
                ?>
                
                <div class="stats-cards">
                    <div class="stat-card total">
                        <div>
                            <div class="numbers"><?php echo $total['total']; ?></div>
                            <div class="cardName">Total Tests</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="medical-outline"></ion-icon>
                        </div>
                    </div>
                    
                    <div class="stat-card process">
                        <div>
                            <div class="numbers"><?php echo $process['process']; ?></div>
                            <div class="cardName">In Process</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="time-outline"></ion-icon>
                        </div>
                    </div>
                    
                    <div class="stat-card positive">
                        <div>
                            <div class="numbers"><?php echo $positive['positive']; ?></div>
                            <div class="cardName">Positive</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </div>
                    </div>
                    
                    <div class="stat-card negative">
                        <div>
                            <div class="numbers"><?php echo $negative['negative']; ?></div>
                            <div class="cardName">Negative</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                        </div>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Hospital Name</th>
                            <th>Test Date</th>
                            <th>Result</th>
                            <th>Update Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT tbl_patient.name as 'pname', tbl_hospital.name as 'hname', tbl_test.* 
                                  FROM tbl_test 
                                  INNER JOIN tbl_patient ON tbl_test.p_id = tbl_patient.id 
                                  INNER JOIN tbl_hospital ON tbl_test.h_id = tbl_hospital.id
                                  ORDER BY tbl_test.id DESC";
                        $result = mysqli_query($connection, $query);
                        
                        if($result && mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $status_class = 'status-' . strtolower($row['result']);
                                echo "
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['pname']}</td>
                                    <td>{$row['hname']}</td>
                                    <td>" . ($row['date'] ? date('M d, Y', strtotime($row['date'])) : 'N/A') . "</td>
                                    <td>
                                        <span class='status-badge {$status_class}'>
                                            {$row['result']}
                                        </span>
                                    </td>
                                    <td>
                                        <form method='post' style='display:inline;'>
                                            <input type='hidden' name='test_id' value='{$row['id']}'>
                                            <select name='test_result' class='result-select' onchange='this.form.submit()'>
                                                <option value='Process' " . ($row['result'] == 'Process' ? 'selected' : '') . ">Process</option>
                                                <option value='Positive' " . ($row['result'] == 'Positive' ? 'selected' : '') . ">Positive</option>
                                                <option value='Negative' " . ($row['result'] == 'Negative' ? 'selected' : '') . ">Negative</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "
                            <tr>
                                <td colspan='6' style='text-align: center; padding: 40px; color: #666;'>
                                    <h3>No COVID Tests Found</h3>
                                    <p>There are no COVID test records in the system yet.</p>
                                </td>
                            </tr>";
                        }

                        // Update test result
                        if(isset($_POST['test_id']) && isset($_POST['test_result'])) {
                            $test_id = $_POST['test_id'];
                            $test_result = $_POST['test_result'];
                            
                            $update_query = "UPDATE tbl_test SET result = '$test_result' WHERE id = '$test_id'";
                            if(mysqli_query($connection, $update_query)) {
                                echo "<script>
                                        alert('Test result updated successfully!');
                                        window.location.href='covid-test.php';
                                      </script>";
                            } else {
                                echo "<script>alert('Error updating test result!');</script>";
                            }
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
        document.addEventListener('DOMContentLoaded', function() {
            const resultSelects = document.querySelectorAll('.result-select');
            resultSelects.forEach(select => {
                select.addEventListener('change', function(e) {
                    if(!confirm('Are you sure you want to update the test result?')) {
                        this.form.reset();
                    }
                });
            });
        });
    </script>
</body>
</html>