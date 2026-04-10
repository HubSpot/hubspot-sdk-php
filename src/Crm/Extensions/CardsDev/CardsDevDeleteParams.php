<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Permanently deletes a card definition with the given ID. Once deleted, data fetch requests for this card will no longer be sent to your service. This can't be undone.
 *
 * @see HubSpotSDK\Services\Crm\Extensions\CardsDevService::delete()
 *
 * @phpstan-type CardsDevDeleteParamsShape = array{appID: int}
 */
final class CardsDevDeleteParams implements BaseModel
{
    /** @use SdkModel<CardsDevDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new CardsDevDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardsDevDeleteParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardsDevDeleteParams)->withAppID(...)
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
