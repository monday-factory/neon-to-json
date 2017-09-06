<?php

require __DIR__ . '/../vendor/autoload.php';

use Nette\Neon\Neon;

if (!isset($argv[1])) {
	die("\nusage: php neonToJson.php <absoluteFilePath.neon>\n\n");
}

$neonFile = $argv[1];

if (!file_exists($neonFile)) {
	die("\nFile $neonFile does not exist\n\n");
}

$outputFile = str_replace('.neon', '.json', $neonFile);

$content = Neon::decode(file_get_contents($neonFile));
file_put_contents($outputFile, json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
