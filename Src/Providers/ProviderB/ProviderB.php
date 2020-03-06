<?php

namespace Src\Providers\ProviderB;

use Src\Providers\Providers;

class ProviderB extends Providers
{
    public $providerApi = 'http://www.mocky.io/v2/5e4010ad3300004200b04d15';

    public function mapResponse()
    {
        return [
            'hotel_name' => 'hotelName',
            'hotel_rating' => 'Rate',
            'hotel_fare' => 'Price'
        ];
    }
}
