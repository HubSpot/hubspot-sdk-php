<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Definitions;

use HubspotSDK\Automation\Actions\Definitions\DefinitionCreateParams\InputFieldDependency;
use HubspotSDK\Automation\Actions\FieldTypeDefinition;
use HubspotSDK\Automation\Actions\InputFieldDefinition;
use HubspotSDK\Automation\Actions\InputFieldDefinition\SupportedValueType;
use HubspotSDK\Automation\Actions\OutputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunction\FunctionType;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Automation\Actions\PublicConditionalSingleFieldDependency;
use HubspotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubspotSDK\Automation\Actions\PublicSingleFieldDependency;
use HubspotSDK\Automation\Actions\PublicSingleFieldDependency\DependencyType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new custom workflow action.
 *
 * @see HubspotSDK\Services\Automation\Actions\DefinitionsService::create()
 *
 * @phpstan-type DefinitionCreateParamsShape = array{
 *   actionURL: string,
 *   functions: list<PublicActionFunction|array{
 *     functionSource: string,
 *     functionType: value-of<FunctionType>,
 *     id?: string|null,
 *   }>,
 *   inputFields: list<InputFieldDefinition|array{
 *     isRequired: bool,
 *     typeDefinition: FieldTypeDefinition,
 *     automationFieldType?: string|null,
 *     supportedValueTypes?: list<value-of<SupportedValueType>>|null,
 *   }>,
 *   labels: array<string,PublicActionLabels|array{
 *     actionName: string,
 *     actionCardContent?: string|null,
 *     actionDescription?: string|null,
 *     appDisplayName?: string|null,
 *     executionRules?: array<string,string>|null,
 *     inputFieldDescriptions?: array<string,string>|null,
 *     inputFieldLabels?: array<string,string>|null,
 *     inputFieldOptionLabels?: array<string,array<string,string>>|null,
 *     outputFieldLabels?: array<string,string>|null,
 *   }>,
 *   objectTypes: list<string>,
 *   published: bool,
 *   archivedAt?: int,
 *   executionRules?: list<PublicExecutionTranslationRule|array{
 *     conditions: array<string,mixed>, labelName: string
 *   }>,
 *   inputFieldDependencies?: list<PublicSingleFieldDependency|array{
 *     controllingFieldName: string,
 *     dependencyType: value-of<DependencyType>,
 *     dependentFieldNames: list<string>,
 *   }|PublicConditionalSingleFieldDependency|array{
 *     controllingFieldName: string,
 *     controllingFieldValue: string,
 *     dependencyType: value-of<\HubspotSDK\Automation\Actions\PublicConditionalSingleFieldDependency\DependencyType>,
 *     dependentFieldNames: list<string>,
 *   }>,
 *   objectRequestOptions?: PublicObjectRequestOptions|array{
 *     properties: list<string>
 *   },
 *   outputFields?: list<OutputFieldDefinition|array{
 *     typeDefinition: FieldTypeDefinition
 *   }>,
 * }
 */
final class DefinitionCreateParams implements BaseModel
{
    /** @use SdkModel<DefinitionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('actionUrl')]
    public string $actionURL;

    /** @var list<PublicActionFunction> $functions */
    #[Required(list: PublicActionFunction::class)]
    public array $functions;

    /** @var list<InputFieldDefinition> $inputFields */
    #[Required(list: InputFieldDefinition::class)]
    public array $inputFields;

    /** @var array<string,PublicActionLabels> $labels */
    #[Required(map: PublicActionLabels::class)]
    public array $labels;

    /** @var list<string> $objectTypes */
    #[Required(list: 'string')]
    public array $objectTypes;

    #[Required]
    public bool $published;

    #[Optional]
    public ?int $archivedAt;

    /** @var list<PublicExecutionTranslationRule>|null $executionRules */
    #[Optional(list: PublicExecutionTranslationRule::class)]
    public ?array $executionRules;

    /**
     * @var list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency>|null $inputFieldDependencies
     */
    #[Optional(list: InputFieldDependency::class)]
    public ?array $inputFieldDependencies;

    #[Optional]
    public ?PublicObjectRequestOptions $objectRequestOptions;

    /** @var list<OutputFieldDefinition>|null $outputFields */
    #[Optional(list: OutputFieldDefinition::class)]
    public ?array $outputFields;

