SensioBuzzBundle
================

This bundle provides a simple integration of the "[Buzz
library](https://github.com/kriswallsmith/Buzz)" from Kris Wallsmith into Symfony2. Buzz is a
lightweight PHP 5.3 library for issuing HTTP requests. You can find more
information about Buzz on its dedicated page at
https://github.com/kriswallsmith/Buzz.

    <?php

    $buzz = $this->container->get('buzz');

The bundle provides a new `buzz` service that returns an instance of
`Buzz\Browser`.

## Installation

Installing the bundle via packagist is the quickest and simplest method of installing the bundle. Here are the steps:

### Step 1: Composer require

    $ php composer.phar require "sensio/buzz-bundle":"dev-master"

### Step 2: Enable the bundle in the kernel

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Sensio\Bundle\BuzzBundle\SensioBuzzBundle(),
            // ...
        );
    }

That's it! You are ready to use Buzz with symfony2.
