<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Paging;

/**
 * @phpstan-import-type PublicCampaignAssetShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignAsset
 * @phpstan-import-type PagingShape from \HubSpotSDK\Paging
 *
 * @phpstan-type CollectionResponsePublicCampaignAssetShape = array{
 *   results: list<PublicCampaignAsset|PublicCampaignAssetShape>,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class CollectionResponsePublicCampaignAsset implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicCampaignAssetShape> */
    use SdkModel;

    /**
     * An array of public campaign assets. Each item in the array is an object representing a campaign asset.
     *
     * @var list<PublicCampaignAsset> $results
     */
    #[Required(list: PublicCampaignAsset::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponsePublicCampaignAsset()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicCampaignAsset::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicCampaignAsset)->withResults(...)
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
     * @param list<PublicCampaignAsset|PublicCampaignAssetShape> $results
     * @param Paging|PagingShape|null $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * An array of public campaign assets. Each item in the array is an object representing a campaign asset.
     *
     * @param list<PublicCampaignAsset|PublicCampaignAssetShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param Paging|PagingShape $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
