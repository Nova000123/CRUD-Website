<!doctype html>
<html lang="en">
    <head>
        <title>SCP Foundation Database</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <style>
            .scp-card {
                transition: transform 0.3s;
                background-color: #111;
                border: 1px solid #333;
            }
            .scp-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0,255,255,0.1);
                background-color: #151515;
            }
            .nav-link {
                font-weight: 500;
                color: #fff !important;
                text-shadow: 0 0 5px #00ffff;
            }
            .nav-link:hover {
                color: #fff !important;
                text-shadow: 0 0 7px #00ffff;
            }
            .nav-link.active {
                font-weight: bold;
                text-decoration: underline;
            }
            .object-class {
                font-weight: bold;
                text-transform: uppercase;
            }
            .safe { color: #fff; text-shadow: 0 0 5px #00ffff; }
            .euclid { color: #fff; text-shadow: 0 0 5px #ffff00; }
            .keter { color: #fff; text-shadow: 0 0 5px #ff0000; }
            .neutralized { color: #aaa; text-shadow: 0 0 3px #666666; }
            .thaumiel { color: #fff; text-shadow: 0 0 5px #0000ff; }
            
            body {
                background-color: #000 !important;
                color: #fff;
            }
            .bg-dark {
                background-color: #000 !important;
                border-bottom: 1px solid #00ffff;
            }
            .card-header {
                background-color: #001a1a !important;
                border-bottom: 1px solid #00ffff;
                color: #fff !important;
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
                color: #fff;
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
            .btn-warning {
                background-color: #332600;
                border-color: #ffcc00;
                color: #fff;
                text-shadow: 0 0 5px #ffcc00;
            }
            .btn-warning:hover {
                background-color: #4d3a00;
                border-color: #ffcc00;
                text-shadow: 0 0 7px #ffcc00;
            }
            .btn-danger {
                background-color: #330000;
                border-color: #ff0000;
                color: #fff;
                text-shadow: 0 0 5px #ff0000;
            }
            .btn-danger:hover {
                background-color: #4d0000;
                border-color: #ff0000;
                text-shadow: 0 0 7px #ff0000;
            }
            .border {
                border-color: #333 !important;
            }
            .navbar {
                box-shadow: 0 2px 10px rgba(0,255,255,0.2);
            }
            .rounded {
                border-color: #00ffff !important;
            }
            .alert {
                background-color: #001a1a;
                border-color: #00ffff;
                color: #fff;
                text-shadow: 0 0 5px #00ffff;
            }
            .alert-danger {
                background-color: #330000;
                border-color: #ff0000;
                color: #fff;
                text-shadow: 0 0 5px #ff0000;
            }
            .alert-success {
                background-color: #003300;
                border-color: #00ff00;
                color: #fff;
                text-shadow: 0 0 5px #00ff00;
            }
            .text-muted {
                color: #aaa !important;
                text-shadow: 0 0 3px #00ffff;
            }
            .lead {
                color: #fff;
                text-shadow: 0 0 8px #00ffff;
            }
            .card {
                background-color: #111;
                border-color: #333;
            }
            .card-body {
                color: #fff;
            }
            .bg-white {
                background-color: #111 !important;
            }
            h1, h2, h3, h4, h5, h6 {
                color: #fff;
                text-shadow: 0 0 10px #00ffff;
            }
            .display-4 {
                text-shadow: 0 0 15px #00ffff;
                font-weight: bold;
            }
            .navbar-toggler {
                border-color: #00ffff;
            }
            .navbar-toggler-icon {
                background-image: url("https://images.steamusercontent.com/ugc/2058749890271794576/3C67FFF3C26C3BB5DA87082D7F8E0640B2D064C8/?imw=637&imh=358&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true");
            }
            footer p {
                color: #fff;
                text-shadow: 0 0 5px #00ffff;
            }
            .small {
                color: #aaa;
                text-shadow: 0 0 3px #00ffff;
            }
            /*This css is glowing harder than my will to live during bug fixing D: It’s not a website anymore, it’s a nightclub for SCPs... */
        </style>
    </head>
    <body class="container">
        <?php include 'connection.php'; ?>
        
        <header class="my-5 text-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d6/SCP_Foundation_%28emblem%29.gif?20181112084557" alt="SCP Foundation Logo" class="img-fluid mb-3" style="max-height: 100px;">
            <h1 class="display-4">SCP Foundation Database</h1>
            <p class="lead">Secure, Contain, Protect</p>
        </header>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded mb-4">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href='index.php'>Home</a>
                        </li>
                        <?php foreach($result as $link): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?link=<?php echo $link['item']; ?>">
                                SCP-<?php echo $link['item']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn btn-success" href='create.php'>Add New SCP</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="border rounded shadow p-4 mb-4">
            <?php
                if(isset($_GET['link']))
                {
                    $item = $_GET['link'];
                    $query = $connection->query("SELECT * FROM scp WHERE item='$item'");
                
                    if($query && $query->num_rows > 0)
                    {
                        $array = $query->fetch_assoc();
                        $edit = "edit.php?edit=".$array['id'];
                        $delete = "index.php?del=" . $array["id"];
                        
                        $classStyle = strtolower($array['class']);
                        if($classStyle == 'safe') $classStyle = 'safe';
                        else if($classStyle == 'euclid') $classStyle = 'euclid';
                        else if($classStyle == 'keter') $classStyle = 'keter';
                        else if($classStyle == 'neutralized') $classStyle = 'neutralized';
                        else if($classStyle == 'thaumiel') $classStyle = 'thaumiel';
                        else $classStyle = '';
                        
                        echo "
                            <div class='row'>
                                <div class='col-md-4'>
                                    <img src='{$array['image']}' alt='SCP-{$array['item']}' class='img-fluid rounded mb-3'>
                                </div>
                                <div class='col-md-8'>
                                    <h2 class='display-5'>SCP-{$array['item']}</h2>
                                    <h3 class='mb-4'>
                                        <span class='object-class {$classStyle}'>Object Class: {$array['class']}</span>
                                    </h3>
                                    
                                    <div class='card mb-4'>
                                        <div class='card-header bg-dark text-white'>
                                            <h4 class='mb-0'>Special Containment Procedures</h4>
                                        </div>
                                        <div class='card-body'>
                                            <p class='card-text'>{$array['containment']}</p>
                                        </div>
                                    </div>
                                    
                                    <div class='card'>
                                        <div class='card-header bg-dark text-white'>
                                            <h4 class='mb-0'>Description</h4>
                                        </div>
                                        <div class='card-body'>
                                            <p class='card-text'>{$array['description']}</p>
                                        </div>
                                    </div>
                                    
                                    <div class='mt-4'>
                                        <a href='{$edit}' class='btn btn-warning'>Edit Record</a>
                                        <a href='{$delete}' class='btn btn-danger ms-2'>Delete Record</a>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                    else
                    {
                        echo '<div class="alert alert-danger">SCP record not found in database</div>';
                    }
                }
                else
                {
                    $allScps = $connection->query("SELECT * FROM scp ORDER BY item ASC");
                    
                    if($allScps && $allScps->num_rows > 0) {
                        echo '<h2 class="mb-4">SCP Database</h2>';
                        echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
                        
                        while($scp = $allScps->fetch_assoc()) {
                            $classStyle = strtolower($scp['class']);
                            if($classStyle == 'safe') $classStyle = 'safe';
                            else if($classStyle == 'euclid') $classStyle = 'euclid';
                            else if($classStyle == 'keter') $classStyle = 'keter';
                            else if($classStyle == 'neutralized') $classStyle = 'neutralized';
                            else if($classStyle == 'thaumiel') $classStyle = 'thaumiel';
                            else $classStyle = '';
                            
                            echo '
                                <div class="col">
                                    <div class="card h-100 scp-card">
                                        <img src="'.$scp['image'].'" class="card-img-top" alt="SCP-'.$scp['item'].'">
                                        <div class="card-body">
                                            <h5 class="card-title">SCP-'.$scp['item'].'</h5>
                                            <p class="card-text"><span class="object-class '.$classStyle.'">'.$scp['class'].'</span></p>
                                            <p class="card-text text-truncate">'.substr($scp['description'], 0, 100).'...</p>
                                            <a href="index.php?link='.$scp['item'].'" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                        
                        echo '</div>';
                    } else {
                        echo '
                            <div class="text-center py-5">
                                <h2>Welcome to the SCP Foundation Database</h2>
                                <p class="lead">No SCP entries found. Use the "Add New SCP" button to create your first entry.</p>
                            </div>
                        ';
                    }
                }
                
                if(isset($_GET['del']))
                {
                    $ID = $_GET['del'];
                    $delete = $connection->prepare("DELETE FROM scp WHERE id=?");
                    $delete->bind_param("i", $ID);
                
                    if($delete->execute())
                    {
                        echo '<div class="alert alert-success mt-3">SCP record successfully deleted</div>';
                        echo '<script>setTimeout(function(){ window.location.href = "index.php"; }, 1500);</script>';
                    }
                    else
                    {
                        echo '<div class="alert alert-danger mt-3">Error: Failed to delete record</div>';
                    }
                }
            ?>
        </div>
        
        <footer class="text-center py-4">
            <p>SCP Foundation Database &copy; <?php echo date('Y'); ?></p>
            <p class="small">Built a CRUD website and survived. I’ve cried, debugged, cried again, and gained the ability to communicate with error messages telepathically.</p>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>