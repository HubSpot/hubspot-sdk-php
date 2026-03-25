<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicCampaignDeleteInputShape = array{id: string}
 */
final class PublicCampaignDeleteInput implements BaseModel
{
    /** @use SdkModel<PublicCampaignDeleteInputShape> */
    use SdkModel;

    /**
     * The unique identifier for the campaign to be deleted.
     */
    #[Required]
    public string $id;

    /**
     * `new PublicCampaignDeleteInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCampaignDeleteInput::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCampaignDeleteInput)->withID(...)
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
     */
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    /**
     * The unique identifier for the campaign to be deleted.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
