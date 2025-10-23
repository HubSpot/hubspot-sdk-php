<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\NumOccurrencesRefineBy\Type;

/**
 * @phpstan-type num_occurrences_refine_by = array{
 *   type: value-of<Type>, maxOccurrences?: int, minOccurrences?: int
 * }
 */
final class NumOccurrencesRefineBy implements BaseModel
{
    /** @use SdkModel<num_occurrences_refine_by> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?int $maxOccurrences;

    #[Api(optional: true)]
    public ?int $minOccurrences;

    /**
     * `new NumOccurrencesRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumOccurrencesRefineBy::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumOccurrencesRefineBy)->withType(...)
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
        Type|string $type = 'NumOccurrencesRefineBy',
        ?int $maxOccurrences = null,
        ?int $minOccurrences = null,
    ): self {
        $obj = new self;

        $obj['type'] = $type;

        null !== $maxOccurrences && $obj->maxOccurrences = $maxOccurrences;
        null !== $minOccurrences && $obj->minOccurrences = $minOccurrences;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withMaxOccurrences(int $maxOccurrences): self
    {
        $obj = clone $this;
        $obj->maxOccurrences = $maxOccurrences;

        return $obj;
    }

    public function withMinOccurrences(int $minOccurrences): self
    {
        $obj = clone $this;
        $obj->minOccurrences = $minOccurrences;

        return $obj;
    }
}
