<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\ColumnRequest\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Option;

/**
 * @phpstan-type ColumnRequestShape = array{
 *   id: int,
 *   label: string,
 *   name: string,
 *   options: list<\HubspotSDK\Option>,
 *   type: value-of<Type>,
 *   foreignColumnId?: int|null,
 *   foreignTableId?: int|null,
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
    #[Api]
    public int $id;

    /**
     * Label of the column.
     */
    #[Api]
    public string $label;

    /**
     * Name of the column.
     */
    #[Api]
    public string $name;

    /**
     * Options to choose for select and multi-select columns.
     *
     * @var list<Option> $options
     */
    #[Api(list: Option::class)]
    public array $options;

    /**
     * Type of the column.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * The id of the column from another table to which the column refers/points to.
     */
    #[Api(optional: true)]
    public ?int $foreignColumnId;

    /**
     * The id of another table to which the column refers/points to.
     */
    #[Api(optional: true)]
    public ?int $foreignTableId;

    #[Api(optional: true)]
    public ?int $maxNumberOfCharacters;

    #[Api(optional: true)]
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
     * @param list<Option|array{
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     *   displayOrder?: int|null,
     * }> $options
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $id,
        string $label,
        string $name,
        array $options,
        Type|string $type,
        ?int $foreignColumnId = null,
        ?int $foreignTableId = null,
        ?int $maxNumberOfCharacters = null,
        ?int $maxNumberOfOptions = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['options'] = $options;
        $obj['type'] = $type;

        null !== $foreignColumnId && $obj['foreignColumnId'] = $foreignColumnId;
        null !== $foreignTableId && $obj['foreignTableId'] = $foreignTableId;
        null !== $maxNumberOfCharacters && $obj['maxNumberOfCharacters'] = $maxNumberOfCharacters;
        null !== $maxNumberOfOptions && $obj['maxNumberOfOptions'] = $maxNumberOfOptions;

        return $obj;
    }

    /**
     * Column Id.
     */
    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Label of the column.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * Name of the column.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Options to choose for select and multi-select columns.
     *
     * @param list<Option|array{
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     *   displayOrder?: int|null,
     * }> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj['options'] = $options;

        return $obj;
    }

    /**
     * Type of the column.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The id of the column from another table to which the column refers/points to.
     */
    public function withForeignColumnID(int $foreignColumnID): self
    {
        $obj = clone $this;
        $obj['foreignColumnId'] = $foreignColumnID;

        return $obj;
    }

    /**
     * The id of another table to which the column refers/points to.
     */
    public function withForeignTableID(int $foreignTableID): self
    {
        $obj = clone $this;
        $obj['foreignTableId'] = $foreignTableID;

        return $obj;
    }

    public function withMaxNumberOfCharacters(int $maxNumberOfCharacters): self
    {
        $obj = clone $this;
        $obj['maxNumberOfCharacters'] = $maxNumberOfCharacters;

        return $obj;
    }

    public function withMaxNumberOfOptions(int $maxNumberOfOptions): self
    {
        $obj = clone $this;
        $obj['maxNumberOfOptions'] = $maxNumberOfOptions;

        return $obj;
    }
}
