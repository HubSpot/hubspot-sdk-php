<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * @phpstan-type CollectionResponsePublicCampaignAssetShape = array{
 *   results: list<PublicCampaignAsset>, paging?: Paging|null
 * }
 */
final class CollectionResponsePublicCampaignAsset implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicCampaignAssetShape> */
    use SdkModel;

    /** @var list<PublicCampaignAsset> $results */
    #[Api(list: PublicCampaignAsset::class)]
    public array $results;

    #[Api(optional: true)]
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
     * @param list<PublicCampaignAsset|array{
     *   id: string, metrics?: array<string,float>|null, name?: string|null
     * }> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<PublicCampaignAsset|array{
     *   id: string, metrics?: array<string,float>|null, name?: string|null
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
