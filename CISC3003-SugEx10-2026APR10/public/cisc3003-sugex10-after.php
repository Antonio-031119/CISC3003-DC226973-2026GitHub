<?php

include 'includes/book-utilities.inc.php';

$all_customers = readCustomers('data/customers.txt');

$current_customer_id = isset($_GET['customer_id']) ? $_GET['customer_id'] : null;

$customer_orders = readOrders($current_customer_id, 'data/orders.txt');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DC226973 Chen Joaquin Antonio CISC3003 Suggested Exercise 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/demo-styles.css">
    <link rel="stylesheet" href="css/material.min.css">
    
    <script   src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="js/jquery.sparkline.2.1.2.js"></script>
    
     <script>
        $(function() {
            $('.sparkline').sparkline('html', {
                type: 'bar', 
                barColor: '#1e88e5', 
                height: '20px', 
                barWidth: 4
            });
        });
    </script>
    
  
</head>

<body>
    
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">

            <div class="mdl-grid">

              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--7-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Customers</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <table class="mdl-data-table  mdl-shadow--2dp">
                      <thead>
                        <tr>
                          <th class="mdl-data-table__cell--non-numeric">Name</th>
                          <th class="mdl-data-table__cell--non-numeric">University</th>
                          <th class="mdl-data-table__cell--non-numeric">City</th>
                          <th>Sales</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php                
                        foreach ($all_customers as $customer) {
                            echo '<tr>';
                            echo '<td class="mdl-data-table__cell--non-numeric">
                                    <a href="cisc3003-sugex10-after.php?customer_id=' . $customer['customer_id'] . '">' 
                                    . $customer['first_name'] . ' ' . $customer['last_name'] . 
                                  '</a></td>';
                            echo '<td class="mdl-data-table__cell--non-numeric">' . $customer['university'] . '</td>';
                            echo '<td class="mdl-data-table__cell--non-numeric">' . $customer['city'] . '</td>';
                            echo '<td><span class="sparkline" data-values="' . $customer['sales'] . '">' . $customer['sales'] . '</span> </td>';
                            echo '</tr>';
                        }
                        ?>
	
                                              
                      </tbody>
                    </table>
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              
              
            <div class="mdl-grid mdl-cell--5-col">
    

       
                  <!-- mdl-cell + mdl-card -->
                  <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">Customer Details</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                    	<?php 
                                    if (!$current_customer_id) {
                                        echo '<p>Select a customer to view detail.</p>';
                                    } else{
                                        $selected_customer = null;
                                        foreach ($all_customers as $cust) {
                                            if ($cust['customer_id'] == $current_customer_id) {
                                                $selected_customer = $cust;
                                                break;
                                            }
                                        }
                                        
                                        if ($selected_customer) {
                                            if ($selected_customer) {               
                                                echo '<h4>' . $selected_customer['first_name'] . ' ' . $selected_customer['last_name'] . '</h4>';
                                                echo '<p><strong>Email:</strong> ' . $selected_customer['email'] . '</p>';
                                                echo '<p><strong>University:</strong> ' . $selected_customer['university'] . '</p>';
                                                echo '<p><strong>Address:</strong> ' . $selected_customer['city'] . ', ' . $selected_customer['state'] . ', ' . $selected_customer['country'] . '</p>';
                                                echo '<p><strong>Phone:</strong> ' . $selected_customer['phone'] . '</p>';
                                            }
                                        }
                                    }
                                   ?>
                       
     
                                                                                                                                                                           
                    </div>    
                  </div>  <!-- / mdl-cell + mdl-card -->   

                  <!-- mdl-cell + mdl-card -->
                  <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">Order Details</h2>
                    </div>
                    <div class="mdl-card__supporting-text">       
                               
                                                                      

                               <table class="mdl-data-table  mdl-shadow--2dp">
                              <thead>
                                <tr>
                                  <th class="mdl-data-table__cell--non-numeric">Cover</th>
                                  <th class="mdl-data-table__cell--non-numeric">ISBN</th>
                                  <th class="mdl-data-table__cell--non-numeric">Title</th>
                                </tr>
                              </thead>
                              <tbody>
                           		<?php 
                                  
                                   if (count($customer_orders) > 0) {
                                       foreach ($customer_orders as $order) {
                                           echo '<tr>';
                                           echo '<td class="mdl-data-table__cell--non-numeric"><img src="Images/tinysquare/'. $order['book_ISBN'] .'.jpg"></td>';
                                           echo '<td class="mdl-data-table__cell--non-numeric">' . $order['book_ISBN'] . '</td>';
                                           echo '<td class="mdl-data-table__cell--non-numeric">' . $order['book_title'] . '</td>';
                                           echo '</tr>';
                                       }
                                   }
                                  ?>
                    
                              </tbody>
                            </table>
       

                        </div>    
                   </div>  <!-- / mdl-cell + mdl-card -->             


               </div>   
           
           
            </div>  <!-- / mdl-grid -->    

        </section>
    </main>    
</div>    <!-- / mdl-layout --> 

<footer><p>CISC3003 Web Programming: dc226973 Chen Joquin Antonio 2026</p></footer>
          
</body>
</html>
