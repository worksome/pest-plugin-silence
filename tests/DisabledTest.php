<?php

use Worksome\PestPluginSilence\Silence;

it('does not prevent output by default', function () {
    echo 'Hello World!';
})->expectNotToPerformAssertions();

it('does not prevent output when preventOutput is false', function () {
    Silence::preventOutput(false);

    echo 'Hello World!';
})->expectNotToPerformAssertions();
