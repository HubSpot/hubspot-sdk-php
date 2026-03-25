<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicNumOccurrencesRefineBy\Type;

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

    /**
     * The type of refinement (NUM_OCCURRENCES).
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The maximum number of occurrences allowed.
     */
    #[Optional]
    public ?int $maxOccurrences;

    /**
     * The minimum number of occurrences required.
     */
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
     * The type of refinement (NUM_OCCURRENCES).
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The maximum number of occurrences allowed.
     */
    public function withMaxOccurrences(int $maxOccurrences): self
    {
        $self = clone $this;
        $self['maxOccurrences'] = $maxOccurrences;

        return $self;
    }

    /**
     * The minimum number of occurrences required.
     */
    public function withMinOccurrences(int $minOccurrences): self
    {
        $self = clone $this;
        $self['minOccurrences'] = $minOccurrences;

        return $self;
    }
}
