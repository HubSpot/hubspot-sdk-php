<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Participations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read Marketing event's participations breakdown with optional filters by externalAccountId and externalEventId pair.
 *
 * @see HubspotSDK\Services\Marketing\Events\ParticipationsService::listBreakdownByExternalAccountAndEventID()
 *
 * @phpstan-type ParticipationListBreakdownByExternalAccountAndEventIDParamsShape = array{
 *   externalAccountID: string,
 *   after?: string|null,
 *   contactIdentifier?: string|null,
 *   limit?: int|null,
 *   state?: string|null,
 * }
 */
final class ParticipationListBreakdownByExternalAccountAndEventIDParams implements BaseModel
{
    /** @use SdkModel<ParticipationListBreakdownByExternalAccountAndEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalAccountID;

    /**
     * The cursor indicating the position of the last retrieved item.
     */
    #[Optional]
    public ?string $after;

    /**
     * The identifier of the Contact. It may be email or internal id.
     */
    #[Optional]
    public ?string $contactIdentifier;

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

    /**
     * `new ParticipationListBreakdownByExternalAccountAndEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipationListBreakdownByExternalAccountAndEventIDParams::with(
     *   externalAccountID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipationListBreakdownByExternalAccountAndEventIDParams)
     *   ->withExternalAccountID(...)
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
        string $externalAccountID,
        ?string $after = null,
        ?string $contactIdentifier = null,
        ?int $limit = null,
        ?string $state = null,
    ): self {
        $self = new self;

        $self['externalAccountID'] = $externalAccountID;

        null !== $after && $self['after'] = $after;
        null !== $contactIdentifier && $self['contactIdentifier'] = $contactIdentifier;
        null !== $limit && $self['limit'] = $limit;
        null !== $state && $self['state'] = $state;

        return $self;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

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
     * The identifier of the Contact. It may be email or internal id.
     */
    public function withContactIdentifier(string $contactIdentifier): self
    {
        $self = clone $this;
        $self['contactIdentifier'] = $contactIdentifier;

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
