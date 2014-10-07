<?
$FILE_KEY = $_SERVER['REQUEST_URI'];

// PDF_FILES DICTIONARY
$PDF_SETS["/pdf/zh-hk"]='https://bitly.com/umbrella-story-ZH-autoexport';
$PDF_SETS["/pdf/en"]='https://bitly.com/umbrella-story-EN-autoexport';
$PDF_SETS["/pdf/fr"]='https://bitly.com/umbrella-story-FR-autoexport';
$PDF_SETS["/pdf/jp"]='https://bitly.com/umbrella-story-JP-autoexport';
$PDF_SETS["/pdf/da"]='https://bitly.com/umbrella-story-DA-autoexport';
$PDF_SETS["/pdf/kr"]='https://bitly.com/umbrella-story-KR-autoexport';
$PDF_SETS["/pdf/es"]='https://bitly.com/umbrella-story-ES-autoexport';
$PDF_SETS["/pdf/de"]='https://bitly.com/umbrella-story-DE-autoexport';

if (array_key_exists($FILE_KEY, $PDF_SETS)) {
  $redirectURL = $PDF_SETS[$FILE_KEY];
  header('Location: '.$redirectURL);
} else {

  header('Location: '.'/error.php?errorcode=404');
  echo "Error: 404";
  
  exit();
}
?>