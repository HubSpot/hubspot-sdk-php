<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Participations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read Contact's participations by identifier - email or internal id.
 *
 * @see HubspotSDK\Services\Marketing\Events\ParticipationsService::listBreakdownByContact()
 *
 * @phpstan-type ParticipationListBreakdownByContactParamsShape = array{
 *   after?: string|null, limit?: int|null, state?: string|null
 * }
 */
final class ParticipationListBreakdownByContactParams implements BaseModel
{
    /** @use SdkModel<ParticipationListBreakdownByContactParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The cursor indicating the position of the last retrieved item.
     */
    #[Optional]
    public ?string $after;

    /**
     * The limit for response size. The default value is 10, the max number is 100.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW.
     */
    #[Optional]
    public ?string $state;

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
        ?string $after = null,
        ?int $limit = null,
        ?string $state = null
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;
        null !== $state && $self['state'] = $state;

        return $self;
    }

    /**
     * The cursor indicating the position of the last retrieved item.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * The limit for response size. The default value is 10, the max number is 100.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
