<?php

require_once "./CLASS/Conexao.php";
require_once "./CLASS/Crud.php";

// Recebe o parametro de pesquisa se existir
$id = (isset($_GET['id'])) ? $_GET['id'] : '';
// Consumindo m�todos do CRUD gen�rico

// Atribui uma conex�o PDO
$pdo = Conexao::getInstance();

// Atribui uma inst�ncia da classe Crud, passando como par�metro a conex�o PDO e o nome da tabela
$crud = Crud::getInstance($pdo, 'ator');

// Consulta os dados do usu�rio com id 1 e privilegio A
$sql = "SELECT * FROM ator WHERE id = ?";
$arrayParam = array($id);
$dados = $crud->getSQLGeneric($sql, $arrayParam, FALSE);

print_r($dados);

/*//Loop foreach percorre a array para exibir os dados
print "<table border='1'>";
print "<tr>";
print "<td>Id</td>";
print "<td>Nome</td>";
print "<td>Email</td>";
print "<td>Telefone</td>";
print "</tr>";
foreach ($lista_contato as $contato):
    print "<tr>";
    print "<td><a href='#'>{$contato->id}</a></td>";
    print "<td>{$contato->nome}</td>";
    print "<td>{$contato->email}</td>";
    print "<td>{$contato->telefone}</td>";
    print "</tr>";
endforeach;
print "</table>";*/