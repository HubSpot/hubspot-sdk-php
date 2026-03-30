<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\ObjectSchemas;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ObjectSchemaShape from \HubspotSDK\Crm\ObjectSchemas\ObjectSchema
 *
 * @phpstan-type CollectionResponseObjectSchemaNoPagingShape = array{
 *   results: list<ObjectSchema|ObjectSchemaShape>
 * }
 */
final class CollectionResponseObjectSchemaNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseObjectSchemaNoPagingShape> */
    use SdkModel;

    /** @var list<ObjectSchema> $results */
    #[Required(list: ObjectSchema::class)]
    public array $results;

    /**
     * `new CollectionResponseObjectSchemaNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseObjectSchemaNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseObjectSchemaNoPaging)->withResults(...)
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
     * @param list<ObjectSchema|ObjectSchemaShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<ObjectSchema|ObjectSchemaShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
