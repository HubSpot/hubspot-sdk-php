<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputPublicCampaignInputShape = array{
 *   inputs: list<PublicCampaignInput>
 * }
 */
final class BatchInputPublicCampaignInput implements BaseModel
{
    /** @use SdkModel<BatchInputPublicCampaignInputShape> */
    use SdkModel;

    /** @var list<PublicCampaignInput> $inputs */
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
     * @param list<PublicCampaignInput|array{properties: array<string,string>}> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicCampaignInput|array{properties: array<string,string>}> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
