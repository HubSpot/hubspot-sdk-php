<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayProperty\DataType;
use HubspotSDK\Crm\Extensions\Cards\DisplayOption\Type;

/**
 * Definition for a card display property.
 *
 * @phpstan-type CardDisplayPropertyShape = array{
 *   dataType: value-of<DataType>,
 *   label: string,
 *   name: string,
 *   options: list<DisplayOption>,
 * }
 */
final class CardDisplayProperty implements BaseModel
{
    /** @use SdkModel<CardDisplayPropertyShape> */
    use SdkModel;

    /**
     * Type of data represented by this property.
     *
     * @var value-of<DataType> $dataType
     */
    #[Api(enum: DataType::class)]
    public string $dataType;

    /**
     * The label for this property as you'd like it displayed to users.
     */
    #[Api]
    public string $label;

    /**
     * An internal identifier for this property. This value must be unique TODO.
     */
    #[Api]
    public string $name;

    /**
     * An array of available options that can be displayed. Only used in when `dataType` is `STATUS`.
     *
     * @var list<DisplayOption> $options
     */
    #[Api(list: DisplayOption::class)]
    public array $options;

    /**
     * `new CardDisplayProperty()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardDisplayProperty::with(dataType: ..., label: ..., name: ..., options: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardDisplayProperty)
     *   ->withDataType(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withOptions(...)
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
     * @param DataType|value-of<DataType> $dataType
     * @param list<DisplayOption|array{
     *   label: string, name: string, type: value-of<Type>
     * }> $options
     */
    public static function with(
        DataType|string $dataType,
        string $label,
        string $name,
        array $options
    ): self {
        $obj = new self;

        $obj['dataType'] = $dataType;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['options'] = $options;

        return $obj;
    }

    /**
     * Type of data represented by this property.
     *
     * @param DataType|value-of<DataType> $dataType
     */
    public function withDataType(DataType|string $dataType): self
    {
        $obj = clone $this;
        $obj['dataType'] = $dataType;

        return $obj;
    }

    /**
     * The label for this property as you'd like it displayed to users.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * An internal identifier for this property. This value must be unique TODO.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * An array of available options that can be displayed. Only used in when `dataType` is `STATUS`.
     *
     * @param list<DisplayOption|array{
     *   label: string, name: string, type: value-of<Type>
     * }> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj['options'] = $options;

        return $obj;
    }
}
