<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\DealSplits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicDealSplitInputShape = array{ownerID: int, percentage: float}
 */
final class PublicDealSplitInput implements BaseModel
{
    /** @use SdkModel<PublicDealSplitInputShape> */
    use SdkModel;

    #[Required('ownerId')]
    public int $ownerID;

    #[Required]
    public float $percentage;

    /**
     * `new PublicDealSplitInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDealSplitInput::with(ownerID: ..., percentage: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDealSplitInput)->withOwnerID(...)->withPercentage(...)
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
    public static function with(int $ownerID, float $percentage): self
    {
        $self = new self;

        $self['ownerID'] = $ownerID;
        $self['percentage'] = $percentage;

        return $self;
    }

    public function withOwnerID(int $ownerID): self
    {
        $self = clone $this;
        $self['ownerID'] = $ownerID;

        return $self;
    }

    public function withPercentage(float $percentage): self
    {
        $self = clone $this;
        $self['percentage'] = $percentage;

        return $self;
    }
}
