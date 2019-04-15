<?php 

/**
 * Contoh Scrapiing pada tokopedia
 * - Mendapatkan judul produk dengan inputan adalah URL detail produk
 */
define('BASE_DIR', dirname(__DIR__));
require BASE_DIR . '/vendor/autoload.php';

use Goutte\Client;

$url = "https://www.tokopedia.com/csiindo/samsung-galaxy-note-9-128gb-handphone-bekas-grade-c?src=topads";
$css_selector_judul = "h1.rvm-product-title";
$css_selector_deskripsi = ".product-summary__content.active";
$css_selector_img = ".content-img-relative img";
$css_selector_harga = ".rvm-price.mr-15 span";

$thing_to_scrape = "_text";
$thing_to_scrape_img = "src";

$client = new Client();
$crawler = $client->request('GET', $url);
$judul = $crawler->filter($css_selector_judul)->extract($thing_to_scrape);
$deskripsi = $crawler->filter($css_selector_deskripsi)->extract($thing_to_scrape);
$img = $crawler->filter($css_selector_img)->extract($thing_to_scrape_img);
$harga = $crawler->filter($css_selector_harga)->extract($thing_to_scrape);

$tokped = array(
                    'judul'=> $judul[0],
                    'deskripsi' => $deskripsi[0],
                    'image' => $img,
                    'harga' => $harga[1]
);
echo json_encode($tokped);

?>
