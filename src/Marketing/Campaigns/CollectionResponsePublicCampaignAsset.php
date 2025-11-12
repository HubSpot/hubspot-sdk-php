<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailsPaging;

/**
 * @phpstan-type CollectionResponsePublicCampaignAssetShape = array{
 *   results: list<PublicCampaignAsset>, paging?: EmailsPaging|null
 * }
 */
final class CollectionResponsePublicCampaignAsset implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicCampaignAssetShape> */
    use SdkModel;

    /** @var list<PublicCampaignAsset> $results */
    #[Api(list: PublicCampaignAsset::class)]
    public array $results;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
    public ?EmailsPaging $paging;

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
     * @param list<PublicCampaignAsset> $results
     */
    public static function with(
        array $results,
        ?EmailsPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<PublicCampaignAsset> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Contains information pagination of results.
     */
    public function withPaging(EmailsPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
