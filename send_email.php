<?php

$json = array(
    'feedback' => 0
);

if (isset($_POST['imie'], $_POST['email'], $_POST['temat'], $_POST['wiadomosc']) && !empty($_POST['imie']) && !empty($_POST['email']) && !empty($_POST['temat']) && !empty($_POST['wiadomosc'])) {
    $imie      = $_POST['imie'];
    $email     = $_POST['email'];
    $temat     = $_POST['temat'];
    $wiadomosc = $_POST['wiadomosc'];
    $odbiorca  = "krzysiekserek@gmail.com";
    
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From:' . "$imie" . '<' . "$email" . '>' . "\r\n";
    
    
    $list = "Nadawca: $imie ($email) <br/><br/>  Treść wiadomości: <br><br> $wiadomosc <br><br> <i>Wiadomość wysłano z użyciem formularza na stronie internetowej.</i> ";
    if (mail($odbiorca, $temat, $list, $headers)) {
    $json['feedback'] = "Twoja wiadomość została wysłana.";
    }
} else {
    $json['feedback'] = "Twoja wiadomość nie została wysłana.";
}

echo json_encode($json);

?>