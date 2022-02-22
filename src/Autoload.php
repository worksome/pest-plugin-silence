<?php

declare(strict_types=1);

namespace Pest\PluginName;

use Pest\Plugin;
use Worksome\PestPluginSilence\Concerns\PreventsOutput;
use Worksome\PestPluginSilence\Silence;

Plugin::uses(PreventsOutput::class);

if (getenv('PREVENT_OUTPUT') !== false) {
    Silence::preventOutput();
}
