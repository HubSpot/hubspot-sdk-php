<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAbsoluteComparativeTimestampRefineBy\Type;

/**
 * @phpstan-type PublicAbsoluteComparativeTimestampRefineByShape = array{
 *   comparison: string, timestamp: int, type: Type|value-of<Type>
 * }
 */
final class PublicAbsoluteComparativeTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<PublicAbsoluteComparativeTimestampRefineByShape> */
    use SdkModel;

    #[Required]
    public string $comparison;

    #[Required]
    public int $timestamp;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new PublicAbsoluteComparativeTimestampRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAbsoluteComparativeTimestampRefineBy::with(
     *   comparison: ..., timestamp: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAbsoluteComparativeTimestampRefineBy)
     *   ->withComparison(...)
     *   ->withTimestamp(...)
     *   ->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $comparison,
        int $timestamp,
        Type|string $type = 'ABSOLUTE_COMPARATIVE',
    ): self {
        $self = new self;

        $self['comparison'] = $comparison;
        $self['timestamp'] = $timestamp;
        $self['type'] = $type;

        return $self;
    }

    public function withComparison(string $comparison): self
    {
        $self = clone $this;
        $self['comparison'] = $comparison;

        return $self;
    }

    public function withTimestamp(int $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
