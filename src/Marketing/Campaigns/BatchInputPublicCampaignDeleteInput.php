<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type batch_input_public_campaign_delete_input = array{
 *   inputs: list<PublicCampaignDeleteInput>
 * }
 */
final class BatchInputPublicCampaignDeleteInput implements BaseModel
{
    /** @use SdkModel<batch_input_public_campaign_delete_input> */
    use SdkModel;

    /** @var list<PublicCampaignDeleteInput> $inputs */
    #[Api(list: PublicCampaignDeleteInput::class)]
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
     * @param list<PublicCampaignDeleteInput> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicCampaignDeleteInput> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
