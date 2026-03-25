<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\PublicCampaignInput;

/**
 * Create a batch of campaigns with specified properties. This endpoint allows for the creation of multiple campaigns in a single request. Note that the 'hs_goal' property is deprecated and will be ignored if provided.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\BatchService::create()
 *
 * @phpstan-import-type PublicCampaignInputShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignInput
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   inputs: list<PublicCampaignInput|PublicCampaignInputShape>
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of PublicCampaignInput objects, each representing the properties of a campaign to be created in the batch. This property is required.
     *
     * @var list<PublicCampaignInput> $inputs
     */
    #[Required(list: PublicCampaignInput::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withInputs(...)
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
