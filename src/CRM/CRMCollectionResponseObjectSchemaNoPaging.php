<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_collection_response_object_schema_no_paging = array{
 *   results: list<CRMObjectSchema>
 * }
 */
final class CRMCollectionResponseObjectSchemaNoPaging implements BaseModel
{
    /** @use SdkModel<crm_collection_response_object_schema_no_paging> */
    use SdkModel;

    /** @var list<CRMObjectSchema> $results */
    #[Api(list: CRMObjectSchema::class)]
    public array $results;

    /**
     * `new CRMCollectionResponseObjectSchemaNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMCollectionResponseObjectSchemaNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMCollectionResponseObjectSchemaNoPaging)->withResults(...)
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
     * @param list<CRMObjectSchema> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<CRMObjectSchema> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
