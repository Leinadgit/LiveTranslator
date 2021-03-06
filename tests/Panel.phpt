<?php

use Tester\Assert;
$container = require __DIR__ . '/bootstrap.application.php';

require __DIR__.'/storage/simple.php';

$trans = new \LiveTranslator\Translator('en', new SimpleStorage, $container->session, $container->application);
$panel = new \LiveTranslator\Panel($trans, $container->httpRequest);

Assert::type('LiveTranslator\Translator', $panel->getTranslator());
$panel->setLayout('horizontal')
	->setHeight(500);

Assert::equal('horizontal', $panel->getLayout());
Assert::equal(500, $panel->getHeight());
Assert::exception(function() use($panel){
	$panel->setLayout('nothing');
}, 'Nette\InvalidArgumentException');

Assert::true(is_string($panel->getTab()));
Assert::true(is_string($panel->getPanel()));

$trans->setCurrentLang('de');
Assert::true(is_string($panel->getPanel()));
