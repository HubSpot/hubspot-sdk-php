<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketingEventAssociationShape = array{
 *   marketingEventID: string,
 *   name: string,
 *   externalAccountID?: string|null,
 *   externalEventID?: string|null,
 * }
 */
final class MarketingEventAssociation implements BaseModel
{
    /** @use SdkModel<MarketingEventAssociationShape> */
    use SdkModel;

    #[Required('marketingEventId')]
    public string $marketingEventID;

    #[Required]
    public string $name;

    #[Optional('externalAccountId')]
    public ?string $externalAccountID;

    #[Optional('externalEventId')]
    public ?string $externalEventID;

    /**
     * `new MarketingEventAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventAssociation::with(marketingEventID: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventAssociation)->withMarketingEventID(...)->withName(...)
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
        string $marketingEventID,
        string $name,
        ?string $externalAccountID = null,
        ?string $externalEventID = null,
    ): self {
        $self = new self;

        $self['marketingEventID'] = $marketingEventID;
        $self['name'] = $name;

        null !== $externalAccountID && $self['externalAccountID'] = $externalAccountID;
        null !== $externalEventID && $self['externalEventID'] = $externalEventID;

        return $self;
    }

    public function withMarketingEventID(string $marketingEventID): self
    {
        $self = clone $this;
        $self['marketingEventID'] = $marketingEventID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }
}
