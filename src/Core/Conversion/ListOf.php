<?php

declare(strict_types=1);

namespace HubSpotSDK\Core\Conversion;

use HubSpotSDK\Core\Conversion\Concerns\ArrayOf;
use HubSpotSDK\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
