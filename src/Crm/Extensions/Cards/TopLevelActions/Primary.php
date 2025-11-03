<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\TopLevelActions;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Extensions\Cards\ActionHookActionBody;
use HubspotSDK\Crm\Extensions\Cards\IFrameActionBody;

final class Primary implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [ActionHookActionBody::class, IFrameActionBody::class];
    }
}
