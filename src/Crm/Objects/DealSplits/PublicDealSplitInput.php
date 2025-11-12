<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\DealSplits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicDealSplitInputShape = array{ownerId: int, percentage: float}
 */
final class PublicDealSplitInput implements BaseModel
{
    /** @use SdkModel<PublicDealSplitInputShape> */
    use SdkModel;

    #[Api]
    public int $ownerId;

    #[Api]
    public float $percentage;

    /**
     * `new PublicDealSplitInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDealSplitInput::with(ownerId: ..., percentage: ...)
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
    public static function with(int $ownerId, float $percentage): self
    {
        $obj = new self;

        $obj->ownerId = $ownerId;
        $obj->percentage = $percentage;

        return $obj;
    }

    public function withOwnerID(int $ownerID): self
    {
        $obj = clone $this;
        $obj->ownerId = $ownerID;

        return $obj;
    }

    public function withPercentage(float $percentage): self
    {
        $obj = clone $this;
        $obj->percentage = $percentage;

        return $obj;
    }
}
