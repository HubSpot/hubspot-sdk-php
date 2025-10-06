<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIEnrolledRecordPropertyFilterDataSource\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_enrolled_record_property_filter_data_source = array{
 *   name: string,
 *   propertyName: string,
 *   recordFieldName: string,
 *   type: value-of<Type>,
 *   sortBy?: APISort,
 * }
 */
final class APIEnrolledRecordPropertyFilterDataSource implements BaseModel
{
    /** @use SdkModel<api_enrolled_record_property_filter_data_source> */
    use SdkModel;

    #[Api]
    public string $name;

    #[Api]
    public string $propertyName;

    #[Api]
    public string $recordFieldName;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
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
     */
    public static function with(
        string $name,
        string $propertyName,
        string $recordFieldName,
        Type|string $type = 'ENROLLED_RECORD_PROPERTY_FILTER',
        ?APISort $sortBy = null,
    ): self {
        $obj = new self;

        $obj->name = $name;
        $obj->propertyName = $propertyName;
        $obj->recordFieldName = $recordFieldName;
        $obj['type'] = $type;

        null !== $sortBy && $obj->sortBy = $sortBy;

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

    public function withRecordFieldName(string $recordFieldName): self
    {
        $obj = clone $this;
        $obj->recordFieldName = $recordFieldName;

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

    public function withSortBy(APISort $sortBy): self
    {
        $obj = clone $this;
        $obj->sortBy = $sortBy;

        return $obj;
    }
}
