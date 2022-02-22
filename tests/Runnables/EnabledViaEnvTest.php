<?php

it('should fail only when the PREVENT_OUTPUT env is set', function () {
    echo 'Hello World!';

    expect(true)->toBeTrue();
});
