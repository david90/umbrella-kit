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

function META_TAGS_LOCALE($key) {
  $meta_tags_array["en"] = "meta/en_US_meta.php";
  $meta_tags_array["fr"] = "meta/fr_FR_meta.php";
  $meta_tags_array["jp"] = "meta/ja_JP_meta.php";
  $meta_tags_array["zh-hk"] = "meta/zh_HK_meta.php";

  if (array_key_exists($key, $meta_tags_array)) {
    return $meta_tags_array[$key];
  } else {
    return "meta/en_US_meta.php";
  }
}

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