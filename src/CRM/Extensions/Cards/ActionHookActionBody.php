<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Extensions\Cards\ActionHookActionBody\HTTPMethod;
use HubspotSDK\CRM\Extensions\Cards\ActionHookActionBody\Type;

/**
 * @phpstan-type ActionHookActionBodyShape = array{
 *   httpMethod: value-of<HTTPMethod>,
 *   propertyNamesIncluded: list<string>,
 *   type: value-of<Type>,
 *   url: string,
 *   confirmation?: ActionConfirmationBody,
 *   label?: string,
 * }
 */
final class ActionHookActionBody implements BaseModel
{
    /** @use SdkModel<ActionHookActionBodyShape> */
    use SdkModel;

    /** @var value-of<HTTPMethod> $httpMethod */
    #[Api(enum: HTTPMethod::class)]
    public string $httpMethod;

    /** @var list<string> $propertyNamesIncluded */
    #[Api(list: 'string')]
    public array $propertyNamesIncluded;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public string $url;

    #[Api(optional: true)]
    public ?ActionConfirmationBody $confirmation;

    #[Api(optional: true)]
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
     */
    public static function with(
        HTTPMethod|string $httpMethod,
        array $propertyNamesIncluded,
        string $url,
        Type|string $type = 'ACTION_HOOK',
        ?ActionConfirmationBody $confirmation = null,
        ?string $label = null,
    ): self {
        $obj = new self;

        $obj['httpMethod'] = $httpMethod;
        $obj->propertyNamesIncluded = $propertyNamesIncluded;
        $obj['type'] = $type;
        $obj->url = $url;

        null !== $confirmation && $obj->confirmation = $confirmation;
        null !== $label && $obj->label = $label;

        return $obj;
    }

    /**
     * @param HTTPMethod|value-of<HTTPMethod> $httpMethod
     */
    public function withHTTPMethod(HTTPMethod|string $httpMethod): self
    {
        $obj = clone $this;
        $obj['httpMethod'] = $httpMethod;

        return $obj;
    }

    /**
     * @param list<string> $propertyNamesIncluded
     */
    public function withPropertyNamesIncluded(
        array $propertyNamesIncluded
    ): self {
        $obj = clone $this;
        $obj->propertyNamesIncluded = $propertyNamesIncluded;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    public function withConfirmation(ActionConfirmationBody $confirmation): self
    {
        $obj = clone $this;
        $obj->confirmation = $confirmation;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }
}
