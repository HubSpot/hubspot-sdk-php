<?php

declare(strict_types=1);

namespace HubSpotSDK\Core\Conversion\Contracts;

use HubSpotSDK\Core\Conversion\CoerceState;
use HubSpotSDK\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
