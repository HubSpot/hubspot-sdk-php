<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem;

/**
 * Update a batch of marketing campaigns with specified properties. This endpoint allows you to modify multiple campaigns in one request. Note that the 'hs_goal' property is deprecated and will be ignored if provided.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\BatchService::update()
 *
 * @phpstan-import-type PublicCampaignBatchUpdateItemShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem
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
