<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicCampaignDeleteInputShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignDeleteInput
 *
 * @phpstan-type BatchInputPublicCampaignDeleteInputShape = array{
 *   inputs: list<PublicCampaignDeleteInput|PublicCampaignDeleteInputShape>
 * }
 */
final class BatchInputPublicCampaignDeleteInput implements BaseModel
{
    /** @use SdkModel<BatchInputPublicCampaignDeleteInputShape> */
    use SdkModel;

    /**
     * An array of PublicCampaignDeleteInput objects, each specifying a campaign to be deleted. Each object must include the campaign's unique identifier.
     *
     * @var list<PublicCampaignDeleteInput> $inputs
     */
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
     * @param list<PublicCampaignDeleteInput|PublicCampaignDeleteInputShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * An array of PublicCampaignDeleteInput objects, each specifying a campaign to be deleted. Each object must include the campaign's unique identifier.
     *
     * @param list<PublicCampaignDeleteInput|PublicCampaignDeleteInputShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
