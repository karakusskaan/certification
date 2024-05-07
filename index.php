<?php
include "ayar.php";

if(isset($_POST['ad']) && isset($_POST['soyad'])){
    $ad = ucwords(strtolower($_POST['ad']));
    $soyad = mb_strtoupper($_POST['soyad']);

    $SQL = "SELECT * FROM uye_listesi WHERE ad = '$ad' AND soyad='$soyad'";
    $result = $db->query($SQL);

    if ($result && $result->rowCount() > 0) {
        $user = $result->fetch(PDO::FETCH_ASSOC);
        $user_id = $user['sira'];

        $SQL = "SELECT * FROM sahipler WHERE sertifika_id = $sertifika_id";
        $result = $db->query($SQL);

        if ($result && $result->rowCount() > 0) {
            echo "Sertifikalar:";
            echo "<ul>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . $row['sertifika_adi'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Herhangi bir sertifika bulunamadı.";
        }
    } else {
       echo "Veritabanında bu isimde bir kullanıcı bulunamadı.";
    }
}
?>
