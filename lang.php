<?
// The language localization helper
// requires $preferred_lang

// Configs
$DEFAULT_LOCALE_FLIE = 'locale/en.php';
$DEFAULT_LANG = "en";


if (!isset($preferred_lang)) {
  $preferred_lang = $DEFAULT_LANG;
}

// include defalt and cache it first
include ($DEFAULT_LOCALE_FLIE);
$default_localize_string = $localized_string;

// Include preferred string array
$s_localefile = 'locale/' . $preferred_lang. '.php';
if (file_exists($s_localefile)) {
  include ($s_localefile);
} else {
  include ($DEFAULT_LOCALE_FLIE);
}

// Helper function

function LOCALE($key) {
  global $localized_string;
  if (isset($localized_string)) {

      if (array_key_exists($key, $localized_string)) {
        // successful find a localized string
        return  ($localized_string[$key]);
      } else {
        // oh, use default string
          if (array_key_exists($key, $default_localize_string)){        
            return  ($default_localize_string[$key]);
          } else {
            return ""; // cannot find localized string
          }

      }
  } else {
    return ""; // sorry ~ cannot find localized file
  }
}
?>