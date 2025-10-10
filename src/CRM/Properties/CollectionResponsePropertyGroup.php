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
 * @phpstan-type collection_response_property_group = array{
 *   results: list<PropertyGroup>, paging?: MarketingEmailsPaging
 * }
 */
final class CollectionResponsePropertyGroup implements BaseModel, ResponseConverter
{
    /** @use SdkModel<collection_response_property_group> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PropertyGroup> $results */
    #[Api(list: PropertyGroup::class)]
    public array $results;

    #[Api(optional: true)]
    public ?MarketingEmailsPaging $paging;

    /**
     * `new CollectionResponsePropertyGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePropertyGroup::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePropertyGroup)->withResults(...)
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
     * @param list<PropertyGroup> $results
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
     * @param list<PropertyGroup> $results
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
