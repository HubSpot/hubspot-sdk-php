<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a card definition with new details.
 *
 * @see HubspotSDK\Services\Crm\Extensions\CardsDevService::update()
 *
 * @phpstan-import-type CardActionsShape from \HubspotSDK\Crm\Extensions\CardsDev\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\CardDisplayBody
 * @phpstan-import-type CardFetchBodyPatchShape from \HubspotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch
 *
 * @phpstan-type CardsDevUpdateParamsShape = array{
 *   appID: int,
 *   actions?: null|CardActions|CardActionsShape,
 *   display?: null|CardDisplayBody|CardDisplayBodyShape,
 *   fetch?: null|CardFetchBodyPatch|CardFetchBodyPatchShape,
 *   title?: string|null,
 * }
 */
final class CardsDevUpdateParams implements BaseModel
{
    /** @use SdkModel<CardsDevUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Optional]
    public ?CardActions $actions;

    #[Optional]
    public ?CardDisplayBody $display;

    #[Optional]
    public ?CardFetchBodyPatch $fetch;

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    #[Optional]
    public ?string $title;

    /**
     * `new CardsDevUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardsDevUpdateParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardsDevUpdateParams)->withAppID(...)
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
     * @param CardActions|CardActionsShape|null $actions
     * @param CardDisplayBody|CardDisplayBodyShape|null $display
     * @param CardFetchBodyPatch|CardFetchBodyPatchShape|null $fetch
     */
    public static function with(
        int $appID,
        CardActions|array|null $actions = null,
        CardDisplayBody|array|null $display = null,
        CardFetchBodyPatch|array|null $fetch = null,
        ?string $title = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;

        null !== $actions && $self['actions'] = $actions;
        null !== $display && $self['display'] = $display;
        null !== $fetch && $self['fetch'] = $fetch;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * @param CardActions|CardActionsShape $actions
     */
    public function withActions(CardActions|array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    /**
     * @param CardDisplayBody|CardDisplayBodyShape $display
     */
    public function withDisplay(CardDisplayBody|array $display): self
    {
        $self = clone $this;
        $self['display'] = $display;

        return $self;
    }

    /**
     * @param CardFetchBodyPatch|CardFetchBodyPatchShape $fetch
     */
    public function withFetch(CardFetchBodyPatch|array $fetch): self
    {
        $self = clone $this;
        $self['fetch'] = $fetch;

        return $self;
    }

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
