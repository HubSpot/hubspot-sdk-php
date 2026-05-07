<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Swaps a Legacy CRM Card with an App Card in views. Reference the "Migrate a legacy CRM card to an app card" docs for more information.
 *
 * @see HubSpotSDK\Services\Crm\Extensions\CardsDevService::migrateViews()
 *
 * @phpstan-type CardsDevMigrateViewsParamsShape = array{
 *   allowDuplicateAppCardIDs: bool,
 *   appCardID: int,
 *   legacyCrmCardID: int,
 *   helpdeskAppCardID?: int|null,
 * }
 */
final class CardsDevMigrateViewsParams implements BaseModel
{
    /** @use SdkModel<CardsDevMigrateViewsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('allowDuplicateAppCardIds')]
    public bool $allowDuplicateAppCardIDs;

    #[Required('appCardId')]
    public int $appCardID;

    #[Required('legacyCrmCardId')]
    public int $legacyCrmCardID;

    #[Optional('helpdeskAppCardId')]
    public ?int $helpdeskAppCardID;

    /**
     * `new CardsDevMigrateViewsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardsDevMigrateViewsParams::with(
     *   allowDuplicateAppCardIDs: ..., appCardID: ..., legacyCrmCardID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardsDevMigrateViewsParams)
     *   ->withAllowDuplicateAppCardIDs(...)
     *   ->withAppCardID(...)
     *   ->withLegacyCrmCardID(...)
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
        bool $allowDuplicateAppCardIDs,
        int $appCardID,
        int $legacyCrmCardID,
        ?int $helpdeskAppCardID = null,
    ): self {
        $self = new self;

        $self['allowDuplicateAppCardIDs'] = $allowDuplicateAppCardIDs;
        $self['appCardID'] = $appCardID;
        $self['legacyCrmCardID'] = $legacyCrmCardID;

        null !== $helpdeskAppCardID && $self['helpdeskAppCardID'] = $helpdeskAppCardID;

        return $self;
    }

    public function withAllowDuplicateAppCardIDs(
        bool $allowDuplicateAppCardIDs
    ): self {
        $self = clone $this;
        $self['allowDuplicateAppCardIDs'] = $allowDuplicateAppCardIDs;

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
