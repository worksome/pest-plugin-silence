<?php

use Worksome\PestPluginSilence\Silence;

uses()->group('runnable')->beforeEach(function () {
    Silence::preventOutput();
});

it('prevents output when enabled', function () {
    echo 'Hello World!';

    expect(true)->toBeTrue();
});

it('can prevent output locally', function () {
    Silence::preventOutput(false);
    Silence::preventOutput(true);

    echo 'Hello World!';

    expect(true)->toBeTrue();
});

it('prevents var dumps', function () {
    var_dump('Hello World');

    expect(true)->toBeTrue();
});
