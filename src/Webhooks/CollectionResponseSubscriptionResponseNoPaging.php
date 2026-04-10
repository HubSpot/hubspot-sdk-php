<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SubscriptionResponse1Shape from \HubSpotSDK\Webhooks\SubscriptionResponse1
 *
 * @phpstan-type CollectionResponseSubscriptionResponseNoPagingShape = array{
 *   results: list<SubscriptionResponse1|SubscriptionResponse1Shape>
 * }
 */
final class CollectionResponseSubscriptionResponseNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseSubscriptionResponseNoPagingShape> */
    use SdkModel;

    /** @var list<SubscriptionResponse1> $results */
    #[Required(list: SubscriptionResponse1::class)]
    public array $results;

    /**
     * `new CollectionResponseSubscriptionResponseNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseSubscriptionResponseNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseSubscriptionResponseNoPaging)->withResults(...)
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
     * @param list<SubscriptionResponse1|SubscriptionResponse1Shape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<SubscriptionResponse1|SubscriptionResponse1Shape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
