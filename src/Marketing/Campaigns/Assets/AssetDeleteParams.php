<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Assets;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Disassociate a specified asset from a campaign.
 * Important: Currently, only the following asset types can be associated and disassociated via the API: Forms, Static lists, External website pages.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\AssetsService::delete()
 *
 * @phpstan-type AssetDeleteParamsShape = array{
 *   campaignGuid: string, assetType: string
 * }
 */
final class AssetDeleteParams implements BaseModel
{
    /** @use SdkModel<AssetDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $campaignGuid;

    #[Api]
    public string $assetType;

    /**
     * `new AssetDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssetDeleteParams::with(campaignGuid: ..., assetType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssetDeleteParams)->withCampaignGuid(...)->withAssetType(...)
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
    public static function with(string $campaignGuid, string $assetType): self
    {
        $obj = new self;

        $obj->campaignGuid = $campaignGuid;
        $obj->assetType = $assetType;

        return $obj;
    }

    public function withCampaignGuid(string $campaignGuid): self
    {
        $obj = clone $this;
        $obj->campaignGuid = $campaignGuid;

        return $obj;
    }

    public function withAssetType(string $assetType): self
    {
        $obj = clone $this;
        $obj->assetType = $assetType;

        return $obj;
    }
}
