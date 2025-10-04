<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\AutomationActionsPublicConditionalSingleFieldDependency\DependencyType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_actions_public_conditional_single_field_dependency = array{
 *   controllingFieldName: string,
 *   controllingFieldValue: string,
 *   dependencyType: value-of<DependencyType>,
 *   dependentFieldNames: list<string>,
 * }
 */
final class AutomationActionsPublicConditionalSingleFieldDependency implements BaseModel
{
    /**
     * @use SdkModel<automation_actions_public_conditional_single_field_dependency>
     */
    use SdkModel;

    #[Api]
    public string $controllingFieldName;

    #[Api]
    public string $controllingFieldValue;

    /** @var value-of<DependencyType> $dependencyType */
    #[Api(enum: DependencyType::class)]
    public string $dependencyType;

    /** @var list<string> $dependentFieldNames */
    #[Api(list: 'string')]
    public array $dependentFieldNames;

    /**
     * `new AutomationActionsPublicConditionalSingleFieldDependency()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsPublicConditionalSingleFieldDependency::with(
     *   controllingFieldName: ...,
     *   controllingFieldValue: ...,
     *   dependencyType: ...,
     *   dependentFieldNames: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsPublicConditionalSingleFieldDependency)
     *   ->withControllingFieldName(...)
     *   ->withControllingFieldValue(...)
     *   ->withDependencyType(...)
     *   ->withDependentFieldNames(...)
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
     * @param list<string> $dependentFieldNames
     * @param DependencyType|value-of<DependencyType> $dependencyType
     */
    public static function with(
        string $controllingFieldName,
        string $controllingFieldValue,
        array $dependentFieldNames,
        DependencyType|string $dependencyType = 'CONDITIONAL_SINGLE_FIELD',
    ): self {
        $obj = new self;

        $obj->controllingFieldName = $controllingFieldName;
        $obj->controllingFieldValue = $controllingFieldValue;
        $obj['dependencyType'] = $dependencyType;
        $obj->dependentFieldNames = $dependentFieldNames;

        return $obj;
    }

    public function withControllingFieldName(string $controllingFieldName): self
    {
        $obj = clone $this;
        $obj->controllingFieldName = $controllingFieldName;

        return $obj;
    }

    public function withControllingFieldValue(
        string $controllingFieldValue
    ): self {
        $obj = clone $this;
        $obj->controllingFieldValue = $controllingFieldValue;

        return $obj;
    }

    /**
     * @param DependencyType|value-of<DependencyType> $dependencyType
     */
    public function withDependencyType(
        DependencyType|string $dependencyType
    ): self {
        $obj = clone $this;
        $obj['dependencyType'] = $dependencyType;

        return $obj;
    }

    /**
     * @param list<string> $dependentFieldNames
     */
    public function withDependentFieldNames(array $dependentFieldNames): self
    {
        $obj = clone $this;
        $obj->dependentFieldNames = $dependentFieldNames;

        return $obj;
    }
}
