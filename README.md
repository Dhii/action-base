# Dhii - Action Base

[![Build Status](https://travis-ci.org/Dhii/action-base.svg?branch=develop)](https://travis-ci.org/Dhii/action-base)
[![Code Climate](https://codeclimate.com/github/Dhii/action-base/badges/gpa.svg)](https://codeclimate.com/github/Dhii/action-base)
[![Test Coverage](https://codeclimate.com/github/Dhii/action-base/badges/coverage.svg)](https://codeclimate.com/github/Dhii/action-base/coverage)
[![Latest Stable Version](https://poser.pugx.org/dhii/action-base/version)](https://packagist.org/packages/dhii/action-base)
[![Latest Unstable Version](https://poser.pugx.org/dhii/action-base/v/unstable)](https://packagist.org/packages/dhii/action-base)
[![This package complies with Dhii standards](https://img.shields.io/badge/Dhii-Compliant-green.svg?style=flat-square)][Dhii]

## Details
Base implementations related to actions.

### Classes
- [`RunException`][] - An exception that occurs during an action run.
- [`CouldNotRunException`] - An exception that occurs when an action cannot be run.

### Traits
- [`CreateRunExceptionCapableTrait`][] - Creates Run exceptions.
- [`CreateCouldNotRunExceptionCapableTrait`][] - Creates Could Not Run exceptions.

[Dhii]: https://github.com/Dhii/dhii

[`RunException`]:                                       src/Exception/RunException.php
[`CouldNotRunException`]:                               src/Exception/CouldNotRunException.php

[`CreateRunExceptionCapableTrait`]:                     src/CreateRunExceptionCapableTrait.php
[`CreateCouldNotRunExceptionCapableTrait`]:             src/CreateCouldNotRunExceptionCapableTrait.php
