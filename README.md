# league/openid-connect-claims

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

An [OpenID Connect](http://openid.net/specs/openid-connect-core-1_0.html) claims set implementation

## Install

Via Composer

``` bash
$ composer require league/openid-connect-claims
```

## Usage

```php
$claims = new \League\OpenIdConnectClaims\ClaimsSet();
$claims->setIdentifier(123);
$claims->setFirstName('Alex');
$claims->setLastName('Bilbie');
$claims->setNickname('Alex');
$claims->setUsername('alexbilbie');
$claims->setProfileUrl('http://twitter.com/alexbilbie');
$claims->setPictureUrl('https://s.gravatar.com/avatar/14902eb1dac66b8458ebbb481d80f0a3');
$claims->setWebsite('http://alexbilbie.com');
$claims->setEmail('hello@alexbilbie.com');
$claims->setEmailVerified(true);
$claims->setGender('male');
$claims->setBirthDate('YYYY', 'MM', 'DD');
$claims->setZoneInfo('Europe/London');
$claims->setLocale('en_GB');
$claims->setPhoneNumber('0303 123 7300');
$claims->setPhoneNumberVerified(true);
$claims->setAddressStreet('Buckingham Palace');
$claims->setAddressRegion('London');
$claims->setAddressPostalCode('SW1A 1AA');
$claims->setAddressCountry('United Kingdom');
```

When the ClaimsSet object is JSON encoded you will get an object similar to this:

```json
{
    "sub": "123",
    "name": "Alex Bilbie",
    "given_name": "Alex",
    "family_name": "Bilbie",
    "nickname": "Alex",
    "preferred_username": "alexbilbie",
    "profile": "http:\/\/twitter.com\/alexbilbie",
    "picture": "https:\/\/s.gravatar.com\/avatar\/14902eb1dac66b8458ebbb481d80f0a3",
    "website": "http:\/\/alexbilbie.com",
    "email": "hello@alexbilbie.com",
    "email_verified": true,
    "gender": "male",
    "birthdate": "YYYY-MM-DD",
    "zoneinfo": "Europe\/London",
    "locale": "en_GB",
    "phone_number": "0303 123 7300",
    "phone_number_verified": true,
    "address": {
        "street_address": "Buckingham Palace",
        "region": "London",
        "postal_code": "SW1A 1AA",
        "country": "United Kingdom"
    }
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email `hello@alexbilbie.com` instead of using the issue tracker.

## Credits

- [Alex Bilbie][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/league/openid-connect-claims.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/league/openid-connect-claims/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/league/openid-connect-claims.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/league/openid-connect-claims.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/league/openid-connect-claims.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/league/openid-connect-claims
[link-travis]: https://travis-ci.org/league/openid-connect-claims
[link-scrutinizer]: https://scrutinizer-ci.com/g/league/openid-connect-claims/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/league/openid-connect-claims
[link-downloads]: https://packagist.org/packages/league/openid-connect-claims
[link-author]: https://github.com/alexbilbie
[link-contributors]: ../../contributors