# Smartsms
A flexible PHP library for smartsms solutions

# Installation

`composer require coderatio/smartsms`

# Usage

```php
require('vendor/autoload.php');

use Coderatio\Smartsms\Smartsms;

$config['token'] = env('SMARTSMS_TOKEN'); 
// Or 
$config['token'] = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";

$sms = Smartsms::init($config)
    ->to('XXX-XX-XXXX-XXXX')
    ->from('Coderatio')
    ->message('I have installed the library.')
    ->send();
    
```
# Response
The library returns json and object response type.

```php
$sms->asObject(); //Returns response as object

$sms->response(); //Returns as json.
```

# Todo
1. Send sms from files (txt, pdf, docs, .xls)
2. Test (Phpunit)
