<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIDatasetFieldPropertyFilterDataSource\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APISortShape from \HubspotSDK\Automation\Workflows\APISort
 *
 * @phpstan-type APIDatasetFieldPropertyFilterDataSourceShape = array{
 *   datasetFieldName: string,
 *   name: string,
 *   propertyName: string,
 *   type: Type|value-of<Type>,
 *   sortBy?: null|APISort|APISortShape,
 * }
 */
final class APIDatasetFieldPropertyFilterDataSource implements BaseModel
{
    /** @use SdkModel<APIDatasetFieldPropertyFilterDataSourceShape> */
    use SdkModel;

    #[Required]
    public string $datasetFieldName;

    #[Required]
    public string $name;

    #[Required]
    public string $propertyName;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
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
     * @param APISortShape $sortBy
     */
    public static function with(
        string $datasetFieldName,
        string $name,
        string $propertyName,
        Type|string $type = 'DATASET_FIELD_PROPERTY_FILTER',
        APISort|array|null $sortBy = null,
    ): self {
        $self = new self;

        $self['datasetFieldName'] = $datasetFieldName;
        $self['name'] = $name;
        $self['propertyName'] = $propertyName;
        $self['type'] = $type;

        null !== $sortBy && $self['sortBy'] = $sortBy;

        return $self;
    }

    public function withDatasetFieldName(string $datasetFieldName): self
    {
        $self = clone $this;
        $self['datasetFieldName'] = $datasetFieldName;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param APISortShape $sortBy
     */
    public function withSortBy(APISort|array $sortBy): self
    {
        $self = clone $this;
        $self['sortBy'] = $sortBy;

        return $self;
    }
}
