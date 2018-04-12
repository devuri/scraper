<?php
require "_DIR_/../autoload.php";

use Lib\DOMScraper;
use Lib\Golfers;

/**
* Example using ESPN's golf leaderbaord
* to grab the current golf tournament.
*/

$url = "http://www.espn.com/golf/leaderboard";
$XPath = "//div[@class='tab-pane active']/h1";

$data = new DOMScraper($url);
$tournament = $data->getTextContent($XPath);

echo "The most-recent golf tournament is {$tournament[0]}\n";
