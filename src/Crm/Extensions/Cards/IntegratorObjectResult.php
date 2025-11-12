<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\IntegratorObjectResult\Action;

/**
 * @phpstan-type IntegratorObjectResultShape = array{
 *   id: string,
 *   actions: list<ActionHookActionBody|IFrameActionBody>,
 *   title: string,
 *   tokens: list<ObjectToken>,
 *   linkUrl?: string|null,
 * }
 */
final class IntegratorObjectResult implements BaseModel
{
    /** @use SdkModel<IntegratorObjectResultShape> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var list<ActionHookActionBody|IFrameActionBody> $actions */
    #[Api(list: Action::class)]
    public array $actions;

    #[Api]
    public string $title;

    /** @var list<ObjectToken> $tokens */
    #[Api(list: ObjectToken::class)]
    public array $tokens;

    #[Api(optional: true)]
    public ?string $linkUrl;

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
     * @param list<ActionHookActionBody|IFrameActionBody> $actions
     * @param list<ObjectToken> $tokens
     */
    public static function with(
        string $id,
        array $actions,
        string $title,
        array $tokens,
        ?string $linkUrl = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->actions = $actions;
        $obj->title = $title;
        $obj->tokens = $tokens;

        null !== $linkUrl && $obj->linkUrl = $linkUrl;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param list<ActionHookActionBody|IFrameActionBody> $actions
     */
    public function withActions(array $actions): self
    {
        $obj = clone $this;
        $obj->actions = $actions;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    /**
     * @param list<ObjectToken> $tokens
     */
    public function withTokens(array $tokens): self
    {
        $obj = clone $this;
        $obj->tokens = $tokens;

        return $obj;
    }

    public function withLinkURL(string $linkURL): self
    {
        $obj = clone $this;
        $obj->linkUrl = $linkURL;

        return $obj;
    }
}
