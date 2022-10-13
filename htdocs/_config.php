<?php

header('Content-Type: text/html; charset=utf-8');

date_default_timezone_set ('America/Sao_Paulo');

$site_name = "Relogios Elric";

$site_slogan = "Relógios para pessoas elegantes";
$page_content='';
$form='';

$rgpass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{7,25}$/";

$db = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/_config.ini', true);

foreach ($db as $server => $values) :

    // Se estamos no servidor correto:
    if ($server == $_SERVER['SERVER_NAME']) :

        // Conecta no banco de dados com as credenciais deste servidor:
        $conn = new mysqli($values['hostname'], $values['username'], $values['password'], $values['database']);

        // Trata possíveis exceções:
        if ($conn->connect_error) die("Falha de conexão com o banco e dados: " . $conn->connect_error);

    endif;
endforeach;

// Seta transações com MySQL/MariaDB para UTF-8:
$conn->query("SET NAMES 'utf8'");
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');

// Seta dias da semana e meses do MySQL/MariaDB para "português do Brasil":
$conn->query('SET GLOBAL lc_time_names = pt_BR');
$conn->query('SET lc_time_names = pt_BR');

// Se o cookie do usuário existe (usuário logado)...
if (isset($_COOKIE["{$site_name}_user"])) :

    // Gera array com dados do usuário, convertendo JSON em array ($user[]):
    $user = json_decode($_COOKIE["{$site_name}_user"], true);

// Se o cookie não existe (ninguém está logado)...
else :

    // Dados do usuário não exitem:
    $user = false;

endif;

function post_clean($post_field, $type = 'string')
{

    // Escolhe o tipo de filtro:
    switch ($type):
        case 'string':

            // Sanitiza strings
            $post_value = htmlspecialchars($_POST[$post_field]);
            break;

        case 'email':

            // Sanitiza endereços de e-mail
            $post_value = filter_input(INPUT_POST, $post_field, FILTER_SANITIZE_EMAIL);
            break;

    endswitch;

    // Remove excesso de espaços
    $post_value = trim($post_value);

    // Remove aspas perigosas
    $post_value = stripslashes($post_value);

    // Retorna valor do campo sanitizado
    return $post_value;
}

function debug($element, $pre = true, $stop = true)
{
    if ($pre) echo '<pre>';
    print_r($element);
    // var_dump($element);
    if ($pre) echo '</pre>';
    if ($stop) exit;
}