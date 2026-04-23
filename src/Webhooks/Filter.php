<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Defines a single condition for searching CRM objects, specifying the property to filter on, the operator to use (such as equals, greater than, or contains), and the value(s) to compare against.
 *
 * @phpstan-import-type ConditionShape from \HubSpotSDK\Webhooks\Condition
 *
 * @phpstan-type FilterShape = array{conditions: list<Condition|ConditionShape>}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * An array of conditions that define the criteria for the filter. Each condition specifies a property, an operator, and optionally a value or values.
     *
     * @var list<Condition> $conditions
     */
    #[Required(list: Condition::class)]
    public array $conditions;

    /**
     * `new Filter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Filter::with(conditions: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Filter)->withConditions(...)
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
     * @param list<Condition|ConditionShape> $conditions
     */
    public static function with(array $conditions): self
    {
        $self = new self;

        $self['conditions'] = $conditions;

        return $self;
    }

    /**
     * An array of conditions that define the criteria for the filter. Each condition specifies a property, an operator, and optionally a value or values.
     *
     * @param list<Condition|ConditionShape> $conditions
     */
    public function withConditions(array $conditions): self
    {
        $self = clone $this;
        $self['conditions'] = $conditions;

        return $self;
    }
}
