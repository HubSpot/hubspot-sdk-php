<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Participations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read Contact's participations by identifier - email or internal id.
 *
 * @see HubspotSDK\Services\Marketing\Events\ParticipationsService::listBreakdownByContact()
 *
 * @phpstan-type ParticipationListBreakdownByContactParamsShape = array{
 *   after?: string, limit?: int, state?: string
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
    #[Api(optional: true)]
    public ?string $after;

    /**
     * The limit for response size. The default value is 10, the max number is 100.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $limit && $obj['limit'] = $limit;
        null !== $state && $obj['state'] = $state;

        return $obj;
    }

    /**
     * The cursor indicating the position of the last retrieved item.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    /**
     * The limit for response size. The default value is 10, the max number is 100.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }
}
