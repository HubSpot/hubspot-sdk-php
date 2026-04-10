<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns\Budget;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get a specific budget item by ID.
 *
 * @see HubSpotSDK\Services\Marketing\Campaigns\BudgetService::get()
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
