<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\DealSplits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDealSplitInputShape from \HubspotSDK\Crm\Objects\DealSplits\PublicDealSplitInput
 *
 * @phpstan-type PublicDealSplitsCreateRequestShape = array{
 *   id: int, splits: list<PublicDealSplitInput|PublicDealSplitInputShape>
 * }
 */
final class PublicDealSplitsCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicDealSplitsCreateRequestShape> */
    use SdkModel;

    #[Required]
    public int $id;

    /** @var list<PublicDealSplitInput> $splits */
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

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<PublicDealSplitInput|PublicDealSplitInputShape> $splits
     */
    public function withSplits(array $splits): self
    {
        $self = clone $this;
        $self['splits'] = $splits;

        return $self;
    }
}
