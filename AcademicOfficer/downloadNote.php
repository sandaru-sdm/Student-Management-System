<?php

include "../connection.php";

if (isset($_GET["id"])) {

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $rs = Database::search("SELECT * FROM `lesson_note` WHERE `id` = '" . $id . "'");
    $data = $rs->fetch_assoc();
    $filepath = $data["path"];

    // Process download
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        die();
    } else {
        http_response_code(404);
        die();
    }

} else {
?>
    <script>
        window.location = "manageNotes.php";
    </script>
<?php
}

?>