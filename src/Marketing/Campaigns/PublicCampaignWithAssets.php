<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CollectionResponsePublicCampaignAssetShape from \HubspotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAsset
 * @phpstan-import-type PublicBusinessUnitShape from \HubspotSDK\Marketing\Campaigns\PublicBusinessUnit
 *
 * @phpstan-type PublicCampaignWithAssetsShape = array{
 *   id: string,
 *   assets: array<string,CollectionResponsePublicCampaignAsset|CollectionResponsePublicCampaignAssetShape>,
 *   businessUnits: list<PublicBusinessUnit|PublicBusinessUnitShape>,
 *   createdAt: \DateTimeInterface,
 *   properties: array<string,string>,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class PublicCampaignWithAssets implements BaseModel
{
    /** @use SdkModel<PublicCampaignWithAssetsShape> */
    use SdkModel;

    /**
     * The unique identifier for the campaign.
     */
    #[Required]
    public string $id;

    /**
     * Contains the assets associated with the campaign, each represented as a collection of campaign assets.
     *
     * @var array<string,CollectionResponsePublicCampaignAsset> $assets
     */
    #[Required(map: CollectionResponsePublicCampaignAsset::class)]
    public array $assets;

    /**
     * An array of business units associated with the campaign, each represented by a PublicBusinessUnit object.
     *
     * @var list<PublicBusinessUnit> $businessUnits
     */
    #[Required(list: PublicBusinessUnit::class)]
    public array $businessUnits;

    /**
     * The date and time when the campaign was created, formatted as a date-time string.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * A map of key-value pairs representing the properties of the campaign.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * The date and time when the campaign was last updated, formatted as a date-time string.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * `new PublicCampaignWithAssets()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCampaignWithAssets::with(
     *   id: ...,
     *   assets: ...,
     *   businessUnits: ...,
     *   createdAt: ...,
     *   properties: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCampaignWithAssets)
     *   ->withID(...)
     *   ->withAssets(...)
     *   ->withBusinessUnits(...)
     *   ->withCreatedAt(...)
     *   ->withProperties(...)
     *   ->withUpdatedAt(...)
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
     *
     * @param array<string,CollectionResponsePublicCampaignAsset|CollectionResponsePublicCampaignAssetShape> $assets
     * @param list<PublicBusinessUnit|PublicBusinessUnitShape> $businessUnits
     * @param array<string,string> $properties
     */
    public static function with(
        string $id,
        array $assets,
        array $businessUnits,
        \DateTimeInterface $createdAt,
        array $properties,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['assets'] = $assets;
        $self['businessUnits'] = $businessUnits;
        $self['createdAt'] = $createdAt;
        $self['properties'] = $properties;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The unique identifier for the campaign.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Contains the assets associated with the campaign, each represented as a collection of campaign assets.
     *
     * @param array<string,CollectionResponsePublicCampaignAsset|CollectionResponsePublicCampaignAssetShape> $assets
     */
    public function withAssets(array $assets): self
    {
        $self = clone $this;
        $self['assets'] = $assets;

        return $self;
    }

    /**
     * An array of business units associated with the campaign, each represented by a PublicBusinessUnit object.
     *
     * @param list<PublicBusinessUnit|PublicBusinessUnitShape> $businessUnits
     */
    public function withBusinessUnits(array $businessUnits): self
    {
        $self = clone $this;
        $self['businessUnits'] = $businessUnits;

        return $self;
    }

    /**
     * The date and time when the campaign was created, formatted as a date-time string.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * A map of key-value pairs representing the properties of the campaign.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The date and time when the campaign was last updated, formatted as a date-time string.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
