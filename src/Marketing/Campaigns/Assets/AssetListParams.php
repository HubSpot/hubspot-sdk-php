<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Assets;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * List all assets of a specified campaign by asset type. This endpoint allows you to retrieve assets associated with a campaign, filtered by the type of asset. It supports pagination and date filtering to manage and refine the results.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\AssetsService::list()
 *
 * @phpstan-type AssetListParamsShape = array{
 *   campaignGuid: string,
 *   after?: string|null,
 *   endDate?: string|null,
 *   limit?: string|null,
 *   startDate?: string|null,
 * }
 */
final class AssetListParams implements BaseModel
{
    /** @use SdkModel<AssetListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $campaignGuid;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * The end date for filtering assets, in YYYY-MM-DD format.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?string $limit;

    /**
     * The start date for filtering assets, in YYYY-MM-DD format.
     */
    #[Optional]
    public ?string $startDate;

    /**
     * `new AssetListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssetListParams::with(campaignGuid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssetListParams)->withCampaignGuid(...)
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
    public static function with(
        string $campaignGuid,
        ?string $after = null,
        ?string $endDate = null,
        ?string $limit = null,
        ?string $startDate = null,
    ): self {
        $self = new self;

        $self['campaignGuid'] = $campaignGuid;

        null !== $after && $self['after'] = $after;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $limit && $self['limit'] = $limit;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    public function withCampaignGuid(string $campaignGuid): self
    {
        $self = clone $this;
        $self['campaignGuid'] = $campaignGuid;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * The end date for filtering assets, in YYYY-MM-DD format.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The start date for filtering assets, in YYYY-MM-DD format.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
