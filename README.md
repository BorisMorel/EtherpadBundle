# EtherpadBundle

EtherpadBundle allows to use, in Symfony2 context, all Etherpad-lite [API](https://github.com/ether/etherpad-lite/wiki/HTTP-API) functions.

## Contact

Nick: aways
IRC: irc.freenode.net - #symfony-fr

## Install

1. Download with composer
1. Enable the Bundle
1. How to use ?

### Get the Bundle

### Composer
Add EtherpadBundle in your project's `composer.json`

```json
{
    "require": {
        "imag/etherpad-bundle": "2.0.*@stable"
    }
}
```

### Enable the Bundle

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new IMAG\EtherpadBundle\IMAGEtherpadBundle(),
    );
}
```

### How to use it ? ###

The documentation is [here](https://github.com/BorisMorel/EtherpadBundle/tree/master/Resources/Docs/Usage.md)
