<?
$FILE_KEY = $_SERVER['REQUEST_URI'];

// PDF_FILES DICTIONARY
$PDF_SETS["/pdf/zh-hk"]='http://bit.ly/umbrella-story-ZH-2014-10-06-0216';
$PDF_SETS["/pdf/en"]='http://bit.ly/umbrella-story-EN-2014-10-05-2317';
$PDF_SETS["/pdf/fr"]='http://bit.ly/umbrella-story-FR-2014-10-06-0002';

if (array_key_exists($FILE_KEY, $PDF_SETS)) {
  $redirectURL = $PDF_SETS[$FILE_KEY];
  header('Location: '.$redirectURL);
} else {

  header('Location: '.'/error.php?errorcode=404');
  echo "Error: 404";
  
  exit();
}
?>