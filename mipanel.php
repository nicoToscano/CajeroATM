<?php
session_start(); # Debe estar escrito al inicio 

if (isset($_POST["nombre"]) && isset($_POST["clave"])) {
    $_SESSION["s_nombre"] = $_POST["nombre"];
    $_SESSION["s_clave"] = $_POST["clave"];
}

if (!(isset($_SESSION["s_nombre"]) && (isset($_SESSION["s_clave"])))) {
    header("Location: index.php");
}

$guardarPreferencias = (isset($_POST["chkpreferencias"])) ? $_POST["chkpreferencias"] : "";
if ($guardarPreferencias != "") {
    setcookie("c_nombre", $_POST["nombre"], 0);
    setcookie("c_clave", $_POST["clave"], 0);
    setcookie("c_preferencias", $guardarPreferencias, 0);
}

$idiomaSelecionado = "";
if (isset($_COOKIE["idioma"])) {
    $idiomaSelecionado = $_COOKIE["idioma"];
} else {
    $idiomaSelecionado = "es";
}
?>

<html>

<head></head>

<body>
    <h1> PANEL PRINCIPAL </h1>
    <h2> Bienvenido Usuario:
        <?php echo $_SESSION["s_nombre"]; ?>
    </h2>

    <a href="idiomacookies.php?idioma=es"> ES (Español)</a>::<a href="idiomacookies.php?idioma=en"> EN (English)</a>
    <br>
    <p><a href="cerrarsesion.php?borrar=0"> Cerrar Sesión</a></p>

    <?php
    
    ?>
</body>

</html>