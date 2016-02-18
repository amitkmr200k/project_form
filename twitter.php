<?php
require_once 'TwitterAPIExchange.php';

$settings = array(
             'oauth_access_token'        => '2281867220-Rj4T5D8xcFRPKona5eqhd648ZuCYh1MUVFeXeDQ',
             'oauth_access_token_secret' => 'R5YvpR92emDR4pTkukkZuGCiZ1sQvfGh1SAtR8sFrnyuc',
             'consumer_key'              => 'uiVNQHuBMjwazgE7T5imeZPQf',
             'consumer_secret'           => 'FHO49oUBjEk6dr032tGdbOoL0zC9W62aNXDVopDjhuzkZFaHUT'
            );

$url           = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$requestMethod = 'GET';

if (isset($_POST['user_name']))
{
    $user = $_POST['user_name'];
}
else
{
    $user = 'amitkmr200k';
}

$count    = 10;
$getfield = '?screen_name='.$user.'&count='.$count;
$twitter  = new TwitterAPIExchange($settings);
$string   = json_decode($twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest(), $assoc = true);
if ($string['errors'][0]['message'] != '')
{
    echo '<h3>Sorry, there was a problem.</h3><p>Twitter
    returned the following error message:</p><p><em>'
    .$string[errors][0]['message'].'</em></p>';
    exit();
}

$s = '';
$i = 1;

foreach ($string as $items)
{
    $user        = '<span class="tweets">Tweeted by: </span>'
    .$items['user']['name']. '<br/>';
    $screen_name = '<span class="tweets">Screen name: </span>'
    .$items['user']['screen_name']. '<br /><hr/>';
    $s          .= '<span class="tweets">Time and Date of Tweet: </span>'
    .$items['created_at']. '<br />';
    $s          .= '<span class="tweets">Tweet ' .$i. ': </span>'
    .$items['text']. '<br/><hr/>';
    $i++;
}

$a['tweet'] = $user.$screen_name.$s;

echo json_encode($a);
