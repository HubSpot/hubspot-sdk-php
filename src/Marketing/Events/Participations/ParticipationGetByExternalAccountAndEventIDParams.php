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
 * @see HubspotSDK\Marketing\Events\Participations->getByExternalAccountAndEventID
 *
 * @phpstan-type ParticipationGetByExternalAccountAndEventIDParamsShape = array{
 *   externalAccountID: string
 * }
 */
final class ParticipationGetByExternalAccountAndEventIDParams implements BaseModel
{
    /** @use SdkModel<ParticipationGetByExternalAccountAndEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $externalAccountID;

    /**
     * `new ParticipationGetByExternalAccountAndEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipationGetByExternalAccountAndEventIDParams::with(externalAccountID: ...)
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
    public static function with(string $externalAccountID): self
    {
        $obj = new self;

        $obj->externalAccountID = $externalAccountID;

        return $obj;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountID = $externalAccountID;

        return $obj;
    }
}
