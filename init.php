<?php
/**
 * Request
 * @package    CURL
 * @subpackage INIT
 * @author     julian bianqui <bianquijulian@gmail.com>
 */
//@todo create autoloader
require_once './vendor/autoload.php';
require_once './ClassRequest.class.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
$dotenv      = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$reader      = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$url         = $_ENV['url_endpoint'];
$key         = $_ENV['key'];
$spreadsheet = $reader->load("curl.xlsx");
$sheetData   = $spreadsheet->getActiveSheet()->toArray();
unset($sheetData[0]);
foreach ($sheetData as $t) {
    try {
        $url_complete = $url . "&" . $key;
        $object       = new Request($url_complete);
        $object->get(); 
    } catch (Exception $e) {
        error_log($e->getMessage());
        if (!file_exists('logs.txt')) {
            touch('error_logs.txt');
        }
        $fichero = 'error_logs.txt';
        $results = "\n results = ".$t[1]."\n";
        file_put_contents($fichero, $results, FILE_APPEND | LOCK_EX);
    } finally{
        if (!file_exists('logs.txt')) {
            touch('logs.txt');
        }
        $fichero = 'logs.txt';
        $results = "\n results = ".$t[1]."\n";
        file_put_contents($fichero, $results, FILE_APPEND | LOCK_EX);
    }
    sleep(40);
}