    /**
     * `new DefinitionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionCreateParams::with(
     *   actionURL: ...,
     *   functions: ...,
     *   inputFields: ...,
     *   labels: ...,
     *   objectTypes: ...,
     *   published: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionCreateParams)
     *   ->withActionURL(...)
     *   ->withFunctions(...)
     *   ->withInputFields(...)
     *   ->withLabels(...)
     *   ->withObjectTypes(...)
     *   ->withPublished(...)
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
     * @param list<PublicActionFunction|array{
     *   functionSource: string, functionType: value-of<FunctionType>, id?: string|null
     * }> $functions
     * @param list<InputFieldDefinition|array{
     *   isRequired: bool,
     *   typeDefinition: FieldTypeDefinition,
     *   automationFieldType?: string|null,
     *   supportedValueTypes?: list<value-of<SupportedValueType>>|null,
     * }> $inputFields
     * @param array<string,PublicActionLabels|array{
     *   actionName: string,
     *   actionCardContent?: string|null,
     *   actionDescription?: string|null,
     *   appDisplayName?: string|null,
     *   executionRules?: array<string,string>|null,
     *   inputFieldDescriptions?: array<string,string>|null,
     *   inputFieldLabels?: array<string,string>|null,
     *   inputFieldOptionLabels?: array<string,array<string,string>>|null,
     *   outputFieldLabels?: array<string,string>|null,
     * }> $labels
     * @param list<string> $objectTypes
     * @param list<PublicExecutionTranslationRule|array{
     *   conditions: array<string,mixed>, labelName: string
     * }> $executionRules
     * @param list<PublicSingleFieldDependency|array{
     *   controllingFieldName: string,
     *   dependencyType: value-of<DependencyType>,
     *   dependentFieldNames: list<string>,
     * }|PublicConditionalSingleFieldDependency|array{
     *   controllingFieldName: string,
     *   controllingFieldValue: string,
     *   dependencyType: value-of<PublicConditionalSingleFieldDependency\DependencyType>,
     *   dependentFieldNames: list<string>,
     * }> $inputFieldDependencies
     * @param PublicObjectRequestOptions|array{
     *   properties: list<string>
     * } $objectRequestOptions
     * @param list<OutputFieldDefinition|array{
     *   typeDefinition: FieldTypeDefinition
     * }> $outputFields
     */
    public static function with(
        string $actionURL,
        array $functions,
        array $inputFields,
        array $labels,
        array $objectTypes,
        bool $published,
        ?int $archivedAt = null,
        ?array $executionRules = null,
        ?array $inputFieldDependencies = null,
        PublicObjectRequestOptions|array|null $objectRequestOptions = null,
        ?array $outputFields = null,
    ): self {
        $obj = new self;

        $obj['actionURL'] = $actionURL;
        $obj['functions'] = $functions;
        $obj['inputFields'] = $inputFields;
        $obj['labels'] = $labels;
        $obj['objectTypes'] = $objectTypes;
        $obj['published'] = $published;

        null !== $archivedAt && $obj['archivedAt'] = $archivedAt;
        null !== $executionRules && $obj['executionRules'] = $executionRules;
        null !== $inputFieldDependencies && $obj['inputFieldDependencies'] = $inputFieldDependencies;
        null !== $objectRequestOptions && $obj['objectRequestOptions'] = $objectRequestOptions;
        null !== $outputFields && $obj['outputFields'] = $outputFields;

        return $obj;
    }

    public function withActionURL(string $actionURL): self
    {
        $obj = clone $this;
        $obj['actionURL'] = $actionURL;

        return $obj;
    }

    /**
     * @param list<PublicActionFunction|array{
     *   functionSource: string, functionType: value-of<FunctionType>, id?: string|null
     * }> $functions
     */
    public function withFunctions(array $functions): self
    {
        $obj = clone $this;
        $obj['functions'] = $functions;

        return $obj;
    }

    /**
     * @param list<InputFieldDefinition|array{
     *   isRequired: bool,
     *   typeDefinition: FieldTypeDefinition,
     *   automationFieldType?: string|null,
     *   supportedValueTypes?: list<value-of<SupportedValueType>>|null,
     * }> $inputFields
     */
    public function withInputFields(array $inputFields): self
    {
        $obj = clone $this;
        $obj['inputFields'] = $inputFields;

        return $obj;
    }

    /**
     * @param array<string,PublicActionLabels|array{
     *   actionName: string,
     *   actionCardContent?: string|null,
     *   actionDescription?: string|null,
     *   appDisplayName?: string|null,
     *   executionRules?: array<string,string>|null,
     *   inputFieldDescriptions?: array<string,string>|null,
     *   inputFieldLabels?: array<string,string>|null,
     *   inputFieldOptionLabels?: array<string,array<string,string>>|null,
     *   outputFieldLabels?: array<string,string>|null,
     * }> $labels
     */
    public function withLabels(array $labels): self
    {
        $obj = clone $this;
        $obj['labels'] = $labels;

        return $obj;
    }

    /**
     * @param list<string> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $obj = clone $this;
        $obj['objectTypes'] = $objectTypes;

        return $obj;
    }

    public function withPublished(bool $published): self
    {
        $obj = clone $this;
        $obj['published'] = $published;

        return $obj;
    }

    public function withArchivedAt(int $archivedAt): self
    {
        $obj = clone $this;
        $obj['archivedAt'] = $archivedAt;

        return $obj;
    }

    /**
     * @param list<PublicExecutionTranslationRule|array{
     *   conditions: array<string,mixed>, labelName: string
     * }> $executionRules
     */
    public function withExecutionRules(array $executionRules): self
    {
        $obj = clone $this;
        $obj['executionRules'] = $executionRules;

        return $obj;
    }

    /**
     * @param list<PublicSingleFieldDependency|array{
     *   controllingFieldName: string,
     *   dependencyType: value-of<DependencyType>,
     *   dependentFieldNames: list<string>,
     * }|PublicConditionalSingleFieldDependency|array{
     *   controllingFieldName: string,
     *   controllingFieldValue: string,
     *   dependencyType: value-of<PublicConditionalSingleFieldDependency\DependencyType>,
     *   dependentFieldNames: list<string>,
     * }> $inputFieldDependencies
     */
    public function withInputFieldDependencies(
        array $inputFieldDependencies
    ): self {
        $obj = clone $this;
        $obj['inputFieldDependencies'] = $inputFieldDependencies;

        return $obj;
    }

    /**
     * @param PublicObjectRequestOptions|array{
     *   properties: list<string>
     * } $objectRequestOptions
     */
    public function withObjectRequestOptions(
        PublicObjectRequestOptions|array $objectRequestOptions
    ): self {
        $obj = clone $this;
        $obj['objectRequestOptions'] = $objectRequestOptions;

        return $obj;
    }

    /**
     * @param list<OutputFieldDefinition|array{
     *   typeDefinition: FieldTypeDefinition
     * }> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $obj = clone $this;
        $obj['outputFields'] = $outputFields;

        return $obj;
    }
}
