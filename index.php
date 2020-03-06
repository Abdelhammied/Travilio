<?php

use Src\Providers\ProviderA\ProviderA;
use Src\Providers\ProviderB\ProviderB;

require './init.php';

$provider_a = new ProviderA;
$provider_b = new ProviderB;

$provider_a_hotels = $provider_a->getResponseBody();
$provider_b_hotels = $provider_b->getResponseBody();

$hotels = [];

foreach ($provider_a_hotels as $provider_a_hotel) {
    array_push($hotels, [
        'hotel_name' => $provider_a_hotel->{map($provider_a, 'hotel_name')},
        'hotel_rating' => $provider_a_hotel->{map($provider_a, 'hotel_rating')},
        'hotel_fare' => $provider_a_hotel->{map($provider_a, 'hotel_fare')},
    ]);
}

foreach ($provider_b_hotels as $provider_b_hotel) {
    array_push($hotels, [
        'hotel_name' => $provider_b_hotel->{map($provider_b, 'hotel_name')},
        'hotel_rating' => handleStarsResponse($provider_b_hotel->{map($provider_b, 'hotel_rating')}),
        'hotel_fare' => $provider_b_hotel->{map($provider_b, 'hotel_fare')},
    ]);
}

$hotel_rating = array_column($hotels, 'hotel_rating');

array_multisort($hotel_rating, SORT_DESC, $hotels);

return response($hotels);
