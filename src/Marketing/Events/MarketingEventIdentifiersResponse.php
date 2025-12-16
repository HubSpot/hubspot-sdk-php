<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AppInfoShape from \HubspotSDK\Marketing\Events\AppInfo
 *
 * @phpstan-type MarketingEventIdentifiersResponseShape = array{
 *   externalEventID: string,
 *   marketingEventName: string,
 *   objectID: string,
 *   appInfo?: null|AppInfo|AppInfoShape,
 *   externalAccountID?: string|null,
 * }
 */
final class MarketingEventIdentifiersResponse implements BaseModel
{
    /** @use SdkModel<MarketingEventIdentifiersResponseShape> */
    use SdkModel;

    #[Required('externalEventId')]
    public string $externalEventID;

    #[Required]
    public string $marketingEventName;

    #[Required('objectId')]
    public string $objectID;

    #[Optional]
    public ?AppInfo $appInfo;

    #[Optional('externalAccountId')]
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
     *
     * @param AppInfoShape $appInfo
     */
    public static function with(
        string $externalEventID,
        string $marketingEventName,
        string $objectID,
        AppInfo|array|null $appInfo = null,
        ?string $externalAccountID = null,
    ): self {
        $self = new self;

        $self['externalEventID'] = $externalEventID;
        $self['marketingEventName'] = $marketingEventName;
        $self['objectID'] = $objectID;

        null !== $appInfo && $self['appInfo'] = $appInfo;
        null !== $externalAccountID && $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }

    public function withMarketingEventName(string $marketingEventName): self
    {
        $self = clone $this;
        $self['marketingEventName'] = $marketingEventName;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * @param AppInfoShape $appInfo
     */
    public function withAppInfo(AppInfo|array $appInfo): self
    {
        $self = clone $this;
        $self['appInfo'] = $appInfo;

        return $self;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }
}
