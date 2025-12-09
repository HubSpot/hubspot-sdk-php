<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Assets;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This endpoint lists all assets of the campaign by asset type. The assetType parameter is required, and each request can only fetch assets of a single type.
 * Asset metrics can also be fetched along with the assets; they are available only if start and end dates are provided.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\AssetsService::list()
 *
 * @phpstan-type AssetListParamsShape = array{
 *   campaignGuid: string,
 *   after?: string,
 *   endDate?: string,
 *   limit?: string,
 *   startDate?: string,
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
     * A cursor for pagination. If provided, the results will start after the given cursor.
     * Example: NTI1Cg%3D%3D.
     */
    #[Optional]
    public ?string $after;

    /**
     * End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * The maximum number of results to return.
     * Default: 10.
     */
    #[Optional]
    public ?string $limit;

    /**
     * Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
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
     * A cursor for pagination. If provided, the results will start after the given cursor.
     * Example: NTI1Cg%3D%3D.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The maximum number of results to return.
     * Default: 10.
     */
    public function withLimit(string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
