# Simple Line Alert

Simple Line Alert is a Library for easy sending message by Line Notify API.

## Installation 

Use the package manager [composer](https://getcomposer.org/) to install Simple Line Alert.

```bash
composer i noxil/simplelinealert

php artisan vendor:publish --provider="noxil\simplelinealert\SimpleLineAlertServiceProvider" --tag="config"
```

Edit Config File at /Config/simplelinealert.php 
```bash
<?php 

return [
    'url_line_notify' => 'https://notify-api.line.me/api/notify',
    'api_key' => '', // Edit Api key from Line Notify Api
];
```

## Usage

```Laravel
use noxil\simplelinealert;
....
# returns 'resulut from Line Notify'
$sla = new SimpleLineAlert();
$sla.sendmessage('Message to sent');
....
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
