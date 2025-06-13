<!doctype html>
<html lang="en">
    <head>
        <title>Add New SCP - SCP Foundation Database</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <style>
            body {
                background-color: #000 !important;
                color: #fff;
            }
            .bg-dark {
                background-color: #000 !important;
                border-bottom: 1px solid #00ffff;
            }
            .card {
                background-color: #111;
                border-color: #333;
                color: #fff;
            }
            .card-header {
                background-color: #001a1a !important;
                border-bottom: 1px solid #00ffff;
                color: #fff;
                text-shadow: 0 0 8px #00ffff; 
            }
            .btn-primary {
                background-color: #003333;
                border-color: #00ffff;
                color: #fff;
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
                color: #fff;
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
                color: #fff !important;
            }
            .form-control:focus, .form-select:focus {
                background-color: #222;
                border-color: #00ffff;
                color: #fff !important;
                box-shadow: 0 0 0 0.25rem rgba(0, 255, 255, 0.25);
            }
            h1, h2, h3, h4, h5, h6 {
                color: #fff;
                text-shadow: 0 0 10px #00ffff; 
            }
            .alert {
                background-color: #001a1a;
                border-color: #00ffff;
                color: #fff;
                text-shadow: 0 0 5px #00ffff; 
            }
            .alert-success {
                background-color: #003300;
                border-color: #00ff00;
                color: #fff;
                text-shadow: 0 0 5px #00ff00; 
            }
            .alert-danger {
                background-color: #330000;
                border-color: #ff0000;
                color: #fff;
                text-shadow: 0 0 5px #ff0000; 
            }
            .text-muted {
                color: #aaa !important;
                text-shadow: 0 0 3px #00ffff; 
            }
            label {
                color: #fff !important;
                text-shadow: 0 0 5px #00ffff; 
            }
            small {
                color: #aaa !important;
                text-shadow: 0 0 3px #00ffff; 
            }
            .lead {
                color: #fff;
                text-shadow: 0 0 8px #00ffff
            }
            footer p {
                color: #fff;
                text-shadow: 0 0 5px #00ffff; 
            }
        </style>
    </head>
    <body class="container">
        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            include "connection.php";
           
            if(isset($_POST['create']))
            {
                $insert = $connection->prepare("INSERT INTO scp (item, class, description, containment, image) VALUES (?, ?, ?, ?, ?)");
                $insert->bind_param("sssss", $_POST['item'], $_POST['class'], $_POST['description'], $_POST['containment'], $_POST['image']);
                
                if($insert->execute())
                {
                    echo "<div class='alert alert-success mt-3'>SCP record successfully created.</div>";
                }
                else
                {
                    echo "<div class='alert alert-danger mt-3'>Error creating record: {$insert->error}</div>";
                }
            }
        ?>
        
        <header class="my-4 text-center">
            <h1 class="display-4" style="font-weight: bold;">Add New SCP</h1>
            <p class="lead">Secure, Contain, Protect</p>
        </header>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="mb-0">SCP Creation Form</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="create.php" class="form-group">
                            <div class="mb-3">
                                <label class="form-label">SCP Number</label>
                                <input type="text" name="item" placeholder="Enter SCP number (e.g., 173)" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Object Class</label>
                                <select name="class" class="form-select" required>
                                    <option value="">Select Class</option>
                                    <option value="Safe">Safe</option>
                                    <option value="Euclid">Euclid</option>
                                    <option value="Keter">Keter</option>
                                    <option value="Thaumiel">Thaumiel</option>
                                    <option value="Neutralized">Neutralized</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" placeholder="Enter SCP description" class="form-control" rows="5" required></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Containment Procedures</label>
                                <textarea name="containment" placeholder="Enter containment procedures" class="form-control" rows="5" required></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Image URL</label>
                                <input type="text" name="image" placeholder="e.g., images/scp-173.jpg" class="form-control">
                                <small class="text-muted">Leave blank if no image available</small>
                            </div>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="index.php" class="btn btn-primary me-md-2">Back to List</a>
                                <input type="submit" name="create" value="Add SCP Record" class="btn btn-success">
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