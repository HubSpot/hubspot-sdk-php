<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicConditionalSingleFieldDependency\DependencyType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicConditionalSingleFieldDependencyShape = array{
 *   controllingFieldName: string,
 *   controllingFieldValue: string,
 *   dependencyType: value-of<DependencyType>,
 *   dependentFieldNames: list<string>,
 * }
 */
final class PublicConditionalSingleFieldDependency implements BaseModel
{
    /** @use SdkModel<PublicConditionalSingleFieldDependencyShape> */
    use SdkModel;

    #[Required]
    public string $controllingFieldName;

    #[Required]
    public string $controllingFieldValue;

    /** @var value-of<DependencyType> $dependencyType */
    #[Required(enum: DependencyType::class)]
    public string $dependencyType;

    /** @var list<string> $dependentFieldNames */
    #[Required(list: 'string')]
    public array $dependentFieldNames;

    /**
     * `new PublicConditionalSingleFieldDependency()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicConditionalSingleFieldDependency::with(
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
     * (new PublicConditionalSingleFieldDependency)
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

        $obj['controllingFieldName'] = $controllingFieldName;
        $obj['controllingFieldValue'] = $controllingFieldValue;
        $obj['dependencyType'] = $dependencyType;
        $obj['dependentFieldNames'] = $dependentFieldNames;

        return $obj;
    }

    public function withControllingFieldName(string $controllingFieldName): self
    {
        $obj = clone $this;
        $obj['controllingFieldName'] = $controllingFieldName;

        return $obj;
    }

    public function withControllingFieldValue(
        string $controllingFieldValue
    ): self {
        $obj = clone $this;
        $obj['controllingFieldValue'] = $controllingFieldValue;

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
        $obj['dependentFieldNames'] = $dependentFieldNames;

        return $obj;
    }
}
