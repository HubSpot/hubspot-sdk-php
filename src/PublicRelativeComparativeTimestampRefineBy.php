<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicRelativeComparativeTimestampRefineBy\Type;

/**
 * @phpstan-type PublicRelativeComparativeTimestampRefineByShape = array{
 *   comparison: string, timeOffset: PublicTimeOffset, type: value-of<Type>
 * }
 */
final class PublicRelativeComparativeTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<PublicRelativeComparativeTimestampRefineByShape> */
    use SdkModel;

    #[Required]
    public string $comparison;

    #[Required]
    public PublicTimeOffset $timeOffset;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new PublicRelativeComparativeTimestampRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRelativeComparativeTimestampRefineBy::with(
     *   comparison: ..., timeOffset: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRelativeComparativeTimestampRefineBy)
     *   ->withComparison(...)
     *   ->withTimeOffset(...)
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
     * @param PublicTimeOffset|array{
     *   amount: int, offsetDirection: string, timeUnit: string
     * } $timeOffset
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $comparison,
        PublicTimeOffset|array $timeOffset,
        Type|string $type = 'RELATIVE_COMPARATIVE',
    ): self {
        $self = new self;

        $self['comparison'] = $comparison;
        $self['timeOffset'] = $timeOffset;
        $self['type'] = $type;

        return $self;
    }

    public function withComparison(string $comparison): self
    {
        $self = clone $this;
        $self['comparison'] = $comparison;

        return $self;
    }

    /**
     * @param PublicTimeOffset|array{
     *   amount: int, offsetDirection: string, timeUnit: string
     * } $timeOffset
     */
    public function withTimeOffset(PublicTimeOffset|array $timeOffset): self
    {
        $self = clone $this;
        $self['timeOffset'] = $timeOffset;

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
