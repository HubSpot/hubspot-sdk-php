<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\SiteSearch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IndexedFieldShape = array{
 *   metadataField: bool, name: string, value: mixed, values: list<mixed>
 * }
 */
final class IndexedField implements BaseModel
{
    /** @use SdkModel<IndexedFieldShape> */
    use SdkModel;

    /**
     * Indicates whether the field is a metadata field.
     */
    #[Required]
    public bool $metadataField;

    /**
     * The name of the indexed field.
     */
    #[Required]
    public string $name;

    /**
     * The primary value of the indexed field.
     */
    #[Required]
    public mixed $value;

    /** @var list<mixed> $values */
    #[Required(list: 'mixed')]
    public array $values;

    /**
     * `new IndexedField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IndexedField::with(metadataField: ..., name: ..., value: ..., values: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IndexedField)
     *   ->withMetadataField(...)
     *   ->withName(...)
     *   ->withValue(...)
     *   ->withValues(...)
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
     * @param list<mixed> $values
     */
    public static function with(
        bool $metadataField,
        string $name,
        mixed $value,
        array $values
    ): self {
        $self = new self;

        $self['metadataField'] = $metadataField;
        $self['name'] = $name;
        $self['value'] = $value;
        $self['values'] = $values;

        return $self;
    }

    /**
     * Indicates whether the field is a metadata field.
     */
    public function withMetadataField(bool $metadataField): self
    {
        $self = clone $this;
        $self['metadataField'] = $metadataField;

        return $self;
    }

    /**
     * The name of the indexed field.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The primary value of the indexed field.
     */
    public function withValue(mixed $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * @param list<mixed> $values
     */
    public function withValues(array $values): self
    {
        $self = clone $this;
        $self['values'] = $values;

        return $self;
    }
}
