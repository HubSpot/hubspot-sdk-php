<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch\CardType;

/**
 * Body for a patch with optional fields.
 *
 * @phpstan-type CardPatchRequestShape = array{
 *   actions?: CardActions|null,
 *   display?: CardDisplayBody|null,
 *   fetch?: CardFetchBodyPatch|null,
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
     * @param CardActions|array{baseURLs: list<string>} $actions
     * @param CardDisplayBody|array{properties: list<CardDisplayProperty>} $display
     * @param CardFetchBodyPatch|array{
     *   objectTypes: list<CardObjectTypeBody>,
     *   cardType?: value-of<CardType>|null,
     *   serverlessFunction?: string|null,
     *   targetURL?: string|null,
     * } $fetch
     */
    public static function with(
        CardActions|array|null $actions = null,
        CardDisplayBody|array|null $display = null,
        CardFetchBodyPatch|array|null $fetch = null,
        ?string $title = null,
    ): self {
        $obj = new self;

        null !== $actions && $obj['actions'] = $actions;
        null !== $display && $obj['display'] = $display;
        null !== $fetch && $obj['fetch'] = $fetch;
        null !== $title && $obj['title'] = $title;

        return $obj;
    }

    /**
     * Configuration for custom user actions on cards.
     *
     * @param CardActions|array{baseURLs: list<string>} $actions
     */
    public function withActions(CardActions|array $actions): self
    {
        $obj = clone $this;
        $obj['actions'] = $actions;

        return $obj;
    }

    /**
     * Configuration for displayed info on a card.
     *
     * @param CardDisplayBody|array{properties: list<CardDisplayProperty>} $display
     */
    public function withDisplay(CardDisplayBody|array $display): self
    {
        $obj = clone $this;
        $obj['display'] = $display;

        return $obj;
    }

    /**
     * Variant of CardFetchBody with fields as optional for patches.
     *
     * @param CardFetchBodyPatch|array{
     *   objectTypes: list<CardObjectTypeBody>,
     *   cardType?: value-of<CardType>|null,
     *   serverlessFunction?: string|null,
     *   targetURL?: string|null,
     * } $fetch
     */
    public function withFetch(CardFetchBodyPatch|array $fetch): self
    {
        $obj = clone $this;
        $obj['fetch'] = $fetch;

        return $obj;
    }

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj['title'] = $title;

        return $obj;
    }
}
