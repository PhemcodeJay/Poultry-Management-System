<?php

include('config.php'); // Includes database connection

// Ensure this script is accessed through a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize and validate form inputs
    $hatchery_no = htmlspecialchars(trim($_POST['hatchery_no'])); 
    $hatchery_initial_qty = htmlspecialchars(trim($_POST['hatchery_initial_qty'])); 
    $hatchery_start_date = htmlspecialchars(trim($_POST['hatchery_start_date'])); 
    $estimated_hatch_date = htmlspecialchars(trim($_POST['estimated_hatch_date'])); 
    $notes = htmlspecialchars(trim($_POST['notes'])); 
    $hatchery_actual_date = htmlspecialchars(trim($_POST['hatchery_actual_date'])); 
    $hatchery_final_qty = htmlspecialchars(trim($_POST['hatchery_final_qty'])); 
    $machine_size = intval($_POST['machine_size']); 
    $machine_no = htmlspecialchars(trim($_POST['machine_no'])); 

    // SQL query for inserting into batch_hatchery table
    $insert_batch_query = "INSERT INTO batch_hatchery (hatchery_no, hatchery_initial_qty, hatchery_start_date, estimated_hatch_date, notes, hatchery_actual_date, hatchery_final_qty, machine_size, machine_no)
                           VALUES (:hatchery_no, :hatchery_initial_qty, :hatchery_start_date, :estimated_hatch_date, :notes, :hatchery_actual_date, :hatchery_final_qty, :machine_size, :machine_no)";
    
    // Prepare and execute statement
    $stmt = $connection->prepare($insert_batch_query);
    $stmt->bindParam(':hatchery_no', $hatchery_no);
    $stmt->bindParam(':hatchery_initial_qty', $hatchery_initial_qty);
    $stmt->bindParam(':hatchery_start_date', $hatchery_start_date);
    $stmt->bindParam(':estimated_hatch_date', $estimated_hatch_date);
    $stmt->bindParam(':notes', $notes);
    $stmt->bindParam(':hatchery_actual_date', $hatchery_actual_date);
    $stmt->bindParam(':hatchery_final_qty', $hatchery_final_qty);
    $stmt->bindParam(':machine_size', $machine_size);
    $stmt->bindParam(':machine_no', $machine_no);
    
    // Execute the statement and check for success
    if ($stmt->execute()) {
        // Redirect back to listing page after insertion
        header('Location: list-hatchery.php');
        exit();
    } else {
        // Log the error if insertion failed
        error_log("Batch insertion failed: " . implode(" | ", $stmt->errorInfo()));
        throw new Exception("Batch insertion failed.");
    }
    
} else {
    // Handle if the script is accessed directly or through another method
    echo "Invalid request";
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Add Hatchery - Rongai Poultry</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="http://localhost/rongai_poultry/imagess/favicon.ico" />
      <link rel="stylesheet" href="http://localhost/rongai_poultry/assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="http://localhost/rongai_poultry/assets/css/backend.css?v=1.0.0">
      <link rel="stylesheet" href="http://localhost/rongai_poultry/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="http://localhost/rongai_poultry/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="http://localhost/rongai_poultry/assets/vendor/remixicon/fonts/remixicon.css">  </head>
  <body class="  ">
    
    <!-- Wrapper Start -->
    <div class="wrapper">
      
      <div class="iq-sidebar  sidebar-default ">
          <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
              <a href="http://localhost/rongai_poultry/index.html" class="header-logo">
                  <img src="http://localhost/rongai_poultry/imagess/logo.png" class="img-fluid rounded-normal light-logo" alt="logo"><h5 class="logo-title light-logo ml-3">Rongai Poultry</h5>
              </a>
              <div class="iq-menu-bt-sidebar ml-0">
                  <i class="las la-bars wrapper-menu"></i>
              </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                      
                      <li class=" ">
                          <a href="#product" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash2" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                              </svg>
                              <span class="ml-4">Hatchery</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                              <li class="">
                                  <a href="http://localhost/rongai_poultry/records/list-hatchery.php">
                                      <i class="las la-minus"></i><span>List Hatchery</span>
                                  </a>
                              </li>
                              <li class="active">
                                  <a href="http://localhost/rongai_poultry/records/add-hatchery.php">
                                      <i class="las la-minus"></i><span>Add Hatchery</span>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      
                      <li class=" ">
                          <a href="#sale" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash4" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                              </svg>
                              <span class="ml-4">Sales Records</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="sale" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="">
                                          <a href="http://localhost/rongai_poultry/records/list-sales.php">
                                              <i class="las la-minus"></i><span>List Sale</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="http://localhost/rongai_poultry/records/add-sales.php">
                                              <i class="las la-minus"></i><span>Add Sale</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#purchase" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash5" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                  <line x1="1" y1="10" x2="23" y2="10"></line>
                              </svg>
                              <span class="ml-4">Broodery</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="purchase" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="">
                                          <a href="http://localhost/rongai_poultry/records/list-broodery.php">
                                              <i class="las la-minus"></i><span>List Broodery</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="http://localhost/rongai_poultry/records/add-broodery.php">
                                              <i class="las la-minus"></i><span>Add Broodery</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      
                      
              <div class="p-3"></div>
          </div>
          </div>      <div class="iq-top-navbar">
          <div class="iq-navbar-Media">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                      <i class="ri-menu-line wrapper-menu"></i>
                      <a href="http://localhost/rongai_poultry/index.html" class="header-logo">
                          <img src="http://localhost/rongai_poultry/imagess/logo.png" class="img-fluid rounded-normal" alt="logo">
                          <h5 class="logo-title ml-3">Rongai Poultry</h5>
      
                      </a>
                  </div>
                  <div class="iq-search-bar device-search">
                      <form action="#" class="searchbox">
                          <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                          <input type="text" class="text search-input" placeholder="Search here">
                      </form>
                  </div>
                  <div class="d-flex align-items-center">
                      <button class="navbar-toggler" type="button" data-toggle="collapse"
                          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                          aria-label="Toggle navigation">
                          <i class="ri-menu-3-line"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">
                              
                              
                              <li class="nav-item nav-icon search-content">
                                  <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                      <i class="ri-search-line"></i>
                                  </a>
                                  <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                      <form action="#" class="searchbox p-2">
                                          <div class="form-group mb-0 position-relative">
                                              <input type="text" class="text search-input font-size-12"
                                                  placeholder="type here to search">
                                              <a href="#" class="search-link"><i class="las la-search"></i></a>
                                          </div>
                                      </form>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>
          </div>
      </div>
      
      </div>      <div class="content-page">
      <div class="container-fluid add-form-list">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Hatchery Batch</h4>
                    </div>
                </div>
                <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" data-toggle="validator">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hatchery No *</label>
                                    <input type="number" name="hatchery_no" class="form-control" placeholder="Enter Batch Hatchery No" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Initial Quantity *</label>
                                    <input type="number" name="hatchery_initial_qty" class="form-control" placeholder="Enter Batch Initial Quantity" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Start Date *</label>
                                    <input type="date" name="hatchery_start_date" class="form-control" placeholder="Enter Batch Start Date" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Estimated Hatch Date *</label>
                                    <input type="date" name="estimated_hatch_date" class="form-control" placeholder="Enter Batch Estimated Hatch Date" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Actual Hatch Date *</label>
                                    <input type="date" name="hatchery_actual_date" class="form-control" placeholder="Enter Batch Actual Hatch Date" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Final Quantity *</label>
                                    <input type="number" name="hatchery_final_qty" class="form-control" placeholder="Enter Batch Final Quantity" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Machine Size *</label>
                                    <input type="number" name="machine_size" class="form-control" placeholder="Enter Batch Machine Size" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Machine No *</label>
                                    <input type="text" name="machine_no" class="form-control" placeholder="Enter Batch Machine No" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Notes *</label>
                                    <textarea name="notes" class="form-control" rows="2" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Add Batch</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Page end  -->
    </div>
      </div>
    </div>
    <!-- Wrapper End-->
    <footer class="iq-footer">
            <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a href="http://localhost/rongai_poultry/privacy-policy.html">Privacy Policy</a></li>
                                <li class="list-inline-item"><a href="http://localhost/rongai_poultry/terms-of-service.html">Terms of Use</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 text-right">
                            <span class="mr-1"><script>document.write(new Date().getFullYear())</script>©</span> <a href="http://localhost/rongai_poultry/index.html" class="">Rongai Poultry</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Backend Bundle JavaScript -->
    <script src="http://localhost/rongai_poultry/assets/js/backend-bundle.min.js"></script>
    
    
    <!-- app JavaScript -->
    <script src="http://localhost/rongai_poultry/assets/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</script>
    
  </body>
</html>