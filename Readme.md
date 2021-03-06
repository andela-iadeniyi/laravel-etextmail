[![Build Status](https://travis-ci.org/andela-iadeniyi/laravel-etextmail.svg?branch=master)](https://travis-ci.org/andela-iadeniyi/laravel-etextmail)
[![Coverage Status](https://coveralls.io/repos/github/andela-iadeniyi/laravel-etextmail/badge.svg)](https://coveralls.io/github/andela-iadeniyi/laravel-etextmail)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andela-iadeniyi/laravel-etextmail/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andela-iadeniyi/laravel-etextmail/?branch=master)
[![Code Climate](https://codeclimate.com/github/andela-iadeniyi/laravel-etextmail/badges/gpa.svg)](https://codeclimate.com/github/andela-iadeniyi/laravel-etextmail)

#Laravel-EtextMail
Laravel-etextmail is built on etextmail api (http://etextmail.com) which is an SMS gateway to send sms messages to cell phones on GSM and CDMA networks, Glo, MTN, Zain, Etisalat, Starcomms, Visafone in Nigeria and Globally.

To get the latest version of laravel-etextmail, simply 

```php
composer require ibonly\laravel-etextmail
```
Or include 
```php
"ibonly/laravel-etextmail: 1.0.*"
```
to your composer.json file and run `composer update` or `composer install`

Once Laravel EtextMail is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.
```php
 Ibonly\EtextMail\EtextMailServiceProvider::class,
```

Also, register the Facade like so:

```php
'aliases' => [
    ...
    'EtextMail' => Ibonly\EtextMail\Facades\EtextMail::class,
    ...
]
```

#configuration (step 1)
Publish configuration file using the command bellow:
```php
php artisan vendor:publish --provider="Ibonly\EtextMail\EtextMailServiceProvider"
```
A file `etextmail.php` containing default configuration settings will be added to `config/` directory.
```php
return [
    'senderid' => getenv('ETEXTMAIL_SENDER'),

    'username' => getenv('ETEXTMAIL_EMAIL'),

    'password' => getenv('EXTEXTMAIL_PASSWORD'),

    'url'      => getenv('ETEXTMAIL_URL'),
];
```
##configuration (step 2)
Open your .env file and add your `SMS Sender Id`, `etextmail email`, `etextmail password` and `etextmail url`:
```php
ETEXTMAIL_SENDER=xxxxx
ETEXTMAIL_EMAIL=xxxxx
EXTEXTMAIL_PASSWORD=xxxxx
ETEXTMAIL_URL=http://mail.etextmail.com
```
Note that resellers are to use their own url.

##usage


```php
use EtextMail;

class SMS
{
	/**
	 * @return float
	 */
	public function getSMSBalance()
	{
		dd(EtextMail::getCreditBalance())
	}

	/**
	 * @param  $message [the message to be processed]
	 * @return int
	 */
	public function	messageCount($message)
	{
		dd(EtextMail::getMessageCount($message));
	}

	/**
	 * @param  $message [the message to be processed]
	 * @return int
	 */
	public function characterCount($message)
	{
		dd(EtextMail::getCharacterCount($message));
	}

	/**
	 * @param  $destination [reciever's mobile number]
	 * @param  message      [the message to be processed]
	 * @return boolean
	 */
	public function sendSMS($destination, $message)
	{
		dd(EtextMail::sendMessage($destination, $message));
	}

	/**
	 * @param  $destination [reciever's mobile number]
	 * @param  $message     [the message to be processed]
	 * @param  $longSMS     [number of pages]
	 * @return boolean
	 */
	public function sendLongSMS($destination, $message, $longSMS)
	{
		dd(EtextMail::sendMessage($destination, $message, $longSMS))
	}
	
	
}
```

## Testing

```
$ vendor/bin/phpunit test
```

## Contributing

To contribute and extend the scope of this package,
Please check out [CONTRIBUTING](CONTRIBUTING.md) file for detailed contribution guidelines.
Feel free to raise any issue or concern.

## Credits

Laravel-etextmail is created and maintained by `Ibraheem ADENIYI`.
