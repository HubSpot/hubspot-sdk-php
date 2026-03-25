<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\DealSplits;

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

    /**
     * The unique identifier of the owner receiving the deal split.
     */
    #[Required('ownerId')]
    public int $ownerID;

    /**
     * The portion of the deal assigned to the owner, expressed as a percentage. The total percentage for all splits in a deal must sum up to 1.0 (100%) and can have up to 8 decimal places.
     */
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

    /**
     * The unique identifier of the owner receiving the deal split.
     */
    public function withOwnerID(int $ownerID): self
    {
        $self = clone $this;
        $self['ownerID'] = $ownerID;

        return $self;
    }

    /**
     * The portion of the deal assigned to the owner, expressed as a percentage. The total percentage for all splits in a deal must sum up to 1.0 (100%) and can have up to 8 decimal places.
     */
    public function withPercentage(float $percentage): self
    {
        $self = clone $this;
        $self['percentage'] = $percentage;

        return $self;
    }
}
