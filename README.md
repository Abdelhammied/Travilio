# Travillio Provider Task

### How To Create Your New Provider 
**1. Create New Class Which Extends Our Providers Abstract Class**
```php
use Src\Providers\Providers;

class NewProvider extends Providers {}
```

**2. Decleare providerApi Property and assign the provider API**
```php
    public $providerApi = 'PROVIDER_API';
```
**3. Decleare mapResponse method to map response for each provider with the same keys**
```php
    public function mapResponse()
    {
        return [
            'hotel_name' => 'HOTEL_NAME_KEY',
            'hotel_rating' => 'HOTEL_RATE_KEY',
            'hotel_fare' => 'HOTEL_FARE_KEY'
        ];
    }
```

> For Any Inquiry Please Donot Hesitate To Keep In Touch **abdelhammied@gmail.com**