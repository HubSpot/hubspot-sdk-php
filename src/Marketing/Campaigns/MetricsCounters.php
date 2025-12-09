<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public int $influencedContacts;

    #[Required]
    public int $newContactsFirstTouch;

    #[Required]
    public int $newContactsLastTouch;

    #[Required]
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
        $self = new self;

        $self['influencedContacts'] = $influencedContacts;
        $self['newContactsFirstTouch'] = $newContactsFirstTouch;
        $self['newContactsLastTouch'] = $newContactsLastTouch;
        $self['sessions'] = $sessions;

        return $self;
    }

    public function withInfluencedContacts(int $influencedContacts): self
    {
        $self = clone $this;
        $self['influencedContacts'] = $influencedContacts;

        return $self;
    }

    public function withNewContactsFirstTouch(int $newContactsFirstTouch): self
    {
        $self = clone $this;
        $self['newContactsFirstTouch'] = $newContactsFirstTouch;

        return $self;
    }

    public function withNewContactsLastTouch(int $newContactsLastTouch): self
    {
        $self = clone $this;
        $self['newContactsLastTouch'] = $newContactsLastTouch;

        return $self;
    }

    public function withSessions(int $sessions): self
    {
        $self = clone $this;
        $self['sessions'] = $sessions;

        return $self;
    }
}
