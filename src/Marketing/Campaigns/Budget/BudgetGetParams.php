<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Budget;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get a specific budget item by ID.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\BudgetService::get()
 *
 * @phpstan-type BudgetGetParamsShape = array{campaignGuid: string}
 */
final class BudgetGetParams implements BaseModel
{
    /** @use SdkModel<BudgetGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $campaignGuid;

    /**
     * `new BudgetGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BudgetGetParams::with(campaignGuid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BudgetGetParams)->withCampaignGuid(...)
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
