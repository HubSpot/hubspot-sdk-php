<?php

declare(strict_types=1);

namespace HubSpotSDK\WebhooksJournal;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SubscriptionResponseShape from \HubSpotSDK\WebhooksJournal\SubscriptionResponse
 *
 * @phpstan-type CollectionResponseSubscriptionResponseNoPagingShape = array{
 *   results: list<SubscriptionResponse|SubscriptionResponseShape>
 * }
 */
final class CollectionResponseSubscriptionResponseNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseSubscriptionResponseNoPagingShape> */
    use SdkModel;

    /**
     * An array of subscription responses, where each item contains details about a specific subscription. Each item follows the SubscriptionResponse schema.
     *
     * @var list<SubscriptionResponse> $results
     */
    #[Required(list: SubscriptionResponse::class)]
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
     * @param list<SubscriptionResponse|SubscriptionResponseShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * An array of subscription responses, where each item contains details about a specific subscription. Each item follows the SubscriptionResponse schema.
     *
     * @param list<SubscriptionResponse|SubscriptionResponseShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
