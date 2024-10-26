<?php



use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

if (getenv('JAWSDB_URL') !== false) {
    $dbparts = parse_url(getenv('JAWSDB_URL'));

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'], '/');
} else {
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'arcadia-ecf';
}



return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
