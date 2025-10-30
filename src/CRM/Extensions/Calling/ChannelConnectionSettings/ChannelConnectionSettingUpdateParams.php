<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling\ChannelConnectionSettings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update existing [channel connection settings](https://developers.hubspot.com/docs/guides/api/crm/extensions/third-party-calling#manage-the-webhook-settings-for-channel-connection) for your app.
 *
 * @see HubspotSDK\CRM\Extensions\Calling\ChannelConnectionSettings->update
 *
 * @phpstan-type ChannelConnectionSettingUpdateParamsShape = array{
 *   isReady?: bool, url?: string
 * }
 */
final class ChannelConnectionSettingUpdateParams implements BaseModel
{
    /** @use SdkModel<ChannelConnectionSettingUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * If true, this app will be considered to support channel connection.
     */
    #[Api(optional: true)]
    public ?bool $isReady;

    /**
     * The URL to fetch phone numbers available for channel connection.
     */
    #[Api(optional: true)]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $isReady = null, ?string $url = null): self
    {
        $obj = new self;

        null !== $isReady && $obj->isReady = $isReady;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    /**
     * If true, this app will be considered to support channel connection.
     */
    public function withIsReady(bool $isReady): self
    {
        $obj = clone $this;
        $obj->isReady = $isReady;

        return $obj;
    }

    /**
     * The URL to fetch phone numbers available for channel connection.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
