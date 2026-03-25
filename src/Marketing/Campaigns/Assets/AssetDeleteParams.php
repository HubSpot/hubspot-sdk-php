<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Assets;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Disassociate an asset from a specific campaign. This operation removes the association between the specified asset and campaign, effectively detaching the asset from the campaign's context.
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

    #[Required]
    public string $campaignGuid;

    #[Required]
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
        $self = new self;

        $self['campaignGuid'] = $campaignGuid;
        $self['assetType'] = $assetType;

        return $self;
    }

    public function withCampaignGuid(string $campaignGuid): self
    {
        $self = clone $this;
        $self['campaignGuid'] = $campaignGuid;

        return $self;
    }

    public function withAssetType(string $assetType): self
    {
        $self = clone $this;
        $self['assetType'] = $assetType;

        return $self;
    }
}
