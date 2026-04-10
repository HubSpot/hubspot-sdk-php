<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketingEventExternalUniqueIdentifierShape = array{
 *   appID: int, externalAccountID: string, externalEventID: string
 * }
 */
final class MarketingEventExternalUniqueIdentifier implements BaseModel
{
    /** @use SdkModel<MarketingEventExternalUniqueIdentifierShape> */
    use SdkModel;

    /**
     * The id of the application that created the marketing event in HubSpot.
     */
    #[Required('appId')]
    public int $appID;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Required('externalAccountId')]
    public string $externalAccountID;

    /**
     * The id of the marketing event in the external event application.
     */
    #[Required('externalEventId')]
    public string $externalEventID;

    /**
     * `new MarketingEventExternalUniqueIdentifier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventExternalUniqueIdentifier::with(
     *   appID: ..., externalAccountID: ..., externalEventID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventExternalUniqueIdentifier)
     *   ->withAppID(...)
     *   ->withExternalAccountID(...)
     *   ->withExternalEventID(...)
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
        int $appID,
        string $externalAccountID,
        string $externalEventID
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['externalAccountID'] = $externalAccountID;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }

    /**
     * The id of the application that created the marketing event in HubSpot.
     */
    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

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

    /**
     * The id of the marketing event in the external event application.
     */
    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }
}
