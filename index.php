<?php
use Symfony\Component\Yaml\Yaml;

// Twig テンプレートエンジン
$twig = require_once('./lib/init.php');

// ブログ RDF 取得
$rdf = simplexml_load_file('http://lafino-softtennis.officialblog.jp/index.rdf');

// 設定ファイル読込
$datas = Yaml::parse(file_get_contents('./config/home.yml'));

echo $twig->render('pages/home/home.html.twig', compact('rdf', 'datas'));
