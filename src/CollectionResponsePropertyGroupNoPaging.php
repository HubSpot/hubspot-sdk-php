<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PropertyGroupShape from \HubspotSDK\PropertyGroup
 *
 * @phpstan-type CollectionResponsePropertyGroupNoPagingShape = array{
 *   results: list<PropertyGroup|PropertyGroupShape>
 * }
 */
final class CollectionResponsePropertyGroupNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePropertyGroupNoPagingShape> */
    use SdkModel;

    /** @var list<PropertyGroup> $results */
    #[Required(list: PropertyGroup::class)]
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
     * @param list<PropertyGroup|PropertyGroupShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<PropertyGroup|PropertyGroupShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
