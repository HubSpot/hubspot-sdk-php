<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type collection_response_property_no_paging = array{
 *   results: list<Property1>
 * }
 */
final class CollectionResponsePropertyNoPaging implements BaseModel
{
    /** @use SdkModel<collection_response_property_no_paging> */
    use SdkModel;

    /** @var list<Property1> $results */
    #[Api(list: Property1::class)]
    public array $results;

    /**
     * `new CollectionResponsePropertyNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePropertyNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePropertyNoPaging)->withResults(...)
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
     * @param list<Property1> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<Property1> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
