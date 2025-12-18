<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Body for a patch with optional fields.
 *
 * @phpstan-import-type CardActionsShape from \HubspotSDK\Crm\Extensions\Cards\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubspotSDK\Crm\Extensions\Cards\CardDisplayBody
 * @phpstan-import-type CardFetchBodyPatchShape from \HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch
 *
 * @phpstan-type CardPatchRequestShape = array{
 *   actions?: null|CardActions|CardActionsShape,
 *   display?: null|CardDisplayBody|CardDisplayBodyShape,
 *   fetch?: null|CardFetchBodyPatch|CardFetchBodyPatchShape,
 *   title?: string|null,
 * }
 */
final class CardPatchRequest implements BaseModel
{
    /** @use SdkModel<CardPatchRequestShape> */
    use SdkModel;

    /**
     * Configuration for custom user actions on cards.
     */
    #[Optional]
    public ?CardActions $actions;

    /**
     * Configuration for displayed info on a card.
     */
    #[Optional]
    public ?CardDisplayBody $display;

    /**
     * Variant of CardFetchBody with fields as optional for patches.
     */
    #[Optional]
    public ?CardFetchBodyPatch $fetch;

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    #[Optional]
    public ?string $title;

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
        CardActions|array|null $actions = null,
        CardDisplayBody|array|null $display = null,
        CardFetchBodyPatch|array|null $fetch = null,
        ?string $title = null,
    ): self {
        $self = new self;

        null !== $actions && $self['actions'] = $actions;
        null !== $display && $self['display'] = $display;
        null !== $fetch && $self['fetch'] = $fetch;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * Configuration for custom user actions on cards.
     *
     * @param CardActions|CardActionsShape $actions
     */
    public function withActions(CardActions|array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    /**
     * Configuration for displayed info on a card.
     *
     * @param CardDisplayBody|CardDisplayBodyShape $display
     */
    public function withDisplay(CardDisplayBody|array $display): self
    {
        $self = clone $this;
        $self['display'] = $display;

        return $self;
    }

    /**
     * Variant of CardFetchBody with fields as optional for patches.
     *
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
