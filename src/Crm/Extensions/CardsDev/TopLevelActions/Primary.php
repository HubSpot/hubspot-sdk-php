<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev\TopLevelActions;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Crm\Extensions\CardsDev\ActionHookActionBody;
use HubSpotSDK\Crm\Extensions\CardsDev\IFrameActionBody;

/**
 * Defines the primary action for a card, which can be either an action hook or an iframe.
 *
 * @phpstan-import-type ActionHookActionBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\ActionHookActionBody
 * @phpstan-import-type IFrameActionBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\IFrameActionBody
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
