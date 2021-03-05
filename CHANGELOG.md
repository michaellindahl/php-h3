# Changelog

All notable changes to `php-h3` will be documented in this file

## 2.0.0 - 2021-03-04

- Adds `ext-ffi` as a composer dependancy.
- `H3` initializer now takes the shared library name as a parameter. `H3::SO` and `H3::DYLIB` added for convenience.

## 1.0.0 - 2020-06-23

- Initial release of `php-h3` with support for `geoToH3`, `h3ToGeo`, `h3GetResolution`, `h3ToParent`, `h3IsValid`, `radsToDegs`, and `degsToRads`.
