<?
// $preferred_lang
$DEFAULT_LOCALE_FLIE = 'locale/en.php';

// include defalt and cahc it first
  require_once ($DEFAULT_LOCALE_FLIE);
  $default_localize_string = $localized_string;


$s_localefile = 'locale/' . $preferred_lang. '.php';
if (file_exists($s_localefile)) {
  require_once ($s_localefile);
} else {
  require_once ($DEFAULT_LOCALE_FLIE);
}

// Include preferred string array

// Helper function

function LOCALE($key) {
  global $localized_string;
  if (isset($localized_string) && array_key_exists($key, $localized_string)) {

      if (array_key_exists($key, $localized_string)) {
        // successful find a localized string
        return  ($localized_string[$key]);
      } else {
        // oh, use default string
          if (array_key_exists($key, $default_localize_string)){        
            return  ($default_localize_string[$key]);
          } else {
            return ""; // cannot find
          }

      }
  } else {
    return ""; // sorry ~
  }
}
?>