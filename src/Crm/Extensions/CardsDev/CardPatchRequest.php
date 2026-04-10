<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CardActionsShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardDisplayBody
 * @phpstan-import-type CardFetchBodyPatchShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch
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
