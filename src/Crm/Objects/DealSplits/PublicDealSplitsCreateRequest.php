<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\DealSplits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicDealSplitsCreateRequestShape = array{
 *   id: int, splits: list<PublicDealSplitInput>
 * }
 */
final class PublicDealSplitsCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicDealSplitsCreateRequestShape> */
    use SdkModel;

    #[Api]
    public int $id;

    /** @var list<PublicDealSplitInput> $splits */
    #[Api(list: PublicDealSplitInput::class)]
    public array $splits;

    /**
     * `new PublicDealSplitsCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDealSplitsCreateRequest::with(id: ..., splits: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDealSplitsCreateRequest)->withID(...)->withSplits(...)
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
     * @param list<PublicDealSplitInput|array{ownerId: int, percentage: float}> $splits
     */
    public static function with(int $id, array $splits): self
    {
        $obj = new self;

        $obj['id'] = $id;
        $obj['splits'] = $splits;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param list<PublicDealSplitInput|array{ownerId: int, percentage: float}> $splits
     */
    public function withSplits(array $splits): self
    {
        $obj = clone $this;
        $obj['splits'] = $splits;

        return $obj;
    }
}
