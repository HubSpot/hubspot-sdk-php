<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayProperty\DataType;

/**
 * Configuration for displayed info on a card.
 *
 * @phpstan-type CardDisplayBodyShape = array{
 *   properties: list<CardDisplayProperty>
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
     * @param list<CardDisplayProperty|array{
     *   dataType: value-of<DataType>,
     *   label: string,
     *   name: string,
     *   options: list<DisplayOption>,
     * }> $properties
     */
    public static function with(array $properties): self
    {
        $obj = new self;

        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * Card display properties. These will will be rendered as "label : value" pairs in the card UI. See the [example card](#) in the overview docs for more details.
     *
     * @param list<CardDisplayProperty|array{
     *   dataType: value-of<DataType>,
     *   label: string,
     *   name: string,
     *   options: list<DisplayOption>,
     * }> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}
