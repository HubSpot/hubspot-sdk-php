<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Returns the definition for a card with the given ID.
 *
 * @see HubSpotSDK\Services\Crm\Extensions\CardsDevService::getByID()
 *
 * @phpstan-type CardsDevGetByIDParamsShape = array{appID: int}
 */
final class CardsDevGetByIDParams implements BaseModel
{
    /** @use SdkModel<CardsDevGetByIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new CardsDevGetByIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardsDevGetByIDParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardsDevGetByIDParams)->withAppID(...)
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
    public static function with(int $appID): self
    {
        $self = new self;

        $self['appID'] = $appID;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }
}
