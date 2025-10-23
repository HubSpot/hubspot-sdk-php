<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Body for a patch with optional fields.
 *
 * @phpstan-type card_patch_request = array{
 *   actions?: CardActions,
 *   display?: CardDisplayBody,
 *   fetch?: CardFetchBodyPatch,
 *   title?: string,
 * }
 */
final class CardPatchRequest implements BaseModel
{
    /** @use SdkModel<card_patch_request> */
    use SdkModel;

    /**
     * Configuration for custom user actions on cards.
     */
    #[Api(optional: true)]
    public ?CardActions $actions;

    /**
     * Configuration for displayed info on a card.
     */
    #[Api(optional: true)]
    public ?CardDisplayBody $display;

    /**
     * Variant of CardFetchBody with fields as optional for patches.
     */
    #[Api(optional: true)]
    public ?CardFetchBodyPatch $fetch;

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    #[Api(optional: true)]
    public ?string $title;

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
        ?CardActions $actions = null,
        ?CardDisplayBody $display = null,
        ?CardFetchBodyPatch $fetch = null,
        ?string $title = null,
    ): self {
        $obj = new self;

        null !== $actions && $obj->actions = $actions;
        null !== $display && $obj->display = $display;
        null !== $fetch && $obj->fetch = $fetch;
        null !== $title && $obj->title = $title;

        return $obj;
    }

    /**
     * Configuration for custom user actions on cards.
     */
    public function withActions(CardActions $actions): self
    {
        $obj = clone $this;
        $obj->actions = $actions;

        return $obj;
    }

    /**
     * Configuration for displayed info on a card.
     */
    public function withDisplay(CardDisplayBody $display): self
    {
        $obj = clone $this;
        $obj->display = $display;

        return $obj;
    }

    /**
     * Variant of CardFetchBody with fields as optional for patches.
     */
    public function withFetch(CardFetchBodyPatch $fetch): self
    {
        $obj = clone $this;
        $obj->fetch = $fetch;

        return $obj;
    }

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }
}
