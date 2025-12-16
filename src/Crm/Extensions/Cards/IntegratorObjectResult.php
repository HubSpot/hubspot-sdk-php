<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\IntegratorObjectResult\Action;

/**
 * @phpstan-import-type ActionShape from \HubspotSDK\Crm\Extensions\Cards\IntegratorObjectResult\Action
 * @phpstan-import-type ObjectTokenShape from \HubspotSDK\Crm\Extensions\Cards\ObjectToken
 *
 * @phpstan-type IntegratorObjectResultShape = array{
 *   id: string,
 *   actions: list<ActionShape>,
 *   title: string,
 *   tokens: list<ObjectTokenShape>,
 *   linkURL?: string|null,
 * }
 */
final class IntegratorObjectResult implements BaseModel
{
    /** @use SdkModel<IntegratorObjectResultShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var list<ActionHookActionBody|IFrameActionBody> $actions */
    #[Required(list: Action::class)]
    public array $actions;

    #[Required]
    public string $title;

    /** @var list<ObjectToken> $tokens */
    #[Required(list: ObjectToken::class)]
    public array $tokens;

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
     * @param list<ObjectTokenShape> $tokens
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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<ActionShape> $actions
     */
    public function withActions(array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    /**
     * @param list<ObjectTokenShape> $tokens
     */
    public function withTokens(array $tokens): self
    {
        $self = clone $this;
        $self['tokens'] = $tokens;

        return $self;
    }

    public function withLinkURL(string $linkURL): self
    {
        $self = clone $this;
        $self['linkURL'] = $linkURL;

        return $self;
    }
}
