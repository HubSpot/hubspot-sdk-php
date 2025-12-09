<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\AllHistoryRefineBy\Type;

/**
 * @phpstan-type AllHistoryRefineByShape = array{type: value-of<Type>}
 */
final class AllHistoryRefineBy implements BaseModel
{
    /** @use SdkModel<AllHistoryRefineByShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new AllHistoryRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AllHistoryRefineBy::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AllHistoryRefineBy)->withType(...)
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
    public static function with(Type|string $type = 'AllHistoryRefineBy'): self
    {
        $obj = new self;

        $obj['type'] = $type;

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
