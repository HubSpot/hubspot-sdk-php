<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ComboEventRuleShape = array{
 *   count: int,
 *   eventTypeId: string,
 *   propertyFilters: list<PropertyFilter>,
 *   lookbackWindowDays?: int|null,
 * }
 */
final class ComboEventRule implements BaseModel
{
    /** @use SdkModel<ComboEventRuleShape> */
    use SdkModel;

    #[Api]
    public int $count;

    #[Api]
    public string $eventTypeId;

    /** @var list<PropertyFilter> $propertyFilters */
    #[Api(list: PropertyFilter::class)]
    public array $propertyFilters;

    #[Api(optional: true)]
    public ?int $lookbackWindowDays;

    /**
     * `new ComboEventRule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ComboEventRule::with(count: ..., eventTypeId: ..., propertyFilters: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ComboEventRule)
     *   ->withCount(...)
     *   ->withEventTypeID(...)
     *   ->withPropertyFilters(...)
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
     * @param list<PropertyFilter> $propertyFilters
     */
    public static function with(
        int $count,
        string $eventTypeId,
        array $propertyFilters,
        ?int $lookbackWindowDays = null,
    ): self {
        $obj = new self;

        $obj->count = $count;
        $obj->eventTypeId = $eventTypeId;
        $obj->propertyFilters = $propertyFilters;

        null !== $lookbackWindowDays && $obj->lookbackWindowDays = $lookbackWindowDays;

        return $obj;
    }

    public function withCount(int $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    public function withEventTypeID(string $eventTypeID): self
    {
        $obj = clone $this;
        $obj->eventTypeId = $eventTypeID;

        return $obj;
    }

    /**
     * @param list<PropertyFilter> $propertyFilters
     */
    public function withPropertyFilters(array $propertyFilters): self
    {
        $obj = clone $this;
        $obj->propertyFilters = $propertyFilters;

        return $obj;
    }

    public function withLookbackWindowDays(int $lookbackWindowDays): self
    {
        $obj = clone $this;
        $obj->lookbackWindowDays = $lookbackWindowDays;

        return $obj;
    }
}
