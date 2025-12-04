<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Properties\PropertyGroup;

/**
 * @phpstan-type CollectionResponsePropertyGroupNoPagingShape = array{
 *   results: list<\HubspotSDK\Crm\Properties\PropertyGroup>
 * }
 */
final class CollectionResponsePropertyGroupNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePropertyGroupNoPagingShape> */
    use SdkModel;

    /** @var list<PropertyGroup> $results */
    #[Api(list: PropertyGroup::class)]
    public array $results;

    /**
     * `new CollectionResponsePropertyGroupNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePropertyGroupNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePropertyGroupNoPaging)->withResults(...)
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
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

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
}
