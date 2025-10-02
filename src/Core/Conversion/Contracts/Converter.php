<?php

declare(strict_types=1);

namespace HubspotSDK\Core\Conversion\Contracts;

use HubspotSDK\Core\Conversion\CoerceState;
use HubspotSDK\Core\Conversion\DumpState;

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
