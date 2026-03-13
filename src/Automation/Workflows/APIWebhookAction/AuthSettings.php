<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIWebhookAction;

use HubspotSDK\Automation\Workflows\APIAuthKeyWebhookAuthSettings;
use HubspotSDK\Automation\Workflows\APISignatureWebhookAuthSettings;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type APIAuthKeyWebhookAuthSettingsShape from \HubspotSDK\Automation\Workflows\APIAuthKeyWebhookAuthSettings
 * @phpstan-import-type APISignatureWebhookAuthSettingsShape from \HubspotSDK\Automation\Workflows\APISignatureWebhookAuthSettings
 *
 * @phpstan-type AuthSettingsVariants = APIAuthKeyWebhookAuthSettings|APISignatureWebhookAuthSettings
 * @phpstan-type AuthSettingsShape = AuthSettingsVariants|APIAuthKeyWebhookAuthSettingsShape|APISignatureWebhookAuthSettingsShape
 */
final class AuthSettings implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            APIAuthKeyWebhookAuthSettings::class,
            APISignatureWebhookAuthSettings::class,
        ];
    }
}
