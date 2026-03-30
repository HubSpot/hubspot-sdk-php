<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\CardsDev\IntegratorObjectResult\Action;

/**
 * @phpstan-import-type ActionVariants from \HubspotSDK\Crm\Extensions\CardsDev\IntegratorObjectResult\Action
 * @phpstan-import-type ActionShape from \HubspotSDK\Crm\Extensions\CardsDev\IntegratorObjectResult\Action
 * @phpstan-import-type ObjectTokenShape from \HubspotSDK\Crm\Extensions\CardsDev\ObjectToken
 *
 * @phpstan-type IntegratorObjectResultShape = array{
 *   id: string,
 *   actions: list<ActionShape>,
 *   title: string,
 *   tokens: list<ObjectToken|ObjectTokenShape>,
 *   linkURL?: string|null,
 * }
 */
final class IntegratorObjectResult implements BaseModel
{
    /** @use SdkModel<IntegratorObjectResultShape> */
    use SdkModel;

    /**
     * The unique identifier for the card.
     */
    #[Required]
    public string $id;

    /**
     * A list of actions associated with the card, which can include action hooks, confirmation action hooks, or iframes.
     *
     * @var list<ActionVariants> $actions
     */
    #[Required(list: Action::class)]
    public array $actions;

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    #[Required]
    public string $title;

    /**
     * A collection of tokens representing specific properties related to the card.
     *
     * @var list<ObjectToken> $tokens
     */
    #[Required(list: ObjectToken::class)]
    public array $tokens;

    /**
     * A URL used on the title of the card.
     */
    #[Optional('linkUrl')]
    public ?string $linkURL;

    /**
     * `new IntegratorObjectResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorObjectResult::with(id: ..., actions: ..., title: ..., tokens: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorObjectResult)
     *   ->withID(...)
     *   ->withActions(...)
     *   ->withTitle(...)
     *   ->withTokens(...)
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
     * @param list<ActionShape> $actions
     * @param list<ObjectToken|ObjectTokenShape> $tokens
     */
    public static function with(
        string $id,
        array $actions,
        string $title,
        array $tokens,
        ?string $linkURL = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['actions'] = $actions;
        $self['title'] = $title;
        $self['tokens'] = $tokens;

        null !== $linkURL && $self['linkURL'] = $linkURL;

        return $self;
    }

    /**
     * The unique identifier for the card.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A list of actions associated with the card, which can include action hooks, confirmation action hooks, or iframes.
     *
     * @param list<ActionShape> $actions
     */
    public function withActions(array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

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

    /**
     * A collection of tokens representing specific properties related to the card.
     *
     * @param list<ObjectToken|ObjectTokenShape> $tokens
     */
    public function withTokens(array $tokens): self
    {
        $self = clone $this;
        $self['tokens'] = $tokens;

        return $self;
    }

    /**
     * A URL used on the title of the card.
     */
    public function withLinkURL(string $linkURL): self
    {
        $self = clone $this;
        $self['linkURL'] = $linkURL;

        return $self;
    }
}
