<?php

declare(strict_types=1);

namespace Worksome\PestPluginSilence\Concerns;

use PHPUnit\Framework\TestCase;
use Worksome\PestPluginSilence\Silence;

/**
 * @mixin TestCase
 */
trait PreventsOutput
{
    /**
     * @before
     */
    public function preventOutput(): void
    {
        $this->setOutputCallback(function (string $output) {
            if (Silence::shouldPreventOutput() === false) {
                return $output;
            }

            if (strlen($output) === 0) {
                return $output;
            }

            $this->fail('Tests should not output anything to the console.');
        });
    }
}
