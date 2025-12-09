<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\NumOccurrencesRefineBy\Type;

/**
 * @phpstan-type NumOccurrencesRefineByShape = array{
 *   type: value-of<Type>, maxOccurrences?: int|null, minOccurrences?: int|null
 * }
 */
final class NumOccurrencesRefineBy implements BaseModel
{
    /** @use SdkModel<NumOccurrencesRefineByShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?int $maxOccurrences;

    #[Optional]
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

        null !== $maxOccurrences && $obj['maxOccurrences'] = $maxOccurrences;
        null !== $minOccurrences && $obj['minOccurrences'] = $minOccurrences;

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
        $obj['maxOccurrences'] = $maxOccurrences;

        return $obj;
    }

    public function withMinOccurrences(int $minOccurrences): self
    {
        $obj = clone $this;
        $obj['minOccurrences'] = $minOccurrences;

        return $obj;
    }
}
