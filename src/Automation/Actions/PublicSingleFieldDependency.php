<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicSingleFieldDependency\DependencyType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_single_field_dependency = array{
 *   controllingFieldName: string,
 *   dependencyType: value-of<DependencyType>,
 *   dependentFieldNames: list<string>,
 * }
 */
final class PublicSingleFieldDependency implements BaseModel
{
    /** @use SdkModel<public_single_field_dependency> */
    use SdkModel;

    #[Api]
    public string $controllingFieldName;

    /** @var value-of<DependencyType> $dependencyType */
    #[Api(enum: DependencyType::class)]
    public string $dependencyType;

    /** @var list<string> $dependentFieldNames */
    #[Api(list: 'string')]
    public array $dependentFieldNames;

    /**
     * `new PublicSingleFieldDependency()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSingleFieldDependency::with(
     *   controllingFieldName: ..., dependencyType: ..., dependentFieldNames: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSingleFieldDependency)
     *   ->withControllingFieldName(...)
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
        array $dependentFieldNames,
        DependencyType|string $dependencyType = 'SINGLE_FIELD',
    ): self {
        $obj = new self;

        $obj->controllingFieldName = $controllingFieldName;
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
