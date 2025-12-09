<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Assets;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Associate a specified asset with a campaign. Using the API, you can create and remove associations for the following asset types: forms, static lists, external website pages, sequences, meetings, playbooks, feedback surveys, podcast episodes, sales documents, marketing emails, case studies, knowledge base articles, calls, and CTAs.
 *
 * For other asset types, it is recommended to manage your associations directly in the campaign tool in HubSpot.
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
