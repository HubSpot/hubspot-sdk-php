<?php

declare(strict_types=1);

namespace HubspotSDK\Meta\Origins;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type IPRangeShape from \HubspotSDK\Meta\Origins\IPRange
 *
 * @phpstan-type CollectionResponseIPRangeNoPagingShape = array{
 *   results: list<IPRange|IPRangeShape>
 * }
 */
final class CollectionResponseIPRangeNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseIPRangeNoPagingShape> */
    use SdkModel;

    /**
     * An array of IpRange objects, each representing a specific IP range with associated details such as CIDR, direction, service, and description.
     *
     * @var list<IPRange> $results
     */
    #[Required(list: IPRange::class)]
    public array $results;

    /**
     * `new CollectionResponseIPRangeNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseIPRangeNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseIPRangeNoPaging)->withResults(...)
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
     * @param list<IPRange|IPRangeShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * An array of IpRange objects, each representing a specific IP range with associated details such as CIDR, direction, service, and description.
     *
     * @param list<IPRange|IPRangeShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
