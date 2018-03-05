# Smartsms
A flexible PHP library for smartsms solutions
## Installation
`composer require coderatio/smartsms`
## Usage
```php
require 'vendor/autoload.php';
use Coderatio\Smartsms\Smartsms;
$token = "XXXXXXXXXXXXXXXXXXXXXXXX";

$sms = Smartsms::init($token)->to("XXXXXXXXXXXX")->from("Valuebeam")
    ->send("I would love to see you at the office by 4pm today.");

echo $sms->response(); // Will return json

// OR

var_dump($sms->asObject()); // Will return object response

```

## Get balance

```php
echo Smartsms::init($token)->getBalance();
```

## Other methods

```php
$sms->message(); // Takes the message you want to send. Same as putting the message into send() method
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

## Contributing
Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

## How can I thank you?
Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or Facebook? Spread the word!

Don't forget to follow me on [twitter!](https://twitter.com/josiahoyahaya){:target="_blank"}

Thanks! [Josiah O. Yahaya](https://github.com/coderatio).

## License
The MIT License (MIT). Please see [License File](https://github.com/coderatio/smartsms/blob/master/LICENSE) for more information.
