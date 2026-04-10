<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem;

/**
 * This endpoint updates a batch of campaigns based on the provided input data.
 * The maximum number of items in a batch request is 50.
 * If an empty string ("") is passed for any property in the Batch Update, it will reset that property's value.
 *
 * @see HubSpotSDK\Services\Marketing\Campaigns\BatchService::update()
 *
 * @phpstan-import-type PublicCampaignBatchUpdateItemShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem
 *
 * @phpstan-type BatchUpdateParamsShape = array{
 *   inputs: list<PublicCampaignBatchUpdateItem|PublicCampaignBatchUpdateItemShape>
 * }
 */
final class BatchUpdateParams implements BaseModel
{
    /** @use SdkModel<BatchUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of PublicCampaignBatchUpdateItem objects, each containing the ID and properties to update for a specific campaign.
     *
     * @var list<PublicCampaignBatchUpdateItem> $inputs
     */
    #[Required(list: PublicCampaignBatchUpdateItem::class)]
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
     * @param list<PublicCampaignBatchUpdateItem|PublicCampaignBatchUpdateItemShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * An array of PublicCampaignBatchUpdateItem objects, each containing the ID and properties to update for a specific campaign.
     *
     * @param list<PublicCampaignBatchUpdateItem|PublicCampaignBatchUpdateItemShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
