
<?php
        include_once "bd.php";
        $id = $_POST['id']; 
        $id = openssl_decrypt(
            $id, "AES-256-CBC", "OKGoogle",
        );
        $sql = "DELETE FROM sprint WHERE id = $id";
        $resultado = $bd->prepare($sql);
        $resultado->execute();

?>