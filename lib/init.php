<?php
require_once './vendor/autoload.php';

/*
 * 定数定義
 */
// assets ファイル格納先 URL（Future Shop の SSL 領域に assets ファイルを格納している）
define('ASSETS_URL', 'https://secure1.future-shop.jp/~softtennis');
define('CATEGORIES_URL', 'http://www.softtennis-lafino.jp/fs/softtennis/c');

/*
 * Twig テンプレートエンジン
 */
$loader = new Twig_Loader_Filesystem('./templates');
// ユーザーのITリテラシが必要なのでキャッシュは使わないことにする
// $twig = new Twig_Environment($loader, array(
//     'cache' => '/path/to/compilation_cache',
// ));
$twig = new Twig_Environment($loader);

/*
 * 関数定義
 */
// Future Shop SSL 領域のURL　を返す
$function = new Twig_SimpleFunction('ssl_url', function($path) {
  if (substr($path, 0, 1) != '/') {
    $path = '/' . $path;
  }
  return ASSETS_URL . $path;
});
$twig->addFunction($function);

$function = new Twig_SimpleFunction('cat_url', function($path) {
  if (substr($path, 0, 1) != '/') {
    $path = '/' . $path;
  }
  return CATEGORIES_URL . $path;
});
$twig->addFunction($function);

return $twig;
