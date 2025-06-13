<?php
   include "connection.php";

   // Enable error reporting
   error_reporting(E_ALL);
   ini_set('display_errors', 1);

   // Update record from form submission 
   if(isset($_POST['update']))
   {
       // Validate and sanitize input
       $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
       $item = filter_var($_POST['item'], FILTER_SANITIZE_NUMBER_INT);
       $class = htmlspecialchars($_POST['class']); 
       $description = htmlspecialchars($_POST['description']); 
       $containment = htmlspecialchars($_POST['containment']); 
       $image = filter_var($_POST['image'], FILTER_SANITIZE_URL);

       // Prepare update statement for SCP table
    $update = $connection->prepare("UPDATE scp SET 
                                  item = ?, 
                                  class = ?, 
                                  description = ?, 
                                  containment = ?, 
                                  image = ? 
                                  WHERE id = ?");
    
    $update->bind_param("issssi", $item, $class, $description, $containment, $image, $id); 
    
    if($update->execute())
    {
        echo '<div class="container mt-4">';
        echo '<div class="alert alert-success">';
        echo '<h4>SCP Record Successfully Updated</h4>';
        echo '<p>SCP-'.$item.' has been updated in the database.</p>';
        echo '<a href="index.php?link='.$item.'" class="btn btn-primary">View Updated Record</a>';
        echo ' <a href="index.php" class="btn btn-secondary">Back to Index</a>';
        echo '</div>';
        echo '</div>';
    }
    else
    {
        echo '<div class="container mt-4">';
        echo '<div class="alert alert-danger">';
        echo '<h4>Error Updating Record</h4>';
        echo '<p>Error: '.$update->error.'</p>';
        echo '<a href="edit.php?edit='.$id.'" class="btn btn-warning">Try Again</a>';
        echo ' <a href="index.php" class="btn btn-secondary">Back to Index</a>';
        echo '</div>';
        echo '</div>';
    }
    
    // Close the statement
    $update->close();
    }
   else
   {
    // If someone accesses this page directly without submitting the form
       echo '<div class="container mt-4">';
       echo '<div class="alert alert-warning">';
       echo '<h4>Invalid Request</h4>';
       echo '<p>No update data was submitted.</p>';
       echo '<a href="index.php" class="btn btn-primary">Back to Index</a>';
       echo '</div>';
       echo '</div>';
    }

    // Include Bootstrap for styling
    echo '
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
       <style>
           body {
               background-color: #000 !important;
               color: #ffffff;
           }
           .alert {
               background-color: #001a1a !important;
               border-color: #00ffff !important;
               color: #ffffff !important;
               text-shadow: 0 0 5px #00ffff;
           }
           .alert-success {
               background-color: #003300 !important;
               border-color: #00ff00 !important;
               text-shadow: 0 0 5px #00ff00;
           }
           .alert-danger {
               background-color: #330000 !important;
               border-color: #ff0000 !important;
               text-shadow: 0 0 5px #ff0000;
           }
           .alert-warning {
               background-color: #332600 !important;
               border-color: #ffcc00 !important;
               text-shadow: 0 0 5px #ffcc00;
           }
           .btn-primary {
               background-color: #003333 !important;
               border-color: #00ffff !important;
               color: #ffffff !important;
               text-shadow: 0 0 5px #00ffff;
           }
           .btn-primary:hover {
               background-color: #002222 !important;
               border-color: #00cccc !important;
               text-shadow: 0 0 7px #00cccc;
           }
           .btn-secondary {
               background-color: #222222 !important;
               border-color: #666666 !important;
               color: #ffffff !important;
               text-shadow: 0 0 3px #00ffff;
           }
           .btn-secondary:hover {
               background-color: #333333 !important;
               border-color: #888888 !important;
           }
           .btn-warning {
               background-color: #332600 !important;
               border-color: #ffcc00 !important;
               color: #ffffff !important;
               text-shadow: 0 0 5px #ffcc00;
           }
           .btn-warning:hover {
               background-color: #4d3a00 !important;
               border-color: #ffcc00 !important;
               text-shadow: 0 0 7px #ffcc00;
           }
           h4 {
               color: #ffffff !important;
               text-shadow: 0 0 8px #00ffff;
           }
           p {
               color: #ffffff !important;
               text-shadow: 0 0 3px #00ffff;
           }
       </style>
    ';
   ?>