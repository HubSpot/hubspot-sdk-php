<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APISignatureWebhookAuthSettings\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APISignatureWebhookAuthSettingsShape = array{
 *   appID: int, type: value-of<Type>
 * }
 */
final class APISignatureWebhookAuthSettings implements BaseModel
{
    /** @use SdkModel<APISignatureWebhookAuthSettingsShape> */
    use SdkModel;

    #[Required('appId')]
    public int $appID;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APISignatureWebhookAuthSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APISignatureWebhookAuthSettings::with(appID: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APISignatureWebhookAuthSettings)->withAppID(...)->withType(...)
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

        $obj['appID'] = $appID;
        $obj['type'] = $type;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appID'] = $appID;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
