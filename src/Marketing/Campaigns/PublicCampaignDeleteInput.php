<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicCampaignDeleteInputShape = array{id: string}
 */
final class PublicCampaignDeleteInput implements BaseModel
{
    /** @use SdkModel<PublicCampaignDeleteInputShape> */
    use SdkModel;

    #[Api]
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
        $obj = new self;

        $obj['id'] = $id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }
}
