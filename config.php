<?
// Put down all configs in the file.

$PERMITTED_LANG = array("zh-hk","en","fr","de","da","th","es","jp");

function is_permitted_lang($test_lang) {
    global $PERMITTED_LANG;
    return in_array($test_lang, $PERMITTED_LANG);
}

$IMAGE_URL_PREFIX = 'https://dfg63nb4d89j7.cloudfront.net/';

$IMAGE_ZH_JSON = generate_image_json($IMAGE_URL_PREFIX, "zh-hk", 28);
$IMAGE_EN_JSON = generate_image_json($IMAGE_URL_PREFIX, "en", 28);
$IMAGE_FR_JSON = generate_image_json($IMAGE_URL_PREFIX, "fr", 28);
$IMAGE_DE_JSON = generate_image_json($IMAGE_URL_PREFIX, "de", 28);
$IMAGE_DA_JSON = generate_image_json($IMAGE_URL_PREFIX, "da", 28);
$IMAGE_TH_JSON = generate_image_json($IMAGE_URL_PREFIX, "th", 28);
$IMAGE_ES_JSON = generate_image_json($IMAGE_URL_PREFIX, "es", 28);
$IMAGE_JP_JSON = generate_image_json($IMAGE_URL_PREFIX, "jp", 28);


function generate_image_json ($prefix_url, $lang ,$count) {

    $result_json .= '[';
    for ($i = 1; $i<=$count; $i++) {
        $result_json .= '{';
        $result_json .= '"src":"'.$prefix_url.$lang.'/md/'.$i.'.png",';
        $result_json .= '"thumb":"'.$prefix_url.$lang.'/sm/'.$i.'.png",';
        $result_json .= '"mobileSrc":"'.$prefix_url.$lang.'/sm/'.$i.'.png"';
        $result_json .= '}';

        if ($i != $count) {$result_json .= ',';}
    }
    $result_json .= ']';

    return $result_json;

}
?>