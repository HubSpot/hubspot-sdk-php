<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicNumOccurrencesRefineBy\Type;

/**
 * @phpstan-type PublicNumOccurrencesRefineByShape = array{
 *   type: Type|value-of<Type>,
 *   maxOccurrences?: int|null,
 *   minOccurrences?: int|null,
 * }
 */
final class PublicNumOccurrencesRefineBy implements BaseModel
{
    /** @use SdkModel<PublicNumOccurrencesRefineByShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?int $maxOccurrences;

    #[Optional]
    public ?int $minOccurrences;

    /**
     * `new PublicNumOccurrencesRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicNumOccurrencesRefineBy::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicNumOccurrencesRefineBy)->withType(...)
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
        Type|string $type = 'NUM_OCCURRENCES',
        ?int $maxOccurrences = null,
        ?int $minOccurrences = null,
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $maxOccurrences && $self['maxOccurrences'] = $maxOccurrences;
        null !== $minOccurrences && $self['minOccurrences'] = $minOccurrences;

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

    public function withMaxOccurrences(int $maxOccurrences): self
    {
        $self = clone $this;
        $self['maxOccurrences'] = $maxOccurrences;

        return $self;
    }

    public function withMinOccurrences(int $minOccurrences): self
    {
        $self = clone $this;
        $self['minOccurrences'] = $minOccurrences;

        return $self;
    }
}
