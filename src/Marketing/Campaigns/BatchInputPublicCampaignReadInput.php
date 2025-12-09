<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputPublicCampaignReadInputShape = array{
 *   inputs: list<PublicCampaignReadInput>
 * }
 */
final class BatchInputPublicCampaignReadInput implements BaseModel
{
    /** @use SdkModel<BatchInputPublicCampaignReadInputShape> */
    use SdkModel;

    /** @var list<PublicCampaignReadInput> $inputs */
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
     * @param list<PublicCampaignReadInput|array{id: string}> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicCampaignReadInput|array{id: string}> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
