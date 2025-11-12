<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketingEventAssociationShape = array{
 *   marketingEventId: string,
 *   name: string,
 *   externalAccountId?: string|null,
 *   externalEventId?: string|null,
 * }
 */
final class MarketingEventAssociation implements BaseModel
{
    /** @use SdkModel<MarketingEventAssociationShape> */
    use SdkModel;

    #[Api]
    public string $marketingEventId;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?string $externalAccountId;

    #[Api(optional: true)]
    public ?string $externalEventId;

    /**
     * `new MarketingEventAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventAssociation::with(marketingEventId: ..., name: ...)
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
        string $marketingEventId,
        string $name,
        ?string $externalAccountId = null,
        ?string $externalEventId = null,
    ): self {
        $obj = new self;

        $obj->marketingEventId = $marketingEventId;
        $obj->name = $name;

        null !== $externalAccountId && $obj->externalAccountId = $externalAccountId;
        null !== $externalEventId && $obj->externalEventId = $externalEventId;

        return $obj;
    }

    public function withMarketingEventID(string $marketingEventID): self
    {
        $obj = clone $this;
        $obj->marketingEventId = $marketingEventID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountId = $externalAccountID;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj->externalEventId = $externalEventID;

        return $obj;
    }
}
