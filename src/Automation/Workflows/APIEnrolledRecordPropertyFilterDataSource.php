<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIEnrolledRecordPropertyFilterDataSource\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APISortShape from \HubspotSDK\Automation\Workflows\APISort
 *
 * @phpstan-type APIEnrolledRecordPropertyFilterDataSourceShape = array{
 *   name: string,
 *   propertyName: string,
 *   recordFieldName: string,
 *   type: Type|value-of<Type>,
 *   sortBy?: null|APISort|APISortShape,
 * }
 */
final class APIEnrolledRecordPropertyFilterDataSource implements BaseModel
{
    /** @use SdkModel<APIEnrolledRecordPropertyFilterDataSourceShape> */
    use SdkModel;

    #[Required]
    public string $name;

    #[Required]
    public string $propertyName;

    #[Required]
    public string $recordFieldName;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?APISort $sortBy;

    /**
     * `new APIEnrolledRecordPropertyFilterDataSource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIEnrolledRecordPropertyFilterDataSource::with(
     *   name: ..., propertyName: ..., recordFieldName: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIEnrolledRecordPropertyFilterDataSource)
     *   ->withName(...)
     *   ->withPropertyName(...)
     *   ->withRecordFieldName(...)
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
        string $name,
        string $propertyName,
        string $recordFieldName,
        Type|string $type = 'ENROLLED_RECORD_PROPERTY_FILTER',
        APISort|array|null $sortBy = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['propertyName'] = $propertyName;
        $self['recordFieldName'] = $recordFieldName;
        $self['type'] = $type;

        null !== $sortBy && $self['sortBy'] = $sortBy;

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

    public function withRecordFieldName(string $recordFieldName): self
    {
        $self = clone $this;
        $self['recordFieldName'] = $recordFieldName;

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
