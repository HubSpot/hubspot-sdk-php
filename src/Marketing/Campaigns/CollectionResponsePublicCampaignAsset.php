<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Paging;

/**
 * @phpstan-import-type PublicCampaignAssetShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignAsset
 * @phpstan-import-type PagingShape from \HubspotSDK\Paging
 *
 * @phpstan-type CollectionResponsePublicCampaignAssetShape = array{
 *   results: list<PublicCampaignAssetShape>, paging?: null|Paging|PagingShape
 * }
 */
final class CollectionResponsePublicCampaignAsset implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicCampaignAssetShape> */
    use SdkModel;

    /** @var list<PublicCampaignAsset> $results */
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
     * @param list<PublicCampaignAssetShape> $results
     * @param PagingShape $paging
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
     * @param list<PublicCampaignAssetShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param PagingShape $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
