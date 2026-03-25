<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
     * The unique identifier for the campaign to be updated. It is a string.
     */
    #[Required]
    public string $id;

    /**
     * A map of property names to their new values for the campaign. Each property name is a string, and its value is also a string.
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
     * The unique identifier for the campaign to be updated. It is a string.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A map of property names to their new values for the campaign. Each property name is a string, and its value is also a string.
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
