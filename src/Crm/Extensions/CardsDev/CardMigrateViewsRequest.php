<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CardMigrateViewsRequestShape = array{
 *   appCardID: int, legacyCrmCardID: int, helpdeskAppCardID?: int|null
 * }
 */
final class CardMigrateViewsRequest implements BaseModel
{
    /** @use SdkModel<CardMigrateViewsRequestShape> */
    use SdkModel;

    #[Required('appCardId')]
    public int $appCardID;

    #[Required('legacyCrmCardId')]
    public int $legacyCrmCardID;

    #[Optional('helpdeskAppCardId')]
    public ?int $helpdeskAppCardID;

    /**
     * `new CardMigrateViewsRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardMigrateViewsRequest::with(appCardID: ..., legacyCrmCardID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardMigrateViewsRequest)->withAppCardID(...)->withLegacyCrmCardID(...)
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
        int $appCardID,
        int $legacyCrmCardID,
        ?int $helpdeskAppCardID = null
    ): self {
        $self = new self;

        $self['appCardID'] = $appCardID;
        $self['legacyCrmCardID'] = $legacyCrmCardID;

        null !== $helpdeskAppCardID && $self['helpdeskAppCardID'] = $helpdeskAppCardID;

        return $self;
    }

    public function withAppCardID(int $appCardID): self
    {
        $self = clone $this;
        $self['appCardID'] = $appCardID;

        return $self;
    }

    public function withLegacyCrmCardID(int $legacyCrmCardID): self
    {
        $self = clone $this;
        $self['legacyCrmCardID'] = $legacyCrmCardID;

        return $self;
    }

    public function withHelpdeskAppCardID(int $helpdeskAppCardID): self
    {
        $self = clone $this;
        $self['helpdeskAppCardID'] = $helpdeskAppCardID;

        return $self;
    }
}
