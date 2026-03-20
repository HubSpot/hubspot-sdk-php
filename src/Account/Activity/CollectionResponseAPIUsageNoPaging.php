<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APIUsageShape from \HubspotSDK\Account\Activity\APIUsage
 *
 * @phpstan-type CollectionResponseAPIUsageNoPagingShape = array{
 *   results: list<APIUsage|APIUsageShape>
 * }
 */
final class CollectionResponseAPIUsageNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseAPIUsageNoPagingShape> */
    use SdkModel;

    /** @var list<APIUsage> $results */
    #[Required(list: APIUsage::class)]
    public array $results;

    /**
     * `new CollectionResponseAPIUsageNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseAPIUsageNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseAPIUsageNoPaging)->withResults(...)
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
     * @param list<APIUsage|APIUsageShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<APIUsage|APIUsageShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
