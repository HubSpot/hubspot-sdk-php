<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicCampaignInputShape = array{properties: array<string,string>}
 */
final class PublicCampaignInput implements BaseModel
{
    /** @use SdkModel<PublicCampaignInputShape> */
    use SdkModel;

    /**
     * A collection of key-value pairs representing the properties of the campaign. Each key is a property name, and the corresponding value is the property's value.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * `new PublicCampaignInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCampaignInput::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCampaignInput)->withProperties(...)
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
