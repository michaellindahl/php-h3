# A PHP Library for H3: A Hexagonal Hierarchical Geospatial Indexing System

This project utilizes FFI to create a clean PHP wrapper around Uber's H3 C Library. The goal of this library is to minimize the complexity of creating a PHP extension and increase understanding of how this works to delegate to the C Library.

## Use

The test are a great place to look to see each of the supported methods in action. Not all methods of the library are supported, but please feel free to PR any missing methods that you may need.

```
$h3 = new MichaelLindahl\H3\H3();
$h3Index = $h3->geoToH3(40.689421843699, -74.044431399909, 10);

// $h3Index: '8a2a1072b59ffff'
```

## Structure

This package is structed with `H3.php` as the main entry point and shared location of the `typedefs` used throughout the library. Each section of the [API Reference](https://h3geo.org/docs/api) is given it's own `Trait` and `Test` file to help maintain organization.

## Contributions

Contributions are welcomed. Please be kind, both in reviewing and contributing. Follow the project goals. And include tests.