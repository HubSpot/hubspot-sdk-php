<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\PublicCampaignDeleteInput;

/**
 * This endpoint deletes a batch of campaigns.
 * The maximum number of items in a batch request is 50.
 * The response will always be 204 No Content, regardless of whether the campaigns exist or not, whether they were successfully deleted or not, or if only some of the campaigns in the batch were deleted.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\BatchService::delete()
 *
 * @phpstan-type BatchDeleteParamsShape = array{
 *   inputs: list<PublicCampaignDeleteInput|array{id: string}>
 * }
 */
final class BatchDeleteParams implements BaseModel
{
    /** @use SdkModel<BatchDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicCampaignDeleteInput> $inputs */
    #[Required(list: PublicCampaignDeleteInput::class)]
    public array $inputs;

    /**
     * `new BatchDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchDeleteParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchDeleteParams)->withInputs(...)
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
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicCampaignDeleteInput|array{id: string}> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
