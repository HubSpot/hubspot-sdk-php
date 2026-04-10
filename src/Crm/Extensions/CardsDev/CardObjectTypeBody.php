<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Extensions\CardsDev\CardObjectTypeBody\Name;

/**
 * @phpstan-type CardObjectTypeBodyShape = array{
 *   name: Name|value-of<Name>, propertiesToSend: list<string>
 * }
 */
final class CardObjectTypeBody implements BaseModel
{
    /** @use SdkModel<CardObjectTypeBodyShape> */
    use SdkModel;

    /**
     * A CRM object type where this card should be displayed.
     *
     * @var value-of<Name> $name
     */
    #[Required(enum: Name::class)]
    public string $name;

    /**
     * An array of properties that should be sent to this card's target URL when the data fetch request is made. Must be valid properties for the corresponding CRM object type.
     *
     * @var list<string> $propertiesToSend
     */
    #[Required(list: 'string')]
    public array $propertiesToSend;

    /**
     * `new CardObjectTypeBody()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardObjectTypeBody::with(name: ..., propertiesToSend: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardObjectTypeBody)->withName(...)->withPropertiesToSend(...)
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
     * @param Name|value-of<Name> $name
     * @param list<string> $propertiesToSend
     */
    public static function with(
        Name|string $name,
        array $propertiesToSend
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['propertiesToSend'] = $propertiesToSend;

        return $self;
    }

    /**
     * A CRM object type where this card should be displayed.
     *
     * @param Name|value-of<Name> $name
     */
    public function withName(Name|string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * An array of properties that should be sent to this card's target URL when the data fetch request is made. Must be valid properties for the corresponding CRM object type.
     *
     * @param list<string> $propertiesToSend
     */
    public function withPropertiesToSend(array $propertiesToSend): self
    {
        $self = clone $this;
        $self['propertiesToSend'] = $propertiesToSend;

        return $self;
    }
}
