<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPISignatureWebhookAuthSettings\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_signature_webhook_auth_settings = array{
 *   appID: int, type: value-of<Type>
 * }
 */
final class AutomationAPISignatureWebhookAuthSettings implements BaseModel
{
    /** @use SdkModel<automation_api_signature_webhook_auth_settings> */
    use SdkModel;

    #[Api('appId')]
    public int $appID;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPISignatureWebhookAuthSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPISignatureWebhookAuthSettings::with(appID: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPISignatureWebhookAuthSettings)->withAppID(...)->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $appID,
        Type|string $type = 'SIGNATURE'
    ): self {
        $obj = new self;

        $obj->appID = $appID;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
