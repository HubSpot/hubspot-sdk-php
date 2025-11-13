<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Spend;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read a campaign spend item by its spendId.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\SpendService::get()
 *
 * @phpstan-type SpendGetParamsShape = array{campaignGuid: string}
 */
final class SpendGetParams implements BaseModel
{
    /** @use SdkModel<SpendGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $campaignGuid;

    /**
     * `new SpendGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpendGetParams::with(campaignGuid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpendGetParams)->withCampaignGuid(...)
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
    public static function with(string $campaignGuid): self
    {
        $obj = new self;

        $obj->campaignGuid = $campaignGuid;

        return $obj;
    }

    public function withCampaignGuid(string $campaignGuid): self
    {
        $obj = clone $this;
        $obj->campaignGuid = $campaignGuid;

        return $obj;
    }
}
