# LARAVEL-SISTER API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mimbar/sistah.svg?style=flat-square)](https://packagist.org/packages/mimbar/sistah)
[![Total Downloads](https://img.shields.io/packagist/dt/mimbar/sistah.svg?style=flat-square)](https://packagist.org/packages/mimbar/sistah)
![GitHub Actions](https://github.com/mimbar/sistah/actions/workflows/main.yml/badge.svg)

Anda terlalu malas untuk setup http request untuk setiap project yang berhubungan dengan mengambil data pada SISTER Kemdikbud? anda tidak sendirian. Saya juga sama. Tiap bikin project yang fetch data ke kemdikbud harus create ulang. 

## Installation

You can install the package via composer:

```bash
composer require mimbar/sistah
```

## .env Setup
Kalau belum punya akunnya, hubungi ke admin master sister perguruan tinggi-nya. buatkan akun ke [Akses Kemdikbud](https://akses.kemdikbud.go.id/) atau pada halaman https://akses.kemdikbud.go.id/. Buat sebuah akun dengan roles WS-Basic.

```dotenv
# url default https://sister-api.kemdikbud.go.id, hanya diisi jika URL nya berubah (harusnya sih enggak ya!)
# SISTER_URL=

# Diisi ws jika untuk uji coba dengan data production dan sb untuk data sandbox (uji coba/testing)
# ws/sb
SISTER_SERVER=ws
SISTER_ID_PENGGUNA=
SISTER_USERNAME=
SISTER_PASSWORD=
```

## Usage

```php
// Usage description here
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email mimbar.muse@gmail.com instead of using the issue tracker.

## Credits

-   [Mimbar Adi Nugraha](https://github.com/mimbar)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


dibawah ini jangan dihapus pls.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
