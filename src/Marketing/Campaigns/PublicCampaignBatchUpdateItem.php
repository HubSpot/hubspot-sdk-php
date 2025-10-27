<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_campaign_batch_update_item = array{
 *   id: string, properties: array<string, string>
 * }
 */
final class PublicCampaignBatchUpdateItem implements BaseModel
{
    /** @use SdkModel<public_campaign_batch_update_item> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var array<string, string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    /**
     * `new PublicCampaignBatchUpdateItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCampaignBatchUpdateItem::with(id: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCampaignBatchUpdateItem)->withID(...)->withProperties(...)
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
     * @param array<string, string> $properties
     */
    public static function with(string $id, array $properties): self
    {
        $obj = new self;

        $obj->id = $id;
        $obj->properties = $properties;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param array<string, string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}
