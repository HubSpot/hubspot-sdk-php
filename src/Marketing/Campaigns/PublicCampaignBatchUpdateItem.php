<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicCampaignBatchUpdateItemShape = array{
 *   id: string, properties: array<string,string>
 * }
 */
final class PublicCampaignBatchUpdateItem implements BaseModel
{
    /** @use SdkModel<PublicCampaignBatchUpdateItemShape> */
    use SdkModel;

    /**
     * The unique identifier for the campaign to be updated.
     */
    #[Required]
    public string $id;

    /**
     * A set of key-value pairs representing the properties to be updated for the campaign.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
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
     * @param array<string,string> $properties
     */
    public static function with(string $id, array $properties): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The unique identifier for the campaign to be updated.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A set of key-value pairs representing the properties to be updated for the campaign.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
