<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputPublicCampaignBatchUpdateItemShape = array{
 *   inputs: list<PublicCampaignBatchUpdateItem>
 * }
 */
final class BatchInputPublicCampaignBatchUpdateItem implements BaseModel
{
    /** @use SdkModel<BatchInputPublicCampaignBatchUpdateItemShape> */
    use SdkModel;

    /** @var list<PublicCampaignBatchUpdateItem> $inputs */
    #[Api(list: PublicCampaignBatchUpdateItem::class)]
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
     * @param list<PublicCampaignBatchUpdateItem|array{
     *   id: string, properties: array<string,string>
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicCampaignBatchUpdateItem|array{
     *   id: string, properties: array<string,string>
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
