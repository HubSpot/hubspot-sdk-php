<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Reports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Fetch the list of contact IDs for the specified campaign and contact type.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\ReportsService::listContactIDsByType()
 *
 * @phpstan-type ReportListContactIDsByTypeParamsShape = array{
 *   campaignGuid: string,
 *   after?: string,
 *   endDate?: string,
 *   limit?: int,
 *   startDate?: string,
 * }
 */
final class ReportListContactIDsByTypeParams implements BaseModel
{
    /** @use SdkModel<ReportListContactIDsByTypeParamsShape> */
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
     * End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * Limit for the number of contacts to fetch
     * Default: 100.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01.
     */
    #[Optional]
    public ?string $startDate;

    /**
     * `new ReportListContactIDsByTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReportListContactIDsByTypeParams::with(campaignGuid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReportListContactIDsByTypeParams)->withCampaignGuid(...)
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
        ?int $limit = null,
        ?string $startDate = null,
    ): self {
        $obj = new self;

        $obj['campaignGuid'] = $campaignGuid;

        null !== $after && $obj['after'] = $after;
        null !== $endDate && $obj['endDate'] = $endDate;
        null !== $limit && $obj['limit'] = $limit;
        null !== $startDate && $obj['startDate'] = $startDate;

        return $obj;
    }

    public function withCampaignGuid(string $campaignGuid): self
    {
        $obj = clone $this;
        $obj['campaignGuid'] = $campaignGuid;

        return $obj;
    }

    /**
     * A cursor for pagination. If provided, the results will start after the given cursor.
     * Example: NTI1Cg%3D%3D.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    /**
     * End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date.
     */
    public function withEndDate(string $endDate): self
    {
        $obj = clone $this;
        $obj['endDate'] = $endDate;

        return $obj;
    }

    /**
     * Limit for the number of contacts to fetch
     * Default: 100.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01.
     */
    public function withStartDate(string $startDate): self
    {
        $obj = clone $this;
        $obj['startDate'] = $startDate;

        return $obj;
    }
}
