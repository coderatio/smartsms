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
message(); // Takes the message you want to send
sender(); // Takes the sender name. Same as from();
```

## Available Properties
