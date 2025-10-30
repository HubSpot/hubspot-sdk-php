<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicCampaignInputShape = array{
 *   properties: array<string, string>
 * }
 */
final class PublicCampaignInput implements BaseModel
{
    /** @use SdkModel<PublicCampaignInputShape> */
    use SdkModel;

    /** @var array<string, string> $properties */
    #[Api(map: 'string')]
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
     * @param array<string, string> $properties
     */
    public static function with(array $properties): self
    {
        $obj = new self;

        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param array<string, string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}
