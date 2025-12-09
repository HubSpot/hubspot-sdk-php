<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicSetOccurrencesRefineBy\Type;

/**
 * @phpstan-type PublicSetOccurrencesRefineByShape = array{
 *   setType: string, type: value-of<Type>
 * }
 */
final class PublicSetOccurrencesRefineBy implements BaseModel
{
    /** @use SdkModel<PublicSetOccurrencesRefineByShape> */
    use SdkModel;

    #[Required]
    public string $setType;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new PublicSetOccurrencesRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSetOccurrencesRefineBy::with(setType: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSetOccurrencesRefineBy)->withSetType(...)->withType(...)
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
        string $setType,
        Type|string $type = 'SET_OCCURRENCES'
    ): self {
        $self = new self;

        $self['setType'] = $setType;
        $self['type'] = $type;

        return $self;
    }

    public function withSetType(string $setType): self
    {
        $self = clone $this;
        $self['setType'] = $setType;

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
