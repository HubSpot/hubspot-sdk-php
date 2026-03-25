<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev\TopLevelActions;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Extensions\CardsDev\ActionHookActionBody;
use HubspotSDK\Crm\Extensions\CardsDev\IFrameActionBody;

/**
 * Defines the primary action for a card, which can be either an action hook or an iframe.
 *
 * @phpstan-import-type ActionHookActionBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\ActionHookActionBody
 * @phpstan-import-type IFrameActionBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\IFrameActionBody
 *
 * @phpstan-type PrimaryVariants = ActionHookActionBody|IFrameActionBody
 * @phpstan-type PrimaryShape = PrimaryVariants|ActionHookActionBodyShape|IFrameActionBodyShape
 */
final class Primary implements ConverterSource
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
