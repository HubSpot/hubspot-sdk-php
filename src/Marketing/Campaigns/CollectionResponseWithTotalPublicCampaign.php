<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Paging;

/**
 * @phpstan-import-type PublicCampaignShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaign
 * @phpstan-import-type PagingShape from \HubSpotSDK\Paging
 *
 * @phpstan-type CollectionResponseWithTotalPublicCampaignShape = array{
 *   results: list<PublicCampaign|PublicCampaignShape>,
 *   total: int,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class CollectionResponseWithTotalPublicCampaign implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalPublicCampaignShape> */
    use SdkModel;

    /**
     * An array of PublicCampaign objects, each representing a campaign with its associated properties.
     *
     * @var list<PublicCampaign> $results
     */
    #[Required(list: PublicCampaign::class)]
    public array $results;

    /**
     * An integer representing the total number of public campaigns available.
     */
    #[Required]
    public int $total;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalPublicCampaign()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalPublicCampaign::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalPublicCampaign)
     *   ->withResults(...)
     *   ->withTotal(...)
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
     * @param list<PublicCampaign|PublicCampaignShape> $results
     * @param Paging|PagingShape|null $paging
     */
    public static function with(
        array $results,
        int $total,
        Paging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * An array of PublicCampaign objects, each representing a campaign with its associated properties.
     *
     * @param list<PublicCampaign|PublicCampaignShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * An integer representing the total number of public campaigns available.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

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
