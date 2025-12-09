<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputPublicCampaignDeleteInputShape = array{
 *   inputs: list<PublicCampaignDeleteInput>
 * }
 */
final class BatchInputPublicCampaignDeleteInput implements BaseModel
{
    /** @use SdkModel<BatchInputPublicCampaignDeleteInputShape> */
    use SdkModel;

    /** @var list<PublicCampaignDeleteInput> $inputs */
    #[Required(list: PublicCampaignDeleteInput::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicCampaignDeleteInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicCampaignDeleteInput::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicCampaignDeleteInput)->withInputs(...)
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
     * @param list<PublicCampaignDeleteInput|array{id: string}> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicCampaignDeleteInput|array{id: string}> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
