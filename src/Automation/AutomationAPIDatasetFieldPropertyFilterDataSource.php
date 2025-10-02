<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIDatasetFieldPropertyFilterDataSource\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_dataset_field_property_filter_data_source = array{
 *   datasetFieldName: string,
 *   name: string,
 *   propertyName: string,
 *   type: value-of<Type>,
 *   sortBy?: AutomationAPISort,
 * }
 */
final class AutomationAPIDatasetFieldPropertyFilterDataSource implements BaseModel
{
    /** @use SdkModel<automation_api_dataset_field_property_filter_data_source> */
    use SdkModel;

    #[Api]
    public string $datasetFieldName;

    #[Api]
    public string $name;

    #[Api]
    public string $propertyName;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?AutomationAPISort $sortBy;

    /**
     * `new AutomationAPIDatasetFieldPropertyFilterDataSource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIDatasetFieldPropertyFilterDataSource::with(
     *   datasetFieldName: ..., name: ..., propertyName: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIDatasetFieldPropertyFilterDataSource)
     *   ->withDatasetFieldName(...)
     *   ->withName(...)
     *   ->withPropertyName(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $datasetFieldName,
        string $name,
        string $propertyName,
        Type|string $type = 'DATASET_FIELD_PROPERTY_FILTER',
        ?AutomationAPISort $sortBy = null,
    ): self {
        $obj = new self;

        $obj->datasetFieldName = $datasetFieldName;
        $obj->name = $name;
        $obj->propertyName = $propertyName;
        $obj->type = $type instanceof Type ? $type->value : $type;

        null !== $sortBy && $obj->sortBy = $sortBy;

        return $obj;
    }

    public function withDatasetFieldName(string $datasetFieldName): self
    {
        $obj = clone $this;
        $obj->datasetFieldName = $datasetFieldName;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj->propertyName = $propertyName;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withSortBy(AutomationAPISort $sortBy): self
    {
        $obj = clone $this;
        $obj->sortBy = $sortBy;

        return $obj;
    }
}
