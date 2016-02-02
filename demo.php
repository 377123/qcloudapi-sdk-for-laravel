<?php
require 'vendor/autoload.php';
use QCLOUDAPI\QcloudApi;



$config = array('SecretId'       => 'AKIDQoMIs3IgD9q36CvzC858pFZurCEot0uj',
                'SecretKey'      => 'XKolWU8DouLP5rDs0OzG2N6gktb36UXw',
                'RequestMethod'  => 'GET',
                'DefaultRegion'  => 'gz');

$cvm = QcloudApi::load(QcloudApi::MODULE_WENZHI, $config);

$package = array('text' =>'待词法分析的文本', 'Code	' => 'utf-8');

$a = $cvm->LexicalAnalysis($package);
// $a = $cvm->generateUrl('DescribeInstances', $package);

if ($a === false) {
    $error = $cvm->getError();
    echo "Error code:" . $error->getCode() . ".\n";
    echo "message:" . $error->getMessage() . ".\n";
    echo "ext:" . var_export($error->getExt(), true) . ".\n";
} else {
    var_dump($a);
}

echo "\nRequest :" . $cvm->getLastRequest();
echo "\nResponse :" . $cvm->getLastResponse();
echo "\n";