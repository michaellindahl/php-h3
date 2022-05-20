# A PHP Library for H3: A Hexagonal Hierarchical Geospatial Indexing System

This project utilizes FFI to create a clean PHP wrapper around Uber's H3 C Library. The goal of this library is to minimize the complexity of creating a PHP extension and increase understanding of how this works to delegate to the C Library. This library requires PHP 7.4 since it uses FFI.

## Use

The test are a great place to look to see each of the supported methods in action. Currently, not all methods of the library are supported, but please feel free to PR any missing methods that you may need.

```
$h3 = new MichaelLindahl\H3\H3(H3::DYLIB);
$h3Index = $h3->geoToH3(40.689421843699, -74.044431399909, 10);

// $h3Index: '8a2a1072b59ffff'
```

## Structure

This package is structed with `H3.php` as the main entry point and shared location of the `typedefs` used throughout the library. Each section of the [API Reference](https://h3geo.org/docs/api) is given it's own `Trait` and `Test` file to help maintain organization.

## Requirements

- This repository requires that the version 3 of the [Uber H3](https://github.com/uber/H3) C Library be installed on your machine. The following are known installation methods for various platforms:

### macOS

```
brew install h3
```

### Ubuntu / Forge

```
sudo apt install cmake --assume-yes

git clone https://github.com/uber/h3.git
cd h3
git checkout stable-3.x

cmake -DBUILD_SHARED_LIBS=ON .
make -j4
sudo make install

sudo apt remove cmake --assume-yes

sudo cp /usr/local/lib/libh3.* /usr/lib/
sudo ldconfig
```

### AWS / Vapor

See my fork of `laravel/vapor-php-build` [here](https://github.com/michaellindahl/vapor-php-build/tree/uber-h3).

## Contributions

Contributions are welcomed. Please be kind, both in reviewing and contributing. Follow the project goals. And include tests.

## FFI / Preloading References:

Here are two articles that really helped my understanding of FFI and preloading:

- [PHPun with FFI: C PHP run](https://platform.sh/blog/2020/php-fun-with-ffi-c-php-run/)
- [Introduction to PHP FFI](https://dev.to/verkkokauppacom/introduction-to-php-ffi-po3)

## Alternatives

- [neatlife/php-h3](https://github.com/neatlife/php-h3)

