<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicNumOccurrencesRefineBy\Type;

/**
 * @phpstan-type PublicNumOccurrencesRefineByShape = array{
 *   type: value-of<Type>, maxOccurrences?: int|null, minOccurrences?: int|null
 * }
 */
final class PublicNumOccurrencesRefineBy implements BaseModel
{
    /** @use SdkModel<PublicNumOccurrencesRefineByShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?int $maxOccurrences;

    #[Api(optional: true)]
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
