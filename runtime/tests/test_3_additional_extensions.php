<?php declare(strict_types=1);

$extensions = [
    'cURL' => function_exists('curl_init'),
    'json' => json_encode(['json' => 'bref']) === '{"json":"bref"}',
    'bcmath' => bcadd('4', '5') === '9',
    'ctype' => ctype_digit('4'),
    'dom' => class_exists(\DOMDocument::class),
    'exif' => function_exists('exif_imagetype'),
    'fileinfo' => function_exists('finfo_file'),
    'ftp' => function_exists('ftp_connect'),
    'gettext' => gettext('gettext extension') === 'gettext extension',
    'iconv' => iconv_strlen('12characters') === 12,
    'mbstring' => mb_strlen('12characters') === 12,
    'mysqli' => function_exists('mysqli_connect'),
    'opcache' => ini_get('opcache.enable') == 1 && ini_get('opcache.enable_cli') == 1,
    'pdo' => class_exists(\PDO::class),
    'pdo_mysql' => extension_loaded('pdo_mysql'),
    'pdo_sqlite' => extension_loaded('pdo_sqlite'),
    'phar' => extension_loaded('phar'),
    'posix' => function_exists('posix_getpgid'),
    'simplexml' => class_exists(\SimpleXMLElement::class),
    'sodium' => defined('PASSWORD_ARGON2I'),
    'soap' => class_exists(\SoapClient::class),
    'sockets' => function_exists('socket_connect'),
    'spl' => class_exists(\SplQueue::class),
    'sqlite3' => class_exists(\SQLite3::class),
    'tokenizer' => function_exists('token_get_all'),
    'xml' => function_exists('xml_parse'),
    'xmlreader' => class_exists(\XMLReader::class),
    'xmlwriter' => class_exists(\XMLWriter::class),
    'xsl' => class_exists(\XSLTProcessor::class),
];

foreach ($extensions as $extension => $test) {
    if (! $test) {
        throw new Exception($extension . ' extension was not loaded');
    }

    echo "\033[36m [Extra] $extension ✓!\033[0m" . PHP_EOL;
}