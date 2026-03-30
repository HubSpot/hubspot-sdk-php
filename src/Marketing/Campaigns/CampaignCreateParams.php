<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a campaign with the specified properties and receive a copy of the campaign object, including its ID. Note that the 'hs_goal' property is deprecated and will be ignored if provided.
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

    /**
     * A collection of key-value pairs representing the properties of the campaign. Each key is a property name, and the corresponding value is the property's value.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
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
        $self = new self;

        $self['properties'] = $properties;

        return $self;
    }

    /**
     * A collection of key-value pairs representing the properties of the campaign. Each key is a property name, and the corresponding value is the property's value.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
