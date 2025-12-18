<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Defines a new card that will become active on an account when this app is installed.
 *
 * @see HubspotSDK\Services\Crm\Extensions\CardsService::create()
 *
 * @phpstan-import-type CardActionsShape from \HubspotSDK\Crm\Extensions\Cards\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubspotSDK\Crm\Extensions\Cards\CardDisplayBody
 * @phpstan-import-type CardFetchBodyShape from \HubspotSDK\Crm\Extensions\Cards\CardFetchBody
 *
 * @phpstan-type CardCreateParamsShape = array{
 *   actions: CardActions|CardActionsShape,
 *   display: CardDisplayBody|CardDisplayBodyShape,
 *   fetch: CardFetchBody|CardFetchBodyShape,
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
    #[Required]
    public CardActions $actions;

    /**
     * Configuration for displayed info on a card.
     */
    #[Required]
    public CardDisplayBody $display;

    /**
     * Configuration for this card's data fetch request.
     */
    #[Required]
    public CardFetchBody $fetch;

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    #[Required]
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
     *
     * @param CardActions|CardActionsShape $actions
     * @param CardDisplayBody|CardDisplayBodyShape $display
     * @param CardFetchBody|CardFetchBodyShape $fetch
     */
    public static function with(
        CardActions|array $actions,
        CardDisplayBody|array $display,
        CardFetchBody|array $fetch,
        string $title,
    ): self {
        $self = new self;

        $self['actions'] = $actions;
        $self['display'] = $display;
        $self['fetch'] = $fetch;
        $self['title'] = $title;

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
     * Configuration for this card's data fetch request.
     *
     * @param CardFetchBody|CardFetchBodyShape $fetch
     */
    public function withFetch(CardFetchBody|array $fetch): self
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
