<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Participations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read Marketing event's participations counters by externalAccountId and externalEventId pair.
 *
 * @see HubspotSDK\Services\Marketing\Events\ParticipationsService::getByExternalAccountAndEventID()
 *
 * @phpstan-type ParticipationGetByExternalAccountAndEventIDParamsShape = array{
 *   externalAccountId: string
 * }
 */
final class ParticipationGetByExternalAccountAndEventIDParams implements BaseModel
{
    /** @use SdkModel<ParticipationGetByExternalAccountAndEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $externalAccountId;

    /**
     * `new ParticipationGetByExternalAccountAndEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipationGetByExternalAccountAndEventIDParams::with(externalAccountId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipationGetByExternalAccountAndEventIDParams)
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
    public static function with(string $externalAccountId): self
    {
        $obj = new self;

        $obj['externalAccountId'] = $externalAccountId;

        return $obj;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['externalAccountId'] = $externalAccountID;

        return $obj;
    }
}
