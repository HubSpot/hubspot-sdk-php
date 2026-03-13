<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Configuration for displayed info on a card.
 *
 * @phpstan-import-type CardDisplayPropertyShape from \HubspotSDK\Crm\Extensions\Cards\CardDisplayProperty
 *
 * @phpstan-type CardDisplayBodyShape = array{
 *   properties: list<CardDisplayProperty|CardDisplayPropertyShape>
 * }
 */
final class CardDisplayBody implements BaseModel
{
    /** @use SdkModel<CardDisplayBodyShape> */
    use SdkModel;

    /**
     * Card display properties. These will will be rendered as "label : value" pairs in the card UI. See the [example card](#) in the overview docs for more details.
     *
     * @var list<CardDisplayProperty> $properties
     */
    #[Required(list: CardDisplayProperty::class)]
    public array $properties;

    /**
     * `new CardDisplayBody()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardDisplayBody::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardDisplayBody)->withProperties(...)
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
     * @param list<CardDisplayProperty|CardDisplayPropertyShape> $properties
     */
    public static function with(array $properties): self
    {
        $self = new self;

        $self['properties'] = $properties;

        return $self;
    }

    /**
     * Card display properties. These will will be rendered as "label : value" pairs in the card UI. See the [example card](#) in the overview docs for more details.
     *
     * @param list<CardDisplayProperty|CardDisplayPropertyShape> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
