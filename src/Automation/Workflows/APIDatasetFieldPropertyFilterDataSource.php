<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIDatasetFieldPropertyFilterDataSource\Type;
use HubspotSDK\Automation\Workflows\APISort\Order;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIDatasetFieldPropertyFilterDataSourceShape = array{
 *   datasetFieldName: string,
 *   name: string,
 *   propertyName: string,
 *   type: value-of<Type>,
 *   sortBy?: APISort|null,
 * }
 */
final class APIDatasetFieldPropertyFilterDataSource implements BaseModel
{
    /** @use SdkModel<APIDatasetFieldPropertyFilterDataSourceShape> */
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
    public ?APISort $sortBy;

    /**
     * `new APIDatasetFieldPropertyFilterDataSource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIDatasetFieldPropertyFilterDataSource::with(
     *   datasetFieldName: ..., name: ..., propertyName: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIDatasetFieldPropertyFilterDataSource)
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
     * @param APISort|array{
     *   order: value-of<Order>, property: string, missing?: string|null
     * } $sortBy
     */
    public static function with(
        string $datasetFieldName,
        string $name,
        string $propertyName,
        Type|string $type = 'DATASET_FIELD_PROPERTY_FILTER',
        APISort|array|null $sortBy = null,
    ): self {
        $obj = new self;

        $obj['datasetFieldName'] = $datasetFieldName;
        $obj['name'] = $name;
        $obj['propertyName'] = $propertyName;
        $obj['type'] = $type;

        null !== $sortBy && $obj['sortBy'] = $sortBy;

        return $obj;
    }

    public function withDatasetFieldName(string $datasetFieldName): self
    {
        $obj = clone $this;
        $obj['datasetFieldName'] = $datasetFieldName;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj['propertyName'] = $propertyName;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param APISort|array{
     *   order: value-of<Order>, property: string, missing?: string|null
     * } $sortBy
     */
    public function withSortBy(APISort|array $sortBy): self
    {
        $obj = clone $this;
        $obj['sortBy'] = $sortBy;

        return $obj;
    }
}
