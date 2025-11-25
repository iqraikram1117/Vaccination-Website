<?php
    // Start session first
    session_start();
    
    // Include connection and check if it works
    include("connection.php");
    
    // Check if connection is established
    if (!isset($connection) || $connection === null) {
        die("Database connection failed. Please check your connection.php file.");
    }
    
    if(!isset($_SESSION['admin_session']))
    {
        echo "<script>window.location.href='login.php'</script>";
    }

    // Initialize variables
    $name = '';
    $status = 'available';
    $page_title = 'Add New Vaccine';
    $button_text = 'Add Vaccine';
    
    // Check if we're editing an existing vaccine
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $vaccine_id = $_GET['id'];
        $page_title = 'Edit Vaccine';
        $button_text = 'Update Vaccine';
        
        // Fetch existing vaccine data
        $query = "SELECT * FROM tbl_vaccine WHERE id = $vaccine_id";
        $result = mysqli_query($connection, $query);
        
        if(mysqli_num_rows($result) > 0) {
            $vaccine = mysqli_fetch_assoc($result);
            $name = $vaccine['name'];
            $status = $vaccine['status'];
        } else {
            echo "<script>alert('Vaccine not found!'); window.location.href='vaccine.php';</script>";
        }
    }
    
    if(isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $status = mysqli_real_escape_string($connection, $_POST['status']);
        
        // First, let's check if the table exists and has the right structure
        $table_check = mysqli_query($connection, "SHOW TABLES LIKE 'tbl_vaccine'");
        
        if(mysqli_num_rows($table_check) == 0) {
            // Create the table if it doesn't exist
            $create_table = "CREATE TABLE tbl_vaccine (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                status ENUM('available', 'unavailable') DEFAULT 'available',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            
            if(mysqli_query($connection, $create_table)) {
                echo "<script>console.log('Vaccine table created successfully');</script>";
            } else {
                die("Error creating table: " . mysqli_error($connection));
            }
        }
        
        if(isset($_POST['vaccine_id'])) {
            // Update existing vaccine
            $vaccine_id = $_POST['vaccine_id'];
            $query = "UPDATE tbl_vaccine SET name = '$name', status = '$status' WHERE id = $vaccine_id";
            
            if(mysqli_query($connection, $query)) {
                echo "<script>alert('Vaccine updated successfully!'); window.location.href='vaccine.php';</script>";
            } else {
                $error = mysqli_error($connection);
                echo "<script>alert('Error updating vaccine: $error');</script>";
            }
        } else {
            // Insert new vaccine
            $query = "INSERT INTO tbl_vaccine (name, status) VALUES ('$name', '$status')";
            
            if(mysqli_query($connection, $query)) {
                echo "<script>alert('Vaccine added successfully!'); window.location.href='vaccine.php';</script>";
            } else {
                $error = mysqli_error($connection);
                echo "<script>alert('Error adding vaccine: $error');</script>";
            }
        }
    }

    // Handle delete request
    if(isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        
        // Check if vaccine exists before deleting
        $check_query = "SELECT * FROM tbl_vaccine WHERE id = $delete_id";
        $check_result = mysqli_query($connection, $check_query);
        
        if(mysqli_num_rows($check_result) > 0) {
            $delete_query = "DELETE FROM tbl_vaccine WHERE id = $delete_id";
            if(mysqli_query($connection, $delete_query)) {
                echo "<script>alert('Vaccine deleted successfully!'); window.location.href='vaccine.php';</script>";
            } else {
                echo "<script>alert('Error deleting vaccine: " . mysqli_error($connection) . "'); window.location.href='vaccine.php';</script>";
            }
        } else {
            echo "<script>alert('Vaccine not found!'); window.location.href='vaccine.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <style>
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            background: #4763e0;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover {
            background: #3a52c4;
        }
        .btn-delete {
            background: #dc3545;
        }
        .btn-delete:hover {
            background: #c82333;
        }
        .cancel-link {
            margin-left: 10px;
            color: #4763e0;
            text-decoration: none;
        }
        .cancel-link:hover {
            text-decoration: underline;
        }
        .error {
            background: #ffcccc;
            color: #d8000c;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .delete-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><?php echo $page_title; ?></h2>
        
        <?php
        // Display connection status
        if (isset($connection) && $connection !== null) {
            echo "<div style='background: #ccffcc; padding: 10px; border-radius: 4px; margin-bottom: 15px;'>Database: Connected</div>";
        } else {
            echo "<div class='error'>Database: Not Connected - Please check connection.php</div>";
        }
        ?>
        
        <form method="POST">
            <?php if(isset($vaccine_id)): ?>
                <input type="hidden" name="vaccine_id" value="<?php echo $vaccine_id; ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label>Vaccine Name *</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>
            <div class="form-group">
                <label>Status *</label>
                <select name="status" required>
                    <option value="available" <?php echo ($status == 'available') ? 'selected' : ''; ?>>Available</option>
                    <option value="unavailable" <?php echo ($status == 'unavailable') ? 'selected' : ''; ?>>Unavailable</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn"><?php echo $button_text; ?></button>
            <a href="vaccine.php" class="cancel-link">Cancel</a>
        </form>

        <?php if(isset($vaccine_id)): ?>
        <div class="delete-section">
            <h3 style="color: #dc3545;">Danger Zone</h3>
            <p>Once you delete a vaccine, there is no going back. Please be certain.</p>
            <button type="button" class="btn btn-delete" onclick="confirmDelete()">Delete Vaccine</button>
        </div>
        <?php endif; ?>
    </div>

    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this vaccine? This action cannot be undone.')) {
                window.location.href = 'add_new_vaccine.php?delete_id=<?php echo isset($vaccine_id) ? $vaccine_id : ''; ?>';
            }
        }
    </script>
</body>
</html>