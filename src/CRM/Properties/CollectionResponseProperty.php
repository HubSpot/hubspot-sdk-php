<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Property;
use HubspotSDK\Marketing\Emails\MarketingEmailsPaging;

/**
 * @phpstan-type collection_response_property = array{
 *   results: list<Property>, paging?: MarketingEmailsPaging
 * }
 */
final class CollectionResponseProperty implements BaseModel
{
    /** @use SdkModel<collection_response_property> */
    use SdkModel;

    /** @var list<Property> $results */
    #[Api(list: Property::class)]
    public array $results;

    #[Api(optional: true)]
    public ?MarketingEmailsPaging $paging;

    /**
     * `new CollectionResponseProperty()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseProperty::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseProperty)->withResults(...)
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
     * @param list<Property> $results
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
     * @param list<Property> $results
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
