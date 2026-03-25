<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Spend;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete a specific campaign spend item by its ID. This operation is useful for removing spend items that are no longer needed or were added in error. Once deleted, the spend item cannot be recovered.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\SpendService::delete()
 *
 * @phpstan-type SpendDeleteParamsShape = array{campaignGuid: string}
 */
final class SpendDeleteParams implements BaseModel
{
    /** @use SdkModel<SpendDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $campaignGuid;

    /**
     * `new SpendDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpendDeleteParams::with(campaignGuid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpendDeleteParams)->withCampaignGuid(...)
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
