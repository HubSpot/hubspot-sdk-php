<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicAbsoluteComparativeTimestampRefineBy\Type;

/**
 * @phpstan-type PublicAbsoluteComparativeTimestampRefineByShape = array{
 *   comparison: string, timestamp: int, type: Type|value-of<Type>
 * }
 */
final class PublicAbsoluteComparativeTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<PublicAbsoluteComparativeTimestampRefineByShape> */
    use SdkModel;

    /**
     * Timestamp comparison options (BEFORE, AFTER).
     */
    #[Required]
    public string $comparison;

    /**
     * Timestamp to be used in refine by criteria.
     */
    #[Required]
    public int $timestamp;

    /**
     * type of refine by criteria (ABSOLUTE_COMPARATIVE).
     *
     * @var value-of<Type> $type
     */
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

    /**
     * Timestamp comparison options (BEFORE, AFTER).
     */
    public function withComparison(string $comparison): self
    {
        $self = clone $this;
        $self['comparison'] = $comparison;

        return $self;
    }

    /**
     * Timestamp to be used in refine by criteria.
     */
    public function withTimestamp(int $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * type of refine by criteria (ABSOLUTE_COMPARATIVE).
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
