<?php

require_once "./CLASS/Conexao.php";
require_once "./CLASS/Crud.php";

// Consumindo m�todos do CRUD gen�rico

// Atribui uma conex�o PDO
$pdo = Conexao::getInstance();

// Atribui uma inst�ncia da classe Crud, passando como par�metro a conex�o PDO e o nome da tabela
$crud = Crud::getInstance($pdo, 'ator');

// Inseri os dados do usu�rio
$arrayContato = [
    'nome' => 'JOSÉ DA SILVA',
];

$arrayCondicao = array('id=' => 1);
$retorno   = $crud->update($arrayContato, $arrayCondicao);

echo "<script>alert('Registro atualizado com sucesso')</script>";