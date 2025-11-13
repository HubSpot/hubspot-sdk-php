<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a campaign with the given properties and return the campaign object, including the campaignGuid and created properties.
 *
 * @see HubspotSDK\Services\Marketing\CampaignsService::create()
 *
 * @phpstan-type CampaignCreateParamsShape = array{
 *   properties: array<string,string>
 * }
 */
final class CampaignCreateParams implements BaseModel
{
    /** @use SdkModel<CampaignCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var array<string,string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    /**
     * `new CampaignCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CampaignCreateParams::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CampaignCreateParams)->withProperties(...)
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
        $obj = new self;

        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}
