<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Perform a partial update of a campaign identified by the specified campaignGuid. Provided property values will be overwritten. Read-only and non-existent properties will cause 400 error.
 * If an empty string is passed for any property in the Batch Update, it will reset that property's value.
 *
 * @see HubspotSDK\Services\Marketing\CampaignsService::update()
 *
 * @phpstan-type CampaignUpdateParamsShape = array{
 *   properties: array<string,string>
 * }
 */
final class CampaignUpdateParams implements BaseModel
{
    /** @use SdkModel<CampaignUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var array<string,string> $properties */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * `new CampaignUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CampaignUpdateParams::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CampaignUpdateParams)->withProperties(...)
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
     * @param array<string,string> $properties
     */
    public static function with(array $properties): self
    {
        $self = new self;

        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
