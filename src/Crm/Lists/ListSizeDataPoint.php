<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListSizeDataPointShape = array{
 *   size: int, timestamp: \DateTimeInterface
 * }
 */
final class ListSizeDataPoint implements BaseModel
{
    /** @use SdkModel<ListSizeDataPointShape> */
    use SdkModel;

    #[Required]
    public int $size;

    #[Required]
    public \DateTimeInterface $timestamp;

    /**
     * `new ListSizeDataPoint()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListSizeDataPoint::with(size: ..., timestamp: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListSizeDataPoint)->withSize(...)->withTimestamp(...)
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
    public static function with(int $size, \DateTimeInterface $timestamp): self
    {
        $self = new self;

        $self['size'] = $size;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
