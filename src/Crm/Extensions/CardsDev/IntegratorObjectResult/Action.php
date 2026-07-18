<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev\IntegratorObjectResult;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Crm\Extensions\CardsDev\ActionHookActionBody;
use HubSpotSDK\Crm\Extensions\CardsDev\IFrameActionBody;

/**
 * @phpstan-import-type ActionHookActionBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\ActionHookActionBody
 * @phpstan-import-type IFrameActionBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\IFrameActionBody
 *
 * @phpstan-type ActionVariants = ActionHookActionBody|IFrameActionBody
 * @phpstan-type ActionShape = ActionVariants|ActionHookActionBodyShape|IFrameActionBodyShape
 */
final class Action implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'ACTION_HOOK' => ActionHookActionBody::class,
            'IFRAME' => IFrameActionBody::class,
        ];
    }
}
