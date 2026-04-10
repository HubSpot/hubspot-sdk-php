<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicCampaignReadInputShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignReadInput
 *
 * @phpstan-type BatchInputPublicCampaignReadInputShape = array{
 *   inputs: list<PublicCampaignReadInput|PublicCampaignReadInputShape>
 * }
 */
final class BatchInputPublicCampaignReadInput implements BaseModel
{
    /** @use SdkModel<BatchInputPublicCampaignReadInputShape> */
    use SdkModel;

    /**
     * An array of PublicCampaignReadInput objects, each containing the ID of a campaign to be read. This property is required.
     *
     * @var list<PublicCampaignReadInput> $inputs
     */
    #[Required(list: PublicCampaignReadInput::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicCampaignReadInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicCampaignReadInput::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicCampaignReadInput)->withInputs(...)
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
     * @param list<PublicCampaignReadInput|PublicCampaignReadInputShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * An array of PublicCampaignReadInput objects, each containing the ID of a campaign to be read. This property is required.
     *
     * @param list<PublicCampaignReadInput|PublicCampaignReadInputShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
