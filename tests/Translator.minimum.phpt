<?php

use Tester\Assert;
$container = require __DIR__ . '/bootstrap.application.php';

require __DIR__.'/storage/dummy.php';

$trans = new \LiveTranslator\Translator('en', new DummyStorage, $container->session, $container->application);

$trans->translate('hello');
