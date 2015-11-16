<?php
if (!empty($_POST)) {
    include "db.php";
    foreach ($_POST as $field_name => $val) {
        $val = (int) $val;
        if (is_int($val)) {
            $field_purchase = strip_tags(trim($field_name));
            $val          = strip_tags(trim(mysql_real_escape_string($val)));
            
            $split_data = explode(':', $field_purchase);
            $purchase_id    = $split_data[1];
            $field_name = $split_data[0];
            if (!empty($purchase_id) && !empty($field_name) && !empty($val)) {
                mysql_query("UPDATE `purchase_item` SET `quantity`='$val' WHERE `purchase_id`='$purchase_id'") or mysql_error();
                echo mysql_error();
                echo '<i class="fa fa-check-square"></i>';
            } else {
                echo '<i class="fa fa-times"></i>';
            }
        } else {
            echo '<i class="fa fa-exclamation-triangle"></i>';
        };
    }
} else {
    echo "Something went wrong...";
}
?>