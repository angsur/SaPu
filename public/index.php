<?php 

/**
 * Contoh Scrapiing pada tokopedia
 * - Mendapatkan judul produk dengan inputan adalah URL detail produk
 */
define('BASE_DIR', dirname(__DIR__));
require BASE_DIR . '/vendor/autoload.php';

use Goutte\Client;

$url = "https://www.tokopedia.com/csiindo/samsung-galaxy-note-9-128gb-handphone-bekas-grade-c?src=topads";
$css_selector = "h1.rvm-product-title";
$thing_to_scrape = "_text";

$client = new Client();
$crawler = $client->request('GET', $url);
$output = $crawler->filter($css_selector)->extract($thing_to_scrape);

var_dump($output);

?>
