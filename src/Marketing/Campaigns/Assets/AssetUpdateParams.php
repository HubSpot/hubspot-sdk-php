<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns\Assets;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Associate a specified asset with a campaign. Using the API, you can create associations for the following asset types: ads, blog posts, calls, case studies, CTAs, CTAs (legacy), external website pages, feedback surveys, forms, files, knowledge base articles, landing pages, marketing email, marketing events, meetings, playbooks, podcast episodes, sales documents, sales emails, sequences, SMS, social posts, static lists, videos, website pages, and workflows.
 *
 * For other asset types, it is recommended to manage your associations directly in the campaign tool in HubSpot.
 *
 * @see HubSpotSDK\Services\Marketing\Campaigns\AssetsService::update()
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
