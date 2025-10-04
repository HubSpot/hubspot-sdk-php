<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Marketing\Emails\MarketingEmailsPaging;

/**
 * @phpstan-type crm_properties_collection_response_property_group = array{
 *   results: list<CRMPropertiesPropertyGroup>, paging?: MarketingEmailsPaging
 * }
 */
final class CRMPropertiesCollectionResponsePropertyGroup implements BaseModel, ResponseConverter
{
    /** @use SdkModel<crm_properties_collection_response_property_group> */
    use SdkModel;

    use SdkResponse;

    /** @var list<CRMPropertiesPropertyGroup> $results */
    #[Api(list: CRMPropertiesPropertyGroup::class)]
    public array $results;

    #[Api(optional: true)]
    public ?MarketingEmailsPaging $paging;

    /**
     * `new CRMPropertiesCollectionResponsePropertyGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPropertiesCollectionResponsePropertyGroup::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPropertiesCollectionResponsePropertyGroup)->withResults(...)
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
     * @param list<CRMPropertiesPropertyGroup> $results
     */
    public static function with(
        array $results,
        ?MarketingEmailsPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<CRMPropertiesPropertyGroup> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(MarketingEmailsPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
