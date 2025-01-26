<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sime = htmlspecialchars(trim ($_POST['ime']));
    $email = filter_var (trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $poruka = htmlspecialchars(trim($_POST['poruka']));

    if($ime && $email && $poruka) {
        $to= "janjicp52@gmail.com";

        $subject = "Nova poruka sa sajta od $ime";

        $message = "Ime: $ime\n";
        $message = "Email: $email\n\n";
        $message = "Poruka: \n$poruka\n";

        $headers = "From: $email";

        if (mail($to, $subject, $message, $headers)) {
            echo "<div class='succes'>Poruka je uspjesno poslana. Hvala sto ste nas kontaktirali!</div>";
        }  else {
            echo "<div class='error'>Doslo je do greske prilikom slanja poruke. Pokusajte ponovo.</div>";
        }
    }else {
        echo "<div class='error'>Molimo popunite sva polja ispravno.</div>";
    }
} else {
    echo "<div class='error'>Nevazeci zahtjev.</div>";
}
?>
