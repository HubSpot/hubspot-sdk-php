<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Extensions\Cards\CardObjectTypeBody\Name;

/**
 * @phpstan-type card_object_type_body = array{
 *   name: value-of<Name>, propertiesToSend: list<string>
 * }
 */
final class CardObjectTypeBody implements BaseModel
{
    /** @use SdkModel<card_object_type_body> */
    use SdkModel;

    /**
     * A CRM object type where this card should be displayed.
     *
     * @var value-of<Name> $name
     */
    #[Api(enum: Name::class)]
    public string $name;

    /**
     * An array of properties that should be sent to this card's target URL when the data fetch request is made. Must be valid properties for the corresponding CRM object type.
     *
     * @var list<string> $propertiesToSend
     */
    #[Api(list: 'string')]
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
        $obj = new self;

        $obj['name'] = $name;
        $obj->propertiesToSend = $propertiesToSend;

        return $obj;
    }

    /**
     * A CRM object type where this card should be displayed.
     *
     * @param Name|value-of<Name> $name
     */
    public function withName(Name|string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * An array of properties that should be sent to this card's target URL when the data fetch request is made. Must be valid properties for the corresponding CRM object type.
     *
     * @param list<string> $propertiesToSend
     */
    public function withPropertiesToSend(array $propertiesToSend): self
    {
        $obj = clone $this;
        $obj->propertiesToSend = $propertiesToSend;

        return $obj;
    }
}
