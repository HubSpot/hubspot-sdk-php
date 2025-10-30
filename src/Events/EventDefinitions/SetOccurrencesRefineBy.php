<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\SetOccurrencesRefineBy\SetType;
use HubspotSDK\Events\EventDefinitions\SetOccurrencesRefineBy\Type;

/**
 * @phpstan-type SetOccurrencesRefineByShape = array{
 *   setType: value-of<SetType>, type: value-of<Type>
 * }
 */
final class SetOccurrencesRefineBy implements BaseModel
{
    /** @use SdkModel<SetOccurrencesRefineByShape> */
    use SdkModel;

    /** @var value-of<SetType> $setType */
    #[Api(enum: SetType::class)]
    public string $setType;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new SetOccurrencesRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SetOccurrencesRefineBy::with(setType: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SetOccurrencesRefineBy)->withSetType(...)->withType(...)
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
     * @param SetType|value-of<SetType> $setType
     * @param Type|value-of<Type> $type
     */
    public static function with(
        SetType|string $setType,
        Type|string $type = 'SetOccurrencesRefineBy'
    ): self {
        $obj = new self;

        $obj['setType'] = $setType;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param SetType|value-of<SetType> $setType
     */
    public function withSetType(SetType|string $setType): self
    {
        $obj = clone $this;
        $obj['setType'] = $setType;

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
}
