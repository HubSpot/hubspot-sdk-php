<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\TopLevelActions;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Extensions\Cards\ActionHookActionBody;
use HubspotSDK\Crm\Extensions\Cards\IFrameActionBody;

/**
 * @phpstan-import-type ActionHookActionBodyShape from \HubspotSDK\Crm\Extensions\Cards\ActionHookActionBody
 * @phpstan-import-type IFrameActionBodyShape from \HubspotSDK\Crm\Extensions\Cards\IFrameActionBody
 *
 * @phpstan-type SecondaryShape = ActionHookActionBodyShape|IFrameActionBodyShape
 */
final class Secondary implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [ActionHookActionBody::class, IFrameActionBody::class];
    }
}
