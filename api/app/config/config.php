<?php
/**
 * Configurações do sistema.
 */

define('BASE_URL', '/aula09_bd'); // Local
// define('BASE_URL', null); // Online

/**
 * Método usado para requerir a URL.
 *
 * @var string
 */
$metodo = $_SERVER['REQUEST_METHOD'];

/**
 * Remove a BASE_URL da URI.
 *
 * @var string
 */
$uriSemBase = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);

/**
 * Divide a URL em partes usando a barra como delimitador.
 *
 * @var array
 */
$uriDividida = explode('/', trim($uriSemBase, '/'));

/**
 * Recurso solicitado.
 *
 * @var string
 */
$recurso = $uriDividida[0] ?? '';

/**
 * Ação solicitada.
 *
 * @var string
 */
$acao = $uriDividida[1] ?? '';

/**
 * ID do recurso solicitado.
 *
 * @var string
 */
$id = $uriDividida[2] ?? '';