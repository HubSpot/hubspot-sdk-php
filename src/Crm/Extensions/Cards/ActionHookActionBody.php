<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\ActionHookActionBody\HTTPMethod;
use HubspotSDK\Crm\Extensions\Cards\ActionHookActionBody\Type;

/**
 * @phpstan-type ActionHookActionBodyShape = array{
 *   httpMethod: value-of<HTTPMethod>,
 *   propertyNamesIncluded: list<string>,
 *   type: value-of<Type>,
 *   url: string,
 *   confirmation?: ActionConfirmationBody|null,
 *   label?: string|null,
 * }
 */
final class ActionHookActionBody implements BaseModel
{
    /** @use SdkModel<ActionHookActionBodyShape> */
    use SdkModel;

    /** @var value-of<HTTPMethod> $httpMethod */
    #[Required(enum: HTTPMethod::class)]
    public string $httpMethod;

    /** @var list<string> $propertyNamesIncluded */
    #[Required(list: 'string')]
    public array $propertyNamesIncluded;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
    public string $url;

    #[Optional]
    public ?ActionConfirmationBody $confirmation;

    #[Optional]
    public ?string $label;

    /**
     * `new ActionHookActionBody()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionHookActionBody::with(
     *   httpMethod: ..., propertyNamesIncluded: ..., type: ..., url: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionHookActionBody)
     *   ->withHTTPMethod(...)
     *   ->withPropertyNamesIncluded(...)
     *   ->withType(...)
     *   ->withURL(...)
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
     * @param HTTPMethod|value-of<HTTPMethod> $httpMethod
     * @param list<string> $propertyNamesIncluded
     * @param Type|value-of<Type> $type
     * @param ActionConfirmationBody|array{
     *   cancelButtonLabel: string, confirmButtonLabel: string, prompt: string
     * } $confirmation
     */
    public static function with(
        HTTPMethod|string $httpMethod,
        array $propertyNamesIncluded,
        string $url,
        Type|string $type = 'ACTION_HOOK',
        ActionConfirmationBody|array|null $confirmation = null,
        ?string $label = null,
    ): self {
        $self = new self;

        $self['httpMethod'] = $httpMethod;
        $self['propertyNamesIncluded'] = $propertyNamesIncluded;
        $self['type'] = $type;
        $self['url'] = $url;

        null !== $confirmation && $self['confirmation'] = $confirmation;
        null !== $label && $self['label'] = $label;

        return $self;
    }

    /**
     * @param HTTPMethod|value-of<HTTPMethod> $httpMethod
     */
    public function withHTTPMethod(HTTPMethod|string $httpMethod): self
    {
        $self = clone $this;
        $self['httpMethod'] = $httpMethod;

        return $self;
    }

    /**
     * @param list<string> $propertyNamesIncluded
     */
    public function withPropertyNamesIncluded(
        array $propertyNamesIncluded
    ): self {
        $self = clone $this;
        $self['propertyNamesIncluded'] = $propertyNamesIncluded;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * @param ActionConfirmationBody|array{
     *   cancelButtonLabel: string, confirmButtonLabel: string, prompt: string
     * } $confirmation
     */
    public function withConfirmation(
        ActionConfirmationBody|array $confirmation
    ): self {
        $self = clone $this;
        $self['confirmation'] = $confirmation;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
