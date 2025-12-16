<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Schemas;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;

/**
 * @phpstan-import-type ObjectSchemaShape from \HubspotSDK\Crm\Objects\Schemas\ObjectSchema
 *
 * @phpstan-type SchemaListResponseShape = array{results: list<ObjectSchemaShape>}
 */
final class SchemaListResponse implements BaseModel
{
    /** @use SdkModel<SchemaListResponseShape> */
    use SdkModel;

    /** @var list<ObjectSchema> $results */
    #[Required(list: ObjectSchema::class)]
    public array $results;

    /**
     * `new SchemaListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaListResponse::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SchemaListResponse)->withResults(...)
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
     * @param list<ObjectSchemaShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<ObjectSchemaShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
