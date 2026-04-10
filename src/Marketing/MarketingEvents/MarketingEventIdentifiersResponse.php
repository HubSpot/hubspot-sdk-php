<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AppInfoShape from \HubSpotSDK\Marketing\MarketingEvents\AppInfo
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

    /**
     * The ID that is associated with this marketing event in the external event application.
     */
    #[Required('externalEventId')]
    public string $externalEventID;

    /**
     * The name of the marketing event.
     */
    #[Required]
    public string $marketingEventName;

    /**
     * The internal ID of the marketing event in HubSpot CRM.
     */
    #[Required('objectId')]
    public string $objectID;

    #[Optional]
    public ?AppInfo $appInfo;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
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
     * @param AppInfo|AppInfoShape|null $appInfo
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

    /**
     * The ID that is associated with this marketing event in the external event application.
     */
    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }

    /**
     * The name of the marketing event.
     */
    public function withMarketingEventName(string $marketingEventName): self
    {
        $self = clone $this;
        $self['marketingEventName'] = $marketingEventName;

        return $self;
    }

    /**
     * The internal ID of the marketing event in HubSpot CRM.
     */
    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * @param AppInfo|AppInfoShape $appInfo
     */
    public function withAppInfo(AppInfo|array $appInfo): self
    {
        $self = clone $this;
        $self['appInfo'] = $appInfo;

        return $self;
    }

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }
}
