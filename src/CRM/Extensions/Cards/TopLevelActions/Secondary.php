<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards\TopLevelActions;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\CRM\Extensions\Cards\ActionHookActionBody;
use HubspotSDK\CRM\Extensions\Cards\IFrameActionBody;

final class Secondary implements ConverterSource
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
