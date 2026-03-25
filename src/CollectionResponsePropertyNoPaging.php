<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Cms\MediaBridge\Property1;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type Property1Shape from \HubspotSDK\Cms\MediaBridge\Property1
 *
 * @phpstan-type CollectionResponsePropertyNoPagingShape = array{
 *   results: list<Property1|Property1Shape>
 * }
 */
final class CollectionResponsePropertyNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePropertyNoPagingShape> */
    use SdkModel;

    /** @var list<Property1> $results */
    #[Required(list: Property1::class)]
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
     * @param list<Property1|Property1Shape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<Property1|Property1Shape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
