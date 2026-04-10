<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicRelativeComparativeTimestampRefineBy\Type;

/**
 * @phpstan-import-type PublicTimeOffsetShape from \HubSpotSDK\Crm\Lists\PublicTimeOffset
 *
 * @phpstan-type PublicRelativeComparativeTimestampRefineByShape = array{
 *   comparison: string,
 *   timeOffset: PublicTimeOffset|PublicTimeOffsetShape,
 *   type: Type|value-of<Type>,
 * }
 */
final class PublicRelativeComparativeTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<PublicRelativeComparativeTimestampRefineByShape> */
    use SdkModel;

    /**
     * Defines the comparison operation to be used in the refinement (BEFORE, AFTER).
     */
    #[Required]
    public string $comparison;

    #[Required]
    public PublicTimeOffset $timeOffset;

    /**
     * Specifies the type of refinement, (RELATIVE_COMPARATIVE).
     *
     * @var value-of<Type> $type
     */
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
     * @param PublicTimeOffset|PublicTimeOffsetShape $timeOffset
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

    /**
     * Defines the comparison operation to be used in the refinement (BEFORE, AFTER).
     */
    public function withComparison(string $comparison): self
    {
        $self = clone $this;
        $self['comparison'] = $comparison;

        return $self;
    }

    /**
     * @param PublicTimeOffset|PublicTimeOffsetShape $timeOffset
     */
    public function withTimeOffset(PublicTimeOffset|array $timeOffset): self
    {
        $self = clone $this;
        $self['timeOffset'] = $timeOffset;

        return $self;
    }

    /**
     * Specifies the type of refinement, (RELATIVE_COMPARATIVE).
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
