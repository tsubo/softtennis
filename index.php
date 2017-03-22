<?php
// Twig テンプレートエンジン
$twig = require_once('./lib/init.php');

// ブログ RDF 取得
$rdf = simplexml_load_file('http://lafino-softtennis.officialblog.jp/index.rdf');

echo $twig->render('pages/home/home.html.twig', array('rdf' => $rdf));
