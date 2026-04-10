<?php

function readCustomers($filename){
  
    $customers = array();
    
    if (file_exists($filename)) {
        $handle = fopen($filename, 'r');
        
        while (($data = fgetcsv($handle, 1000, ';'))!== FALSE) {
            if (count($data) >= 2) {
                $customer = array(
                    'customer_id' => $data[0], 
                    'first_name'  => $data[1], 
                    'last_name'  => $data[2], 
                    'email'  => $data[3], 
                    'university'  => $data[4], 
                    'address'  => $data[5], 
                    'city'  => $data[6], 
                    'state'  => $data[7], 
                    'country'  => $data[8], 
                    'zip'  => $data[9], 
                    'phone'  => $data[10],
                    'sales'  => $data[11]
                );
                $customers[$data[0]] = $customer;
            };
        }
        fclose($handle);
    }
    return $customers;  
};

function readOrders($customer, $filename){
    
    $orders = array();
    
    if (file_exists($filename)) {
        $handle = fopen($filename, 'r');
        
        while (($data = fgetcsv($handle, 1000, ','))!== FALSE) {
            if (count($data) >= 3) {
                if ($data[1] == $customer) {
                   
                    $order = array(
                        'order_id' => $data[0],
                        'customer_id' => $data[1],
                        'book_ISBN' => $data[2],
                        'book_title' => $data[3],
                        'book_category' => $data[4]
                    );
                    $orders[] = $order;
                }
                
            };
        }
        fclose($handle);
    }
    return $orders;
};

?>