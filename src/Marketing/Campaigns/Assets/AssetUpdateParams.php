<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Assets;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Associate an asset with a specific campaign in your HubSpot account. This operation allows you to link an asset of a specified type and ID to a campaign, facilitating better organization and tracking of campaign resources.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\AssetsService::update()
 *
 * @phpstan-type AssetUpdateParamsShape = array{
 *   campaignGuid: string, assetType: string
 * }
 */
final class AssetUpdateParams implements BaseModel
{
    /** @use SdkModel<AssetUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $campaignGuid;

    #[Required]
    public string $assetType;

    /**
     * `new AssetUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssetUpdateParams::with(campaignGuid: ..., assetType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssetUpdateParams)->withCampaignGuid(...)->withAssetType(...)
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
