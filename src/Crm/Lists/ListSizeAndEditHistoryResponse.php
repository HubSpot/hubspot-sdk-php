<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ListSizeDataPointShape from \HubSpotSDK\Crm\Lists\ListSizeDataPoint
 *
 * @phpstan-type ListSizeAndEditHistoryResponseShape = array{
 *   editHistory: list<\DateTimeInterface>,
 *   sizeHistory: list<ListSizeDataPoint|ListSizeDataPointShape>,
 * }
 */
final class ListSizeAndEditHistoryResponse implements BaseModel
{
    /** @use SdkModel<ListSizeAndEditHistoryResponseShape> */
    use SdkModel;

    /** @var list<\DateTimeInterface> $editHistory */
    #[Required(list: '\DateTimeInterface')]
    public array $editHistory;

    /** @var list<ListSizeDataPoint> $sizeHistory */
    #[Required(list: ListSizeDataPoint::class)]
    public array $sizeHistory;

    /**
     * `new ListSizeAndEditHistoryResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListSizeAndEditHistoryResponse::with(editHistory: ..., sizeHistory: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListSizeAndEditHistoryResponse)->withEditHistory(...)->withSizeHistory(...)
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
     * @param list<\DateTimeInterface> $editHistory
     * @param list<ListSizeDataPoint|ListSizeDataPointShape> $sizeHistory
     */
    public static function with(array $editHistory, array $sizeHistory): self
    {
        $self = new self;

        $self['editHistory'] = $editHistory;
        $self['sizeHistory'] = $sizeHistory;

        return $self;
    }

    /**
     * @param list<\DateTimeInterface> $editHistory
     */
    public function withEditHistory(array $editHistory): self
    {
        $self = clone $this;
        $self['editHistory'] = $editHistory;

        return $self;
    }

    /**
     * @param list<ListSizeDataPoint|ListSizeDataPointShape> $sizeHistory
     */
    public function withSizeHistory(array $sizeHistory): self
    {
        $self = clone $this;
        $self['sizeHistory'] = $sizeHistory;

        return $self;
    }
}
