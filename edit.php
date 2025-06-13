<!doctype html>
<html lang="en">
    <head>
        <title>Edit SCP Record - SCP Foundation Database</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <style>
            body {
                background-color: #000 !important;
                color: #ffffff;
            }
            .bg-dark {
                background-color: #000 !important;
                border-bottom: 1px solid #00ffff;
            }
            .card {
                background-color: #111;
                border-color: #333;
            }
            .card-header {
                background-color: #001a1a !important;
                border-bottom: 1px solid #00ffff;
                color: #ffffff !important;
                text-shadow: 0 0 8px #00ffff;
            }
            .btn-primary {
                background-color: #003333;
                border-color: #00ffff;
                color: #ffffff;
                text-shadow: 0 0 5px #00ffff;
            }
            .btn-primary:hover {
                background-color: #002222;
                border-color: #00cccc;
                text-shadow: 0 0 7px #00cccc;
            }
            .btn-success {
                background-color: #001a1a;
                border-color: #00ffff;
                color: #ffffff;
                text-shadow: 0 0 5px #00ffff;
            }
            .btn-success:hover {
                background-color: #003333;
                border-color: #00ffff;
                text-shadow: 0 0 7px #00ffff;
            }
            .form-control, .form-select {
                background-color: #111;
                border-color: #333;
                color: #ffffff !important;
            }
            .form-control:focus, .form-select:focus {
                background-color: #222;
                border-color: #00ffff;
                color: #ffffff !important;
                box-shadow: 0 0 0 0.25rem rgba(0, 255, 255, 0.25);
            }
            h1, h2, h3, h4, h5, h6 {
                color: #ffffff;
                text-shadow: 0 0 10px #00ffff;
            }
            .alert {
                background-color: #001a1a;
                border-color: #00ffff;
                color: #ffffff;
                text-shadow: 0 0 5px #00ffff;
            }
            .alert-info {
                background-color: #003333;
                border-color: #00ffff;
                color: #ffffff;
                text-shadow: 0 0 5px #00ffff;
            }
            .alert-danger {
                background-color: #330000;
                border-color: #ff0000;
                color: #ffffff;
                text-shadow: 0 0 5px #ff0000;
            }
            .text-muted {
                color: #aaaaaa !important;
                text-shadow: 0 0 3px #00ffff;
            }
            label {
                color: #ffffff !important;
                text-shadow: 0 0 5px #00ffff;
            }
            small {
                color: #aaaaaa !important;
                text-shadow: 0 0 3px #00ffff;
            }
            .display-4 {
                text-shadow: 0 0 15px #00ffff;
                font-weight: bold;
            }
            .border {
                border-color: #333 !important;
            }
            .rounded {
                border-color: #00ffff !important;
            }
            .lead {
                color: #ffffff;
                text-shadow: 0 0 8px #00ffff;
            }
            footer p {
                color: #ffffff;
                text-shadow: 0 0 5px #00ffff;
            }
        </style>
    </head>
    <body class="container">
        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        
            include "connection.php";
            
            $row = [];
            
            if(isset($_GET['edit']))
            {
                $id = $_GET['edit'];
                $recordToUpdate = $connection->prepare("SELECT * FROM scp WHERE id = ?");
                $recordToUpdate->bind_param("i", $id);
                
                if($recordToUpdate->execute())
                {
                    $temp = $recordToUpdate->get_result();
                    $row = $temp->fetch_assoc();
                    echo "<div class='alert alert-info mt-3'>SCP record ready for editing</div>";
                }
                else
                {
                    echo "<div class='alert alert-danger mt-3'>Error: {$recordToUpdate->error}</div>";
                }
            }
        ?>
        
        <header class="my-4 text-center">
            <h1 class="display-4">Edit SCP Record</h1>
            <p class="lead">Secure, Contain, Protect</p>
        </header>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="mb-0">SCP Edit Form</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="update.php" class="form-group">
                            <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
                            
                            <div class="mb-3">
                                <label class="form-label">SCP Number</label>
                                <input type="text" name="item" class="form-control" 
                                       value="<?php echo isset($row['item']) ? htmlspecialchars($row['item']) : ''; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Object Class</label>
                                <select name="class" class="form-select" required>
                                    <option value="Safe" <?php echo (isset($row['class']) && $row['class'] == 'Safe') ? 'selected' : ''; ?>>Safe</option>
                                    <option value="Euclid" <?php echo (isset($row['class']) && $row['class'] == 'Euclid') ? 'selected' : ''; ?>>Euclid</option>
                                    <option value="Keter" <?php echo (isset($row['class']) && $row['class'] == 'Keter') ? 'selected' : ''; ?>>Keter</option>
                                    <option value="Thaumiel" <?php echo (isset($row['class']) && $row['class'] == 'Thaumiel') ? 'selected' : ''; ?>>Thaumiel</option>
                                    <option value="Neutralized" <?php echo (isset($row['class']) && $row['class'] == 'Neutralized') ? 'selected' : ''; ?>>Neutralized</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="5" required><?php 
                                    echo isset($row['description']) ? htmlspecialchars($row['description']) : ''; 
                                ?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Containment Procedures</label>
                                <textarea name="containment" class="form-control" rows="5" required><?php 
                                    echo isset($row['containment']) ? htmlspecialchars($row['containment']) : ''; 
                                ?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Image Path</label>
                                <input type="text" name="image" class="form-control" 
                                       value="<?php echo isset($row['image']) ? htmlspecialchars($row['image']) : ''; ?>">
                                <small class="text-muted">Leave blank if no image available</small>
                            </div>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="index.php" class="btn btn-primary me-md-2">Back to List</a>
                                <input type="submit" name="update" value="Update SCP Record" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <footer class="text-center py-4">
            <p>SCP Foundation Database &copy; <?php echo date('Y'); ?></p>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>