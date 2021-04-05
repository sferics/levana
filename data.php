<?php
header("Content-Type: application/json; charset=utf-8");  
//header("Content-Type: text/html; charset=utf-8");   

function console_log($output, $with_script_tags = true) {
/** debug logger, source: https://stackify.com/how-to-log-to-console-in-php/
 *      console_log($variable) prints the output of var $output to the console
 *      ! inside php code "$with_script_tags" has to be true !
 *      shortcut for debug console in firefox: ctrl+shift+I
 */
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

$conn = mysqli_connect("localhost", "ssz", "im#one<3", "ssz");
mysqli_set_charset($conn, "utf8");

$result = mysqli_query($conn, "SELECT * FROM gps");
 
$data = array();

while ($row = mysqli_fetch_object($result)) {
    array_push($data, $row);
}

echo json_encode( $data );

//echo json_encode( utf8_encode($data) );
//echo json_encode($data, JSON_UNESCAPED_UNICODE);
//console_log(json_encode($data, JSON_UNESCAPED_UNICODE));
//console_log(json_encode($data));

exit();
?>
