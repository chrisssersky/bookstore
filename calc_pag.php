<?php
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3) {
        $end_loop = $cur_page + 3;
    } else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7) {
        $end_loop = 7;
    } else {
        $end_loop = $no_of_paginations;
    }
}
$msg .= "<div class='pagination'><ul>";

// Uaktywienie pierwszego buttona
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active'>Pierwsza</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>Pierwsza</li>";
}

// Uaktywnienie poprzedniego buttona
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active'>Poprzednia</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive'>Poprzednia</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i) {
        $msg .= "<li p='$i' style='color:#fff;background-color:#D70051; border: 1px solid #C00048;' class='active'>{$i}</li>";
    } else {
        $msg .= "<li p='$i' class='active'>{$i}</li>";
    }
}

// Uaktywnienie następnego buttona
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active'>Następna</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Następna</li>";
}

// Uaktywnienie ostatniego buttona
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='active'>Ostatnia</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Ostatnia</li>";
}
$goto = "<input type='text' class='goto' size='2'/><input type='button' id='go_btn' class='go_button' value='Idź do'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Strona <b>" . $cur_page . "</b> z <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul></div>"; 
echo $msg;