<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem;

/**
 * This endpoint updates a batch of campaigns based on the provided input data.
 * The maximum number of items in a batch request is 50.
 * If an empty string ("") is passed for any property in the Batch Update, it will reset that property's value.
 *
 * @see HubspotSDK\Marketing\Campaigns\Batch->update
 *
 * @phpstan-type batch_update_params = array{
 *   inputs: list<PublicCampaignBatchUpdateItem>
 * }
 */
final class BatchUpdateParams implements BaseModel
{
    /** @use SdkModel<batch_update_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicCampaignBatchUpdateItem> $inputs */
    #[Api(list: PublicCampaignBatchUpdateItem::class)]
    public array $inputs;

    /**
     * `new BatchUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchUpdateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchUpdateParams)->withInputs(...)
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
     * @param list<PublicCampaignBatchUpdateItem> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicCampaignBatchUpdateItem> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
