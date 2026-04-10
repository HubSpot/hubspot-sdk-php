<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicCampaignInputShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignInput
 *
 * @phpstan-type BatchInputPublicCampaignInputShape = array{
 *   inputs: list<PublicCampaignInput|PublicCampaignInputShape>
 * }
 */
final class BatchInputPublicCampaignInput implements BaseModel
{
    /** @use SdkModel<BatchInputPublicCampaignInputShape> */
    use SdkModel;

    /**
     * An array of PublicCampaignInput objects, each representing the properties of a campaign to be created in the batch. This property is required.
     *
     * @var list<PublicCampaignInput> $inputs
     */
    #[Required(list: PublicCampaignInput::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicCampaignInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicCampaignInput::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicCampaignInput)->withInputs(...)
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
     * @param list<PublicCampaignInput|PublicCampaignInputShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * An array of PublicCampaignInput objects, each representing the properties of a campaign to be created in the batch. This property is required.
     *
     * @param list<PublicCampaignInput|PublicCampaignInputShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
