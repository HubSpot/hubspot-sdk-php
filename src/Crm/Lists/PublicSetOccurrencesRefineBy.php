<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicSetOccurrencesRefineBy\Type;

/**
 * @phpstan-type PublicSetOccurrencesRefineByShape = array{
 *   setType: string, type: Type|value-of<Type>
 * }
 */
final class PublicSetOccurrencesRefineBy implements BaseModel
{
    /** @use SdkModel<PublicSetOccurrencesRefineByShape> */
    use SdkModel;

    /**
     * Indicates the specific set type used in the refinement (ALL, ALL_INCLUDE_EMPTY, ANY, NONE, NONE_EXCLUDE_EMPTY, ANY_INCLUDE_EMPTY).
     */
    #[Required]
    public string $setType;

    /**
     * Specifies the type of refinement (SET_OCCURRENCES).
     *
     * @var value-of<Type> $type
     */
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

    /**
     * Indicates the specific set type used in the refinement (ALL, ALL_INCLUDE_EMPTY, ANY, NONE, NONE_EXCLUDE_EMPTY, ANY_INCLUDE_EMPTY).
     */
    public function withSetType(string $setType): self
    {
        $self = clone $this;
        $self['setType'] = $setType;

        return $self;
    }

    /**
     * Specifies the type of refinement (SET_OCCURRENCES).
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
