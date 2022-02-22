<?php

use Symfony\Component\Process\Process;

it('fails all tests in EnabledTest.php', function (array $env, int $failedTests) {
    $process = new Process(['php', './vendor/bin/pest', '--group', 'runnable'], __DIR__ . '/../', $env);
    $process->run();

    expect($process->getOutput())
        ->toContain("{$failedTests} failed")
        ->toContain('Tests should not output anything to the console.');
})->with([
    [[], 3],
    [['PREVENT_OUTPUT' => false], 3],
    [['PREVENT_OUTPUT' => true], 4],
    [['PREVENT_OUTPUT' => '1'], 4],
]);
