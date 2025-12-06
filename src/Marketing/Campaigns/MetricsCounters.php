<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetricsCountersShape = array{
 *   influencedContacts: int,
 *   newContactsFirstTouch: int,
 *   newContactsLastTouch: int,
 *   sessions: int,
 * }
 */
final class MetricsCounters implements BaseModel
{
    /** @use SdkModel<MetricsCountersShape> */
    use SdkModel;

    #[Api]
    public int $influencedContacts;

    #[Api]
    public int $newContactsFirstTouch;

    #[Api]
    public int $newContactsLastTouch;

    #[Api]
    public int $sessions;

    /**
     * `new MetricsCounters()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MetricsCounters::with(
     *   influencedContacts: ...,
     *   newContactsFirstTouch: ...,
     *   newContactsLastTouch: ...,
     *   sessions: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MetricsCounters)
     *   ->withInfluencedContacts(...)
     *   ->withNewContactsFirstTouch(...)
     *   ->withNewContactsLastTouch(...)
     *   ->withSessions(...)
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
     */
    public static function with(
        int $influencedContacts,
        int $newContactsFirstTouch,
        int $newContactsLastTouch,
        int $sessions,
    ): self {
        $obj = new self;

        $obj['influencedContacts'] = $influencedContacts;
        $obj['newContactsFirstTouch'] = $newContactsFirstTouch;
        $obj['newContactsLastTouch'] = $newContactsLastTouch;
        $obj['sessions'] = $sessions;

        return $obj;
    }

    public function withInfluencedContacts(int $influencedContacts): self
    {
        $obj = clone $this;
        $obj['influencedContacts'] = $influencedContacts;

        return $obj;
    }

    public function withNewContactsFirstTouch(int $newContactsFirstTouch): self
    {
        $obj = clone $this;
        $obj['newContactsFirstTouch'] = $newContactsFirstTouch;

        return $obj;
    }

    public function withNewContactsLastTouch(int $newContactsLastTouch): self
    {
        $obj = clone $this;
        $obj['newContactsLastTouch'] = $newContactsLastTouch;

        return $obj;
    }

    public function withSessions(int $sessions): self
    {
        $obj = clone $this;
        $obj['sessions'] = $sessions;

        return $obj;
    }
}
