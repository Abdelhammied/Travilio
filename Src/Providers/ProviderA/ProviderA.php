<?php

namespace Src\Providers\ProviderA;

use Src\Providers\Providers;

class ProviderA extends Providers
{
    public $providerApi = 'http://www.mocky.io/v2/5e400f423300005500b04d0c';

    public function mapResponse()
    {
        return [
            'hotel_name' => 'Hotel',
            'hotel_rating' => 'Rate',
            'hotel_fare' => 'Fare'
        ];
    }
}
