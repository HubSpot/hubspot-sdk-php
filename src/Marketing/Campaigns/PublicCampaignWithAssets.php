<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Paging;

/**
 * @phpstan-type PublicCampaignWithAssetsShape = array{
 *   id: string,
 *   assets: array<string,CollectionResponsePublicCampaignAsset>,
 *   businessUnits: list<PublicBusinessUnit>,
 *   createdAt: \DateTimeInterface,
 *   properties: array<string,string>,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class PublicCampaignWithAssets implements BaseModel
{
    /** @use SdkModel<PublicCampaignWithAssetsShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var array<string,CollectionResponsePublicCampaignAsset> $assets */
    #[Required(map: CollectionResponsePublicCampaignAsset::class)]
    public array $assets;

    /** @var list<PublicBusinessUnit> $businessUnits */
    #[Required(list: PublicBusinessUnit::class)]
    public array $businessUnits;

    #[Required]
    public \DateTimeInterface $createdAt;

    /** @var array<string,string> $properties */
    #[Required(map: 'string')]
    public array $properties;

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
     * @param array<string,CollectionResponsePublicCampaignAsset|array{
     *   results: list<PublicCampaignAsset>, paging?: Paging|null
     * }> $assets
     * @param list<PublicBusinessUnit|array{id: int}> $businessUnits
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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param array<string,CollectionResponsePublicCampaignAsset|array{
     *   results: list<PublicCampaignAsset>, paging?: Paging|null
     * }> $assets
     */
    public function withAssets(array $assets): self
    {
        $self = clone $this;
        $self['assets'] = $assets;

        return $self;
    }

    /**
     * @param list<PublicBusinessUnit|array{id: int}> $businessUnits
     */
    public function withBusinessUnits(array $businessUnits): self
    {
        $self = clone $this;
        $self['businessUnits'] = $businessUnits;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
