<?php
include('config.php'); // Includes database connection

// Fetch data from batch_hatchery table
$query = "SELECT * FROM batch_hatchery";
$stmt = $connection->prepare($query);
$stmt->execute();
$batch_hatcheries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>List Hatchery</title>
      
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
                              <li class="active">
                                  <a href="http://localhost/rongai_poultry/records/list-hatchery.php">
                                      <i class="las la-minus"></i><span>List Hatchery</span>
                                  </a>
                              </li>
                              <li class="">
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
                                          <a href="http://localhost/rongai_poultry/records/add-hatchery.php">
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
          <div class="iq-navbar-custom">
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
                              
                          </ul>
                      </div>
                  </div>
              </nav>
          </div>
      </div>
      
      </div>      <div class="content-page">
      <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Hatchery Batch List</h4>
                    <p class="mb-0">The hatchery batch list effectively dictates insights and provides records<br> to make profitable decisions.</p>
                </div>
                <a href="add-hatchery.php" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Hatchery Batch</a>
            </div>
        </div>
        <div class="container-fluid">
       
                <table class="data-tables table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="light light-data">
                            
                            <th>Hatchery No</th>
                            <th>Initial Quantity</th>
                            <th>Start Date</th>
                            <th>Estimated Hatch Date</th>
                            <th>Actual Hatch Date</th>
                            <th>Final Quantity</th>
                            <th>Machine Size</th>
                            <th>Machine No</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody class="light-body">
                        <?php foreach ($batch_hatcheries as $hatchery): ?>
                            <td><?php echo htmlspecialchars($hatchery['hatchery_no']); ?></td>
                            <td><?php echo htmlspecialchars($hatchery['hatchery_initial_qty']); ?></td>
                            <td><?php echo htmlspecialchars($hatchery['hatchery_start_date']); ?></td>
                            <td><?php echo htmlspecialchars($hatchery['estimated_hatch_date']); ?></td>
                            <td><?php echo htmlspecialchars($hatchery['hatchery_actual_date']); ?></td>
                            <td><?php echo htmlspecialchars($hatchery['hatchery_final_qty']); ?></td>
                            <td><?php echo htmlspecialchars($hatchery['machine_size']); ?></td>
                            <td><?php echo htmlspecialchars($hatchery['machine_no']); ?></td>
                            <td><?php echo htmlspecialchars($hatchery['notes']); ?></td>
                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <!-- Page end  -->
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
    
    <!-- Table Treeview JavaScript -->
    <script src="http://localhost/rongai_poultry/assets/js/table-treeview.js"></script>
    
    
    <!-- app JavaScript -->
    <script src="http://localhost/rongai_poultry/assets/js/app.js"></script>

    
  </body>
</html>