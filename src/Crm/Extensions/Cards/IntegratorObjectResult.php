<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\ActionHookActionBody\HTTPMethod;
use HubspotSDK\Crm\Extensions\Cards\ActionHookActionBody\Type;
use HubspotSDK\Crm\Extensions\Cards\IntegratorObjectResult\Action;
use HubspotSDK\Crm\Extensions\Cards\ObjectToken\DataType;

/**
 * @phpstan-type IntegratorObjectResultShape = array{
 *   id: string,
 *   actions: list<ActionHookActionBody|IFrameActionBody>,
 *   title: string,
 *   tokens: list<ObjectToken>,
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
     * @param list<ActionHookActionBody|array{
     *   httpMethod: value-of<HTTPMethod>,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<Type>,
     *   url: string,
     *   confirmation?: ActionConfirmationBody|null,
     *   label?: string|null,
     * }|IFrameActionBody|array{
     *   height: int,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<IFrameActionBody\Type>,
     *   url: string,
     *   width: int,
     *   label?: string|null,
     * }> $actions
     * @param list<ObjectToken|array{
     *   value: string,
     *   dataType?: value-of<DataType>|null,
     *   label?: string|null,
     *   name?: string|null,
     * }> $tokens
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
     * @param list<ActionHookActionBody|array{
     *   httpMethod: value-of<HTTPMethod>,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<Type>,
     *   url: string,
     *   confirmation?: ActionConfirmationBody|null,
     *   label?: string|null,
     * }|IFrameActionBody|array{
     *   height: int,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<IFrameActionBody\Type>,
     *   url: string,
     *   width: int,
     *   label?: string|null,
     * }> $actions
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
     * @param list<ObjectToken|array{
     *   value: string,
     *   dataType?: value-of<DataType>|null,
     *   label?: string|null,
     *   name?: string|null,
     * }> $tokens
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
