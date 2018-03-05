# Smartsms
A flexible PHP library for smartsms solutions
## Installation
`composer require coderatio/smartsms`
## Usage
```php
require 'vendor/autoload.php';
use Coderatio\Smartsms\Smartsms;
$token = "XXXXXXXXXXXXXXXXXXXXXXXX";

$sms = Smartsms::init($token)->to(XXXXX)->from("Valuebeam")
    ->send("I would love to see you at the office by 4pm today.");
    
echo $sms->response;
// OR

echo $sms->response();
```

## Available methods

```php
$sms->message(); // Takes the message you want to send
$sms->sender(); // Takes the sender name. Same as from();
```

## Available Properties
```php
$sms->url; // Get or set new api url.
$sms->routing; // Get default routing or set new one.
```
## Upgrades
1. Sending group of numbers with names
2. Sending from a csv, excel, txt or pdf file
3. Scheduling messages
