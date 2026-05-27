<?php

declare(strict_types=1);

namespace HubSpotSDK\WebhooksJournal;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type JournalSubscriptionResponseShape from \HubSpotSDK\WebhooksJournal\JournalSubscriptionResponse
 *
 * @phpstan-type JournalCollectionResponseSubscriptionResponseNoPagingShape = array{
 *   results: list<JournalSubscriptionResponse|JournalSubscriptionResponseShape>
 * }
 */
final class JournalCollectionResponseSubscriptionResponseNoPaging implements BaseModel
{
    /** @use SdkModel<JournalCollectionResponseSubscriptionResponseNoPagingShape> */
    use SdkModel;

    /**
     * An array of subscription responses, where each item contains details about a specific subscription. Each item follows the SubscriptionResponse schema.
     *
     * @var list<JournalSubscriptionResponse> $results
     */
    #[Required(list: JournalSubscriptionResponse::class)]
    public array $results;

    /**
     * `new JournalCollectionResponseSubscriptionResponseNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JournalCollectionResponseSubscriptionResponseNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JournalCollectionResponseSubscriptionResponseNoPaging)->withResults(...)
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
     * @param list<JournalSubscriptionResponse|JournalSubscriptionResponseShape> $results
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
     * @param list<JournalSubscriptionResponse|JournalSubscriptionResponseShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
