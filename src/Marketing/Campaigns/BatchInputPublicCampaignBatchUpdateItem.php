<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicCampaignBatchUpdateItemShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem
 *
 * @phpstan-type BatchInputPublicCampaignBatchUpdateItemShape = array{
 *   inputs: list<PublicCampaignBatchUpdateItem|PublicCampaignBatchUpdateItemShape>
 * }
 */
final class BatchInputPublicCampaignBatchUpdateItem implements BaseModel
{
    /** @use SdkModel<BatchInputPublicCampaignBatchUpdateItemShape> */
    use SdkModel;

    /**
     * An array of PublicCampaignBatchUpdateItem objects, each containing the ID and properties to update for a specific campaign.
     *
     * @var list<PublicCampaignBatchUpdateItem> $inputs
     */
    #[Required(list: PublicCampaignBatchUpdateItem::class)]
    public array $inputs;

    /**
     * `new BatchInputPublicCampaignBatchUpdateItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicCampaignBatchUpdateItem::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicCampaignBatchUpdateItem)->withInputs(...)
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
