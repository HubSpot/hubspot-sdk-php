<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\Schemas\ObjectSchema;

/**
 * @phpstan-type collection_response_object_schema_no_paging = array{
 *   results: list<ObjectSchema>
 * }
 */
final class CollectionResponseObjectSchemaNoPaging implements BaseModel
{
    /** @use SdkModel<collection_response_object_schema_no_paging> */
    use SdkModel;

    /** @var list<ObjectSchema> $results */
    #[Api(list: ObjectSchema::class)]
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
     * @param list<ObjectSchema> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<ObjectSchema> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
