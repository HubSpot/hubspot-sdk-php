<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\DealSplits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDealSplitInputShape from \HubSpotSDK\Crm\DealSplits\PublicDealSplitInput
 *
 * @phpstan-type PublicDealSplitsCreateRequestShape = array{
 *   id: int, splits: list<PublicDealSplitInput|PublicDealSplitInputShape>
 * }
 */
final class PublicDealSplitsCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicDealSplitsCreateRequestShape> */
    use SdkModel;

    /**
     * The unique identifier for the deal.
     */
    #[Required]
    public int $id;

    /**
     * An array of deal split inputs, each containing an owner ID and a percentage of the deal split.
     *
     * @var list<PublicDealSplitInput> $splits
     */
    #[Required(list: PublicDealSplitInput::class)]
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
     * @param list<PublicDealSplitInput|PublicDealSplitInputShape> $splits
     */
    public static function with(int $id, array $splits): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['splits'] = $splits;

        return $self;
    }

    /**
     * The unique identifier for the deal.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * An array of deal split inputs, each containing an owner ID and a percentage of the deal split.
     *
     * @param list<PublicDealSplitInput|PublicDealSplitInputShape> $splits
     */
    public function withSplits(array $splits): self
    {
        $self = clone $this;
        $self['splits'] = $splits;

        return $self;
    }
}
