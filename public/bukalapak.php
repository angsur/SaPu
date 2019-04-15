<?php 

/**
 * Contoh Scrapiing pada bukalapak
 * - Mendapatkan judul produk dengan inputan adalah URL detail produk
 */
define('BASE_DIR', dirname(__DIR__));
require BASE_DIR . '/vendor/autoload.php';

use Goutte\Client;

$url = "https://www.bukalapak.com/p/handphone/power-bank/16yvb12-jual-powerbank-usams-pb7-10-000mah-original?dtm_section=top_promoted&dtm_source=list-product&from=&product_owner=normal_seller";
$css_selector_judul = "h1.c-product-detail__name.qa-pd-name";
$css_selector_deskripsi = ".js-collapsible-product-detail.qa-pd-description.u-txt--break-word";
$css_selector_img = ".js-product-image-gallery__image";
$css_selector_harga = ".amount.positive";
$thing_to_scrape = "_text";
$thing_to_scrape_img = "href";

$client = new Client();
$crawler = $client->request('GET', $url);
$judul = $crawler->filter($css_selector_judul)->extract($thing_to_scrape);
$deskripsi = $crawler->filter($css_selector_deskripsi)->extract($thing_to_scrape);
$img = $crawler->filter($css_selector_img)->extract($thing_to_scrape_img);
$harga = $crawler->filter($css_selector_harga)->extract($thing_to_scrape);

$bukalapak = array(
                    'judul'=> $judul[0],
                    'deskripsi' => $deskripsi[0],
                    'image' => $img,
                    'harga' => $harga[0]
);
echo json_encode($bukalapak);

?>
