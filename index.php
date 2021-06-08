<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TRABALHO PHP</title>
    <style>
        table,th,td
        {
            border:1px solid black;
            border-collapse:collapse;
        }
        tr:hover td
        {
            background-color:darkolivegreen;
            border-top: 1px solid rgb(10, 0, 255);
            border-bottom: 1px solid rgb(10, 0, 255);
        }
        td:hover
        {
            background-color:rgb(214,214,214) !important;
            border:1px solid red !important;
            border-top: 1px solid red;
            border-bottom: 1px solid red;
        }
        a:link {
            color:#000;
            text-decoration:none;
        }
        a:visited {
            color:#000;
            text-decoration:none;
        }
        a:hover {
            color:#000;
            text-decoration:none;
        }
        a:active {
            color:#000;
            text-decoration:none;
    </style>
</head>
<body>
<center>
    <h2>SISTEMA PHP CADASTROS</h2>
    <table colspan="1" cellpadding="15" cellspacing="1">
        <tr style="background-color: darkolivegreen;font-weight: bold;">
            <td><a href="index.php">HOME</a></td>
            <td><a href="atores.php?acao=2">ATORES</a></td>
            <td><a href="categorias.php?acao=2">CATEGORIAS</a></td>
            <td><a href="cinemas.php?acao=2">CINEMAS</a></td>
            <td><a href="estudios.php?acao=2">ESTUDIOS</a></td>
            <td><a href="filmes.php?acao=2">FILMES</a></td>
            <td><a href="horarios.php?acao=2">HORARIOS</a></td>
            <td><a href="personagens.php?acao=2">PERSONAGENS</a></td>
        </tr>
    </table>
    <br><br>
    <h1>Bem Vindo</h1>
</center>
</body>
</html>