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
        $obj = new self;

        $obj['marketingEventID'] = $marketingEventID;
        $obj['name'] = $name;

        null !== $externalAccountID && $obj['externalAccountID'] = $externalAccountID;
        null !== $externalEventID && $obj['externalEventID'] = $externalEventID;

        return $obj;
    }

    public function withMarketingEventID(string $marketingEventID): self
    {
        $obj = clone $this;
        $obj['marketingEventID'] = $marketingEventID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['externalAccountID'] = $externalAccountID;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj['externalEventID'] = $externalEventID;

        return $obj;
    }
}
