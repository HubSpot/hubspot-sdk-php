<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Cms\Hubdb\ColumnRequest\Type;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OptionShape from \HubSpotSDK\Cms\Hubdb\Option
 *
 * @phpstan-type ColumnRequestShape = array{
 *   id: int,
 *   label: string,
 *   name: string,
 *   options: list<Option|OptionShape>,
 *   type: Type|value-of<Type>,
 *   foreignColumnID?: int|null,
 *   foreignTableID?: int|null,
 *   maxNumberOfCharacters?: int|null,
 *   maxNumberOfOptions?: int|null,
 * }
 */
final class ColumnRequest implements BaseModel
{
    /** @use SdkModel<ColumnRequestShape> */
    use SdkModel;

    /**
     * Column Id.
     */
    #[Required]
    public int $id;

    /**
     * Label of the column.
     */
    #[Required]
    public string $label;

    /**
     * Name of the column.
     */
    #[Required]
    public string $name;

    /**
     * Options to choose for select and multi-select columns.
     *
     * @var list<Option> $options
     */
    #[Required(list: Option::class)]
    public array $options;

    /**
     * Type of the column.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The id of the column from another table to which the column refers/points to.
     */
    #[Optional('foreignColumnId')]
    public ?int $foreignColumnID;

    /**
     * The id of another table to which the column refers/points to.
     */
    #[Optional('foreignTableId')]
    public ?int $foreignTableID;

    /**
     * Defines the maximum number of characters allowed in the column.
     */
    #[Optional]
    public ?int $maxNumberOfCharacters;

    /**
     * Specifies the maximum number of options that can be set for select and multi-select columns.
     */
    #[Optional]
    public ?int $maxNumberOfOptions;

    /**
     * `new ColumnRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ColumnRequest::with(id: ..., label: ..., name: ..., options: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ColumnRequest)
     *   ->withID(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withOptions(...)
     *   ->withType(...)
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
     * @param list<Option|OptionShape> $options
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $id,
        string $label,
        string $name,
        array $options,
        Type|string $type,
        ?int $foreignColumnID = null,
        ?int $foreignTableID = null,
        ?int $maxNumberOfCharacters = null,
        ?int $maxNumberOfOptions = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['options'] = $options;
        $self['type'] = $type;

        null !== $foreignColumnID && $self['foreignColumnID'] = $foreignColumnID;
        null !== $foreignTableID && $self['foreignTableID'] = $foreignTableID;
        null !== $maxNumberOfCharacters && $self['maxNumberOfCharacters'] = $maxNumberOfCharacters;
        null !== $maxNumberOfOptions && $self['maxNumberOfOptions'] = $maxNumberOfOptions;

        return $self;
    }

    /**
     * Column Id.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Label of the column.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Name of the column.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Options to choose for select and multi-select columns.
     *
     * @param list<Option|OptionShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    /**
     * Type of the column.
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
     * The id of the column from another table to which the column refers/points to.
     */
    public function withForeignColumnID(int $foreignColumnID): self
    {
        $self = clone $this;
        $self['foreignColumnID'] = $foreignColumnID;

        return $self;
    }

    /**
     * The id of another table to which the column refers/points to.
     */
    public function withForeignTableID(int $foreignTableID): self
    {
        $self = clone $this;
        $self['foreignTableID'] = $foreignTableID;

        return $self;
    }

    /**
     * Defines the maximum number of characters allowed in the column.
     */
    public function withMaxNumberOfCharacters(int $maxNumberOfCharacters): self
    {
        $self = clone $this;
        $self['maxNumberOfCharacters'] = $maxNumberOfCharacters;

        return $self;
    }

    /**
     * Specifies the maximum number of options that can be set for select and multi-select columns.
     */
    public function withMaxNumberOfOptions(int $maxNumberOfOptions): self
    {
        $self = clone $this;
        $self['maxNumberOfOptions'] = $maxNumberOfOptions;

        return $self;
    }
}
