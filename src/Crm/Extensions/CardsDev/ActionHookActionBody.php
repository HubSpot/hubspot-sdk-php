<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\CardsDev\ActionHookActionBody\HTTPMethod;
use HubspotSDK\Crm\Extensions\CardsDev\ActionHookActionBody\Type;

/**
 * @phpstan-import-type ActionConfirmationBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\ActionConfirmationBody
 *
 * @phpstan-type ActionHookActionBodyShape = array{
 *   httpMethod: HTTPMethod|value-of<HTTPMethod>,
 *   propertyNamesIncluded: list<string>,
 *   type: Type|value-of<Type>,
 *   url: string,
 *   confirmation?: null|ActionConfirmationBody|ActionConfirmationBodyShape,
 *   label?: string|null,
 * }
 */
final class ActionHookActionBody implements BaseModel
{
    /** @use SdkModel<ActionHookActionBodyShape> */
    use SdkModel;

    /**
     * The HTTP method to be used when making the call, which can be set to GET, POST, PUT, DELETE, or PATCH. If using GET or DELETE.
     *
     * @var value-of<HTTPMethod> $httpMethod
     */
    #[Required(enum: HTTPMethod::class)]
    public string $httpMethod;

    /**
     * A list of property names that will be included on the action. See the documentation for more information.
     *
     * @var list<string> $propertyNamesIncluded
     */
    #[Required(list: 'string')]
    public array $propertyNamesIncluded;

    /**
     * The type of status.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The URL endpoint that will be called when the action is triggered.
     */
    #[Required]
    public string $url;

    #[Optional]
    public ?ActionConfirmationBody $confirmation;

    /**
     * The label for this property as you'd like it displayed to users.
     */
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
     * @param ActionConfirmationBody|ActionConfirmationBodyShape|null $confirmation
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
     * The HTTP method to be used when making the call, which can be set to GET, POST, PUT, DELETE, or PATCH. If using GET or DELETE.
     *
     * @param HTTPMethod|value-of<HTTPMethod> $httpMethod
     */
    public function withHTTPMethod(HTTPMethod|string $httpMethod): self
    {
        $self = clone $this;
        $self['httpMethod'] = $httpMethod;

        return $self;
    }

    /**
     * A list of property names that will be included on the action. See the documentation for more information.
     *
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
     * The type of status.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The URL endpoint that will be called when the action is triggered.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * @param ActionConfirmationBody|ActionConfirmationBodyShape $confirmation
     */
    public function withConfirmation(
        ActionConfirmationBody|array $confirmation
    ): self {
        $self = clone $this;
        $self['confirmation'] = $confirmation;

        return $self;
    }

    /**
     * The label for this property as you'd like it displayed to users.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
