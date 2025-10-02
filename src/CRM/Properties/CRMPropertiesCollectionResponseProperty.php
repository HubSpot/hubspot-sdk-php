<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMProperty;
use HubspotSDK\Paging;

/**
 * @phpstan-type crm_properties_collection_response_property = array{
 *   results: list<CRMProperty>, paging?: Paging
 * }
 */
final class CRMPropertiesCollectionResponseProperty implements BaseModel
{
    /** @use SdkModel<crm_properties_collection_response_property> */
    use SdkModel;

    /** @var list<CRMProperty> $results */
    #[Api(list: CRMProperty::class)]
    public array $results;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CRMPropertiesCollectionResponseProperty()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPropertiesCollectionResponseProperty::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPropertiesCollectionResponseProperty)->withResults(...)
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
     * @param list<CRMProperty> $results
     */
    public static function with(array $results, ?Paging $paging = null): self
    {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<CRMProperty> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
