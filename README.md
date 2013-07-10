SensioBuzzBundle
================

This bundle provides a simple integration of the "[Buzz
library](https://github.com/kriswallsmith/Buzz)" from Kris Wallsmith into Symfony2. Buzz is a
lightweight PHP 5.3 library for issuing HTTP requests. You can find more
information about Buzz on its dedicated page at
https://github.com/kriswallsmith/Buzz.

``` php
<?php

$buzz = $this->container->get('buzz');
````

The bundle provides a new `buzz` service that returns an instance of
`Buzz\Browser`.

## Installation

To install this bundle, you'll need both the [Buzz library](https://github.com/kriswallsmith/Buzz)
and this bundle. Installation depends on how your project is setup:

### Step 1: Installation using the `bin/vendors.php` method

If you're using the `bin/vendors.php` method to manage your vendor libraries,
add the following entries to the `deps` file at the root of your project file:

```
[buzz]
    git=http://github.com/kriswallsmith/Buzz.git

[SensioBuzzBundle]
    git=http://github.com/sensio/SensioBuzzBundle.git
    target=bundles/Sensio/Bundle/BuzzBundle
```

Next, update your vendors by running:

``` bash
$ ./bin/vendors install
```

Great! Now skip down to *Step 2*.

### Step 1 (alternative): Installation with submodules

If you're managing your vendor libraries with submodules, simply add the two
following submodules:

``` bash
$ git submodule add git://github.com/kriswallsmith/Buzz.git vendor/buzz
$ git submodule add git://github.com/sensio/SensioBuzzBundle.git vendor/bundles/Sensio/Bundle/BuzzBundle
```

Finally update your submodules:

``` bash
$ git submodule init
$ git submodule update
```

### Step2: Configure the autoloader

Add the following entries to your autoloader:

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...

    'Buzz'          => __DIR__.'/../vendor/buzz/lib',
    'Sensio'        => __DIR__.'/../vendor/bundles',
));
```

### Step3: Enable the bundle

Finally, enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...

        new Sensio\Bundle\BuzzBundle\SensioBuzzBundle(),
    );
}
```

Congratulations! You're ready to use Buzz into Symfony2!

## Basic Usage

The only thing to do is to request the `buzz` service from the container to get
an instance of `Buzz\Browser` and start issuing HTTP requests:

``` php
<?php

$buzz = $this->container->get('buzz');

$response = $buzz->get('http://google.com');

echo $response->getContent();
```

## Configuration

By default, this bundle configures Buzz to perform HTTP requests with the cURL
extension. You must check that the cURL PHP extension is correctly installed on
your platform:

``` console
$ php -i | grep curl
```
