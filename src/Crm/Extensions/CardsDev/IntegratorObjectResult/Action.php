<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev\IntegratorObjectResult;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Extensions\CardsDev\ActionHookActionBody;
use HubspotSDK\Crm\Extensions\CardsDev\IFrameActionBody;

/**
 * @phpstan-import-type ActionHookActionBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\ActionHookActionBody
 * @phpstan-import-type IFrameActionBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\IFrameActionBody
 *
 * @phpstan-type ActionVariants = ActionHookActionBody|IFrameActionBody
 * @phpstan-type ActionShape = ActionVariants|ActionHookActionBodyShape|IFrameActionBodyShape
 */
final class Action implements ConverterSource
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
