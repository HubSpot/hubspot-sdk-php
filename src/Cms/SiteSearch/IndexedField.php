<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type indexed_field = array{
 *   metadataField: bool, name: string, value: mixed, values: list<mixed>
 * }
 */
final class IndexedField implements BaseModel
{
    /** @use SdkModel<indexed_field> */
    use SdkModel;

    #[Api]
    public bool $metadataField;

    #[Api]
    public string $name;

    #[Api]
    public mixed $value;

    /** @var list<mixed> $values */
    #[Api(list: 'mixed')]
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
        $obj = new self;

        $obj->metadataField = $metadataField;
        $obj->name = $name;
        $obj->value = $value;
        $obj->values = $values;

        return $obj;
    }

    public function withMetadataField(bool $metadataField): self
    {
        $obj = clone $this;
        $obj->metadataField = $metadataField;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withValue(mixed $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }

    /**
     * @param list<mixed> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj->values = $values;

        return $obj;
    }
}
