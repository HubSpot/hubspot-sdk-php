<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicSingleFieldDependency\DependencyType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSingleFieldDependencyShape = array{
 *   controllingFieldName: string,
 *   dependencyType: DependencyType|value-of<DependencyType>,
 *   dependentFieldNames: list<string>,
 * }
 */
final class PublicSingleFieldDependency implements BaseModel
{
    /** @use SdkModel<PublicSingleFieldDependencyShape> */
    use SdkModel;

    /**
     * The name of the field that controls the dependency.
     */
    #[Required]
    public string $controllingFieldName;

    /**
     * The type of dependency, with the default value being 'SINGLE_FIELD'.
     *
     * @var value-of<DependencyType> $dependencyType
     */
    #[Required(enum: DependencyType::class)]
    public string $dependencyType;

    /** @var list<string> $dependentFieldNames */
    #[Required(list: 'string')]
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
        $self = new self;

        $self['controllingFieldName'] = $controllingFieldName;
        $self['dependencyType'] = $dependencyType;
        $self['dependentFieldNames'] = $dependentFieldNames;

        return $self;
    }

    /**
     * The name of the field that controls the dependency.
     */
    public function withControllingFieldName(string $controllingFieldName): self
    {
        $self = clone $this;
        $self['controllingFieldName'] = $controllingFieldName;

        return $self;
    }

    /**
     * The type of dependency, with the default value being 'SINGLE_FIELD'.
     *
     * @param DependencyType|value-of<DependencyType> $dependencyType
     */
    public function withDependencyType(
        DependencyType|string $dependencyType
    ): self {
        $self = clone $this;
        $self['dependencyType'] = $dependencyType;

        return $self;
    }

    /**
     * @param list<string> $dependentFieldNames
     */
    public function withDependentFieldNames(array $dependentFieldNames): self
    {
        $self = clone $this;
        $self['dependentFieldNames'] = $dependentFieldNames;

        return $self;
    }
}
