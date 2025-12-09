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
        $self = new self;

        $self['controllingFieldName'] = $controllingFieldName;
        $self['controllingFieldValue'] = $controllingFieldValue;
        $self['dependencyType'] = $dependencyType;
        $self['dependentFieldNames'] = $dependentFieldNames;

        return $self;
    }

    public function withControllingFieldName(string $controllingFieldName): self
    {
        $self = clone $this;
        $self['controllingFieldName'] = $controllingFieldName;

        return $self;
    }

    public function withControllingFieldValue(
        string $controllingFieldValue
    ): self {
        $self = clone $this;
        $self['controllingFieldValue'] = $controllingFieldValue;

        return $self;
    }

    /**
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
