<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CardActionsShape from \HubspotSDK\Crm\Extensions\CardsDev\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\CardDisplayBody
 * @phpstan-import-type CardFetchBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\CardFetchBody
 *
 * @phpstan-type CardCreateRequestShape = array{
 *   actions: CardActions|CardActionsShape,
 *   display: CardDisplayBody|CardDisplayBodyShape,
 *   fetch: CardFetchBody|CardFetchBodyShape,
 *   title: string,
 * }
 */
final class CardCreateRequest implements BaseModel
{
    /** @use SdkModel<CardCreateRequestShape> */
    use SdkModel;

    #[Required]
    public CardActions $actions;

    #[Required]
    public CardDisplayBody $display;

    #[Required]
    public CardFetchBody $fetch;

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    #[Required]
    public string $title;

    /**
     * `new CardCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardCreateRequest::with(actions: ..., display: ..., fetch: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardCreateRequest)
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
