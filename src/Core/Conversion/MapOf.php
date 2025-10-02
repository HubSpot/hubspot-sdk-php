<?php

declare(strict_types=1);

namespace HubspotSDK\Core\Conversion;

use HubspotSDK\Core\Conversion\Concerns\ArrayOf;
use HubspotSDK\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
