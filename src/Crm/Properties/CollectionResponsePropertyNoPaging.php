<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Property;

/**
 * @phpstan-import-type PropertyShape from \HubSpotSDK\Crm\Property
 *
 * @phpstan-type CollectionResponsePropertyNoPagingShape = array{
 *   results: list<Property|PropertyShape>
 * }
 */
final class CollectionResponsePropertyNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePropertyNoPagingShape> */
    use SdkModel;

    /** @var list<Property> $results */
    #[Required(list: Property::class)]
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
     * @param list<Property|PropertyShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<Property|PropertyShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
