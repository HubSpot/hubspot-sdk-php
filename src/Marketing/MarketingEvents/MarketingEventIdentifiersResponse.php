<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_event_identifiers_response = array{
 *   externalEventID: string,
 *   marketingEventName: string,
 *   objectID: string,
 *   appInfo?: AppInfo,
 *   externalAccountID?: string,
 * }
 */
final class MarketingEventIdentifiersResponse implements BaseModel
{
    /** @use SdkModel<marketing_event_identifiers_response> */
    use SdkModel;

    #[Api('externalEventId')]
    public string $externalEventID;

    #[Api]
    public string $marketingEventName;

    #[Api('objectId')]
    public string $objectID;

    #[Api(optional: true)]
    public ?AppInfo $appInfo;

    #[Api('externalAccountId', optional: true)]
    public ?string $externalAccountID;

    /**
     * `new MarketingEventIdentifiersResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventIdentifiersResponse::with(
     *   externalEventID: ..., marketingEventName: ..., objectID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventIdentifiersResponse)
     *   ->withExternalEventID(...)
     *   ->withMarketingEventName(...)
     *   ->withObjectID(...)
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
     */
    public static function with(
        string $externalEventID,
        string $marketingEventName,
        string $objectID,
        ?AppInfo $appInfo = null,
        ?string $externalAccountID = null,
    ): self {
        $obj = new self;

        $obj->externalEventID = $externalEventID;
        $obj->marketingEventName = $marketingEventName;
        $obj->objectID = $objectID;

        null !== $appInfo && $obj->appInfo = $appInfo;
        null !== $externalAccountID && $obj->externalAccountID = $externalAccountID;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj->externalEventID = $externalEventID;

        return $obj;
    }

    public function withMarketingEventName(string $marketingEventName): self
    {
        $obj = clone $this;
        $obj->marketingEventName = $marketingEventName;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    public function withAppInfo(AppInfo $appInfo): self
    {
        $obj = clone $this;
        $obj->appInfo = $appInfo;

        return $obj;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountID = $externalAccountID;

        return $obj;
    }
}
