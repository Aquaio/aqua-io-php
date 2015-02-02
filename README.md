# aqua-api-library-php

Official Aqua-io API library client for PHP. Currently covers Aqua.io's ICD-9 and ICD-10 APIs.

## Getting Started

To use the Aqua.io API, you need to have proper API credentials, which you can get for free by [signing up](https://aqua.io/developers/sign_up).

You may also want to read up on [the API documentation](https://aqua.io/codes).

__This library is generated by [alpaca](https://github.com/pksunkara/alpaca)__

## Installation

Make sure you have [composer](https://getcomposer.org) installed.

Add the following to your composer.json

```js
{
    "require": {
        "aquaio/aqua-io": "*"
    }
}
```

Update your dependencies

```bash
$ php composer.phar update
```

> This package follows the `PSR-0` convention names for its classes, which means you can easily integrate these classes loading in your own autoloader.

#### Versions

Works with [ 5.4 / 5.5 ]

## Usage

```php
<?php

// This file is generated by Composer
require_once 'vendor/autoload.php';

// Then we instantiate a client (as shown below)
```

### Build a client

##### Get an access token using your aqua.io credentials

```php
$auth = array('client_id' => '09a8b7', 'client_secret' => '1a2b3');

$client = new AquaIo\Client($auth, $clientOptions);

$token = $client->accessToken()->retrieve()->body['access_token']
```

##### All other API calls require an access token

```php
$client = new AquaIo\Client($token, $clientOptions);
```

### Client Options

The following options are available while instantiating a client:

 * __base__: Base url for the api
 * __user_agent__: Default user-agent for all requests
 * __headers__: Default headers for all requests
 * __request_type__: Default format of the request body

### Response information

__All the callbacks provided to an api call will receive the response as shown below__

```php
$response = $client->klass('args')->method('args', $methodOptions);

$response->code;
// >>> 200

$response->headers;
// >>> array('x-server' => 'apache')
```

##### JSON response

When the response sent by server is __json__, it is decoded into an array

```php
$response->body;
// >>> array('user' => 'pksunkara')
```

### Method Options

The following options are available while calling a method of an api:

 * __headers__: Headers for the request
 * __query__: Query parameters for the url
 * __body__: Body of the request
 * __request_type__: Format of the request body

### ICD-9 api

Returns an ICD-9 code.

```php
$icd9 = $client->icd9();
```

##### All top-level codes (GET codes/v1/icd9)

Returns all top-level ICD-9 codes. Useful for helping a user navigate down the ICD-9 hierarchy to find a code.

```php
$response = $icd9->topLevelCodes($options);
```

##### Retrieve a single code. (GET codes/v1/icd9/:code_name)

Returns a single code matching the name, if any exists. Replace periods with hypens (e.g. '066-4' for '066.4')

The following arguments are required:

 * __code_name__: name of code

```php
$response = $icd9->singleCode("066-4", $options);
```

##### Search for codes by name. (GET codes/v1/icd9?q[name_cont]=:query)

Returns all codes whose name contains the search string.

The following arguments are required:

 * __query__: the search query string

```php
$response = $icd9->searchByName("082-2", $options);
```

##### Search for codes by description. (GET codes/v1/icd9?q[description_cont]=:query)

Returns all codes whose description contains the search string.

The following arguments are required:

 * __query__: the search query string

```php
$response = $icd9->searchByDescription("eastern equine", $options);
```

##### Search for codes by name or description. (GET codes/v1/icd9?q[name_or_description_cont]=:query)

Returns all codes whose name or description contains the search string.

The following arguments are required:

 * __query__: the search query string

```php
$response = $icd9->searchByNameOrDescription("west nile", $options);
```

### ICD-10 api

Returns an ICD-10 code.

```php
$icd10 = $client->icd10();
```

##### All top-level codes (GET codes/v1/icd10)

Returns all top-level ICD-10 codes. Useful for helping a user navigate down the ICD-10 hierarchy to find a code.

```php
$response = $icd10->topLevelCodes($options);
```

##### Retrieve a single code. (GET codes/v1/icd10/:code_name)

Returns a single code matching the name, if any exists. Replace periods with hypens (e.g. 'R50-9' for 'R50.9')

The following arguments are required:

 * __code_name__: name of code

```php
$response = $icd10->singleCode("R50-9", $options);
```

##### Search for codes by name. (GET codes/v1/icd10?q[name_cont]=:query)

Returns all codes whose name contains the search string.

The following arguments are required:

 * __query__: the search query string

```php
$response = $icd10->searchByName("b05", $options);
```

##### Search for codes by description. (GET codes/v1/icd10?q[description_cont]=:query)

Returns all codes whose description contains the search string.

The following arguments are required:

 * __query__: the search query string

```php
$response = $icd10->searchByDescription("mumps", $options);
```

##### Search for codes by name or description. (GET codes/v1/icd10?q[name_or_description_cont]=:query)

Returns all codes whose name or description contains the search string.

The following arguments are required:

 * __query__: the search query string

```php
$response = $icd10->searchByNameOrDescription("rubella", $options);
```

## Contributors
Here is a list of [Contributors](https://github.com/aquaio/aqua-io-php/contributors)

### TODO

## License
MIT

## Bug Reports
Report [here](https://github.com/aquaio/aqua-io-php/issues).

## Contact
Michael Carroll at Aqua.io

michael@aqua.io

@aqua_io

__This library initially generated by [alpaca](https://github.com/pksunkara/alpaca).__