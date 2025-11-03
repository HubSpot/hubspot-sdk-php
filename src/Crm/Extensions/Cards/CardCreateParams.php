<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Defines a new card that will become active on an account when this app is installed.
 *
 * @see HubspotSDK\Crm\Extensions\Cards->create
 *
 * @phpstan-type CardCreateParamsShape = array{
 *   actions: CardActions,
 *   display: CardDisplayBody,
 *   fetch: CardFetchBody,
 *   title: string,
 * }
 */
final class CardCreateParams implements BaseModel
{
    /** @use SdkModel<CardCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Configuration for custom user actions on cards.
     */
    #[Api]
    public CardActions $actions;

    /**
     * Configuration for displayed info on a card.
     */
    #[Api]
    public CardDisplayBody $display;

    /**
     * Configuration for this card's data fetch request.
     */
    #[Api]
    public CardFetchBody $fetch;

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    #[Api]
    public string $title;

    /**
     * `new CardCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardCreateParams::with(actions: ..., display: ..., fetch: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardCreateParams)
     *   ->withActions(...)
     *   ->withDisplay(...)
     *   ->withFetch(...)
     *   ->withTitle(...)
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
        CardActions $actions,
        CardDisplayBody $display,
        CardFetchBody $fetch,
        string $title,
    ): self {
        $obj = new self;

        $obj->actions = $actions;
        $obj->display = $display;
        $obj->fetch = $fetch;
        $obj->title = $title;

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
     * Configuration for this card's data fetch request.
     */
    public function withFetch(CardFetchBody $fetch): self
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
