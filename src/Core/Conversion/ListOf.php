<?php

declare(strict_types=1);

namespace HubspotSDK\Core\Conversion;

use HubspotSDK\Core\Conversion\Concerns\ArrayOf;
use HubspotSDK\Core\Conversion\Contracts\Converter;

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
