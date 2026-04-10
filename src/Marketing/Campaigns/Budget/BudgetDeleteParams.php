<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns\Budget;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Delete a specific budget item by ID.
 *
 * @see HubSpotSDK\Services\Marketing\Campaigns\BudgetService::delete()
 *
 * @phpstan-type BudgetDeleteParamsShape = array{campaignGuid: string}
 */
final class BudgetDeleteParams implements BaseModel
{
    /** @use SdkModel<BudgetDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
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
        $self = new self;

        $self['campaignGuid'] = $campaignGuid;

        return $self;
    }

    public function withCampaignGuid(string $campaignGuid): self
    {
        $self = clone $this;
        $self['campaignGuid'] = $campaignGuid;

        return $self;
    }
}
