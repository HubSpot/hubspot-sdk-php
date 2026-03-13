<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayProperty\DataType;

/**
 * Definition for a card display property.
 *
 * @phpstan-import-type DisplayOptionShape from \HubspotSDK\Crm\Extensions\Cards\DisplayOption
 *
 * @phpstan-type CardDisplayPropertyShape = array{
 *   dataType: DataType|value-of<DataType>,
 *   label: string,
 *   name: string,
 *   options: list<DisplayOption|DisplayOptionShape>,
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
    #[Required(enum: DataType::class)]
    public string $dataType;

    /**
     * The label for this property as you'd like it displayed to users.
     */
    #[Required]
    public string $label;

    /**
     * An internal identifier for this property. This value must be unique TODO.
     */
    #[Required]
    public string $name;

    /**
     * An array of available options that can be displayed. Only used in when `dataType` is `STATUS`.
     *
     * @var list<DisplayOption> $options
     */
    #[Required(list: DisplayOption::class)]
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
     * @param list<DisplayOption|DisplayOptionShape> $options
     */
    public static function with(
        DataType|string $dataType,
        string $label,
        string $name,
        array $options
    ): self {
        $self = new self;

        $self['dataType'] = $dataType;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['options'] = $options;

        return $self;
    }

    /**
     * Type of data represented by this property.
     *
     * @param DataType|value-of<DataType> $dataType
     */
    public function withDataType(DataType|string $dataType): self
    {
        $self = clone $this;
        $self['dataType'] = $dataType;

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

    /**
     * An internal identifier for this property. This value must be unique TODO.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * An array of available options that can be displayed. Only used in when `dataType` is `STATUS`.
     *
     * @param list<DisplayOption|DisplayOptionShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }
}
