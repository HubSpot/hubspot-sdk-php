<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Budget;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete a specific budget item by ID.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\BudgetService::delete()
 *
 * @phpstan-type BudgetDeleteParamsShape = array{campaignGuid: string}
 */
final class BudgetDeleteParams implements BaseModel
{
    /** @use SdkModel<BudgetDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $campaignGuid;

    /**
     * `new BudgetDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BudgetDeleteParams::with(campaignGuid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BudgetDeleteParams)->withCampaignGuid(...)
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
    public static function with(string $campaignGuid): self
    {
        $obj = new self;

        $obj['campaignGuid'] = $campaignGuid;

        return $obj;
    }

    public function withCampaignGuid(string $campaignGuid): self
    {
        $obj = clone $this;
        $obj['campaignGuid'] = $campaignGuid;

        return $obj;
    }
}
