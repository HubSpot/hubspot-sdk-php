<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketingEventIdentifiersResponseShape = array{
 *   externalEventId: string,
 *   marketingEventName: string,
 *   objectId: string,
 *   appInfo?: AppInfo|null,
 *   externalAccountId?: string|null,
 * }
 */
final class MarketingEventIdentifiersResponse implements BaseModel
{
    /** @use SdkModel<MarketingEventIdentifiersResponseShape> */
    use SdkModel;

    #[Required]
    public string $externalEventId;

    #[Required]
    public string $marketingEventName;

    #[Required]
    public string $objectId;

    #[Optional]
    public ?AppInfo $appInfo;

    #[Optional]
    public ?string $externalAccountId;

    /**
     * `new MarketingEventIdentifiersResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventIdentifiersResponse::with(
     *   externalEventId: ..., marketingEventName: ..., objectId: ...
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
     *
     * @param AppInfo|array{id: string, name: string} $appInfo
     */
    public static function with(
        string $externalEventId,
        string $marketingEventName,
        string $objectId,
        AppInfo|array|null $appInfo = null,
        ?string $externalAccountId = null,
    ): self {
        $obj = new self;

        $obj['externalEventId'] = $externalEventId;
        $obj['marketingEventName'] = $marketingEventName;
        $obj['objectId'] = $objectId;

        null !== $appInfo && $obj['appInfo'] = $appInfo;
        null !== $externalAccountId && $obj['externalAccountId'] = $externalAccountId;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj['externalEventId'] = $externalEventID;

        return $obj;
    }

    public function withMarketingEventName(string $marketingEventName): self
    {
        $obj = clone $this;
        $obj['marketingEventName'] = $marketingEventName;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectId'] = $objectID;

        return $obj;
    }

    /**
     * @param AppInfo|array{id: string, name: string} $appInfo
     */
    public function withAppInfo(AppInfo|array $appInfo): self
    {
        $obj = clone $this;
        $obj['appInfo'] = $appInfo;

        return $obj;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['externalAccountId'] = $externalAccountID;

        return $obj;
    }
}
