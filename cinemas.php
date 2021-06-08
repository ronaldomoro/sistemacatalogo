<?php
require_once "./CLASS/Conexao.php";
require_once "./CLASS/Crud.php";

// Consumindo m�todos do CRUD gen�rico

// Atribui uma conex�o PDO
$pdo = Conexao::getInstance();

// Atribui uma inst�ncia da classe Crud, passando como par�metro a conex�o PDO e o nome da tabela
$crud = Crud::getInstance($pdo, 'cinema');

if($_GET['acao'] == 1){
    if($_POST){
        // Inseri os dados do usu�rio
        $arrayContato = [
            'nome' => $_POST['nome'],
            'endereco' => $_POST['endereco'],
        ];

        $retorno   = $crud->insert($arrayContato);

        echo "<script>alert('Registro inserido com sucesso');location.href='cinemas.php?acao=2'</script>";
    }
}elseif($_GET['acao'] == 3){

    // Consulta os dados do usu�rio com id 1 e privilegio A
    $sql = "SELECT * FROM cinema WHERE cod = ?";
    $arrayParam = array(@$_GET['cod']);

    $registros = $crud->getAll();
    $dados = $crud->getSQLGeneric($sql, $arrayParam, FALSE);

    if($_POST) {
        // Inseri os dados do usu�rio
        $arrayContato = [
            'nome' => $_POST['nome'],
            'endereco' => $_POST['endereco'],
        ];

        $arrayCondicao = array('cod=' => $_POST['cod']);

        $retorno = $crud->update($arrayContato, $arrayCondicao);

        echo "<script>alert('Registro atualizado com sucesso');location.href='cinemas.php?acao=2'</script>";

    }
}elseif($_GET['acao'] == 4){
    // Exclui o registro do usu�rio com id 1
    $arrayCondicao = array('cod=' => $_GET['cod']);
    $retorno = $crud->delete($arrayCondicao);

    echo "<script>alert('Registro excluido com sucesso');location.href='cinemas.php?acao=2'</script>";

}

$registros = $crud->getAll();

?>
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
    <?php if($_GET['acao'] == 3): ?>
    <form name="form" method="post" action="?acao=3">
        <input type="hidden" name="cod" value="<?= $dados->cod ?>">
        <?php else: ?>
        <form name="form" method="post" action="?acao=1">
            <?php endif; ?>
            <table cellpadding="5">
                <tr>
                    <td>NOME:</td>
                    <td><input type="text" name="nome" value="<?= ($_GET['acao'] == 3) ? $dados->nome : NULL ?>"></td>
                </tr>
                <tr>
                    <td>ENDERECO:</td>
                    <td><input type="text" name="endereco" value="<?= ($_GET['acao'] == 3) ? $dados->endereco : NULL ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Salvar"></td>
                </tr>
            </table>
        </form>
        <br>
        <table cellpadding="5">
            <tr>
                <td>COD</td>
                <td>NOME</td>
                <td>ENDERECO</td>
                <td colspan="2">ACAO</td>
            </tr>
            <?php if(count($registros) > 0): ?>
                <?php foreach($registros as $registro): ?>
                    <tr>
                        <td><?= $registro->cod; ?></td>
                        <td><?= $registro->nome; ?></td>
                        <td><?= $registro->endereco; ?></td>
                        <td><a href="?acao=3&cod=<?= $registro->cod ?>">Editar</a></td>
                        <td><a href="?acao=4&cod=<?= $registro->cod ?>">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">NENHUM REGISTRO INSERIDO</td>
                </tr>
            <?php endif; ?>
        </table>
</center>
</body>
</html>