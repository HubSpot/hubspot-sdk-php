<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicSetOccurrencesRefineBy\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_set_occurrences_refine_by = array{
 *   setType: string, type: value-of<Type>
 * }
 */
final class AutomationPublicSetOccurrencesRefineBy implements BaseModel
{
    /** @use SdkModel<automation_public_set_occurrences_refine_by> */
    use SdkModel;

    #[Api]
    public string $setType;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationPublicSetOccurrencesRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicSetOccurrencesRefineBy::with(setType: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicSetOccurrencesRefineBy)->withSetType(...)->withType(...)
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
        $obj = new self;

        $obj->setType = $setType;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withSetType(string $setType): self
    {
        $obj = clone $this;
        $obj->setType = $setType;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
