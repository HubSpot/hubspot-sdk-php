<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Definitions;

use HubspotSDK\Automation\Actions\Definitions\DefinitionUpdateParams\InputFieldDependency;
use HubspotSDK\Automation\Actions\FieldTypeDefinition;
use HubspotSDK\Automation\Actions\InputFieldDefinition;
use HubspotSDK\Automation\Actions\InputFieldDefinition\SupportedValueType;
use HubspotSDK\Automation\Actions\OutputFieldDefinition;
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
 * Update an existing action definition by ID.
 *
 * @see HubspotSDK\Services\Automation\Actions\DefinitionsService::update()
 *
 * @phpstan-type DefinitionUpdateParamsShape = array{
 *   appID: int,
 *   actionURL?: string,
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
 *   inputFields?: list<InputFieldDefinition|array{
 *     isRequired: bool,
 *     typeDefinition: FieldTypeDefinition,
 *     automationFieldType?: string|null,
 *     supportedValueTypes?: list<value-of<SupportedValueType>>|null,
 *   }>,
 *   labels?: array<string,PublicActionLabels|array{
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
 *   objectRequestOptions?: PublicObjectRequestOptions|array{
 *     properties: list<string>
 *   },
 *   objectTypes?: list<string>,
 *   outputFields?: list<OutputFieldDefinition|array{
 *     typeDefinition: FieldTypeDefinition
 *   }>,
 *   published?: bool,
 * }
 */
final class DefinitionUpdateParams implements BaseModel
{
    /** @use SdkModel<DefinitionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Optional('actionUrl')]
    public ?string $actionURL;

    /** @var list<PublicExecutionTranslationRule>|null $executionRules */
    #[Optional(list: PublicExecutionTranslationRule::class)]
    public ?array $executionRules;

    /**
     * @var list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency>|null $inputFieldDependencies
     */
    #[Optional(list: InputFieldDependency::class)]
    public ?array $inputFieldDependencies;

    /** @var list<InputFieldDefinition>|null $inputFields */
    #[Optional(list: InputFieldDefinition::class)]
    public ?array $inputFields;

    /** @var array<string,PublicActionLabels>|null $labels */
    #[Optional(map: PublicActionLabels::class)]
    public ?array $labels;

    #[Optional]
    public ?PublicObjectRequestOptions $objectRequestOptions;

    /** @var list<string>|null $objectTypes */
    #[Optional(list: 'string')]
    public ?array $objectTypes;

    /** @var list<OutputFieldDefinition>|null $outputFields */
    #[Optional(list: OutputFieldDefinition::class)]
    public ?array $outputFields;

    #[Optional]
    public ?bool $published;

    /**
     * `new DefinitionUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionUpdateParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionUpdateParams)->withAppID(...)
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
     * @param PublicObjectRequestOptions|array{
     *   properties: list<string>
     * } $objectRequestOptions
     * @param list<string> $objectTypes
     * @param list<OutputFieldDefinition|array{
     *   typeDefinition: FieldTypeDefinition
     * }> $outputFields
     */
    public static function with(
        int $appID,
        ?string $actionURL = null,
        ?array $executionRules = null,
        ?array $inputFieldDependencies = null,
        ?array $inputFields = null,
        ?array $labels = null,
        PublicObjectRequestOptions|array|null $objectRequestOptions = null,
        ?array $objectTypes = null,
        ?array $outputFields = null,
        ?bool $published = null,
    ): self {
        $obj = new self;

        $obj['appID'] = $appID;

        null !== $actionURL && $obj['actionURL'] = $actionURL;
        null !== $executionRules && $obj['executionRules'] = $executionRules;
        null !== $inputFieldDependencies && $obj['inputFieldDependencies'] = $inputFieldDependencies;
        null !== $inputFields && $obj['inputFields'] = $inputFields;
        null !== $labels && $obj['labels'] = $labels;
        null !== $objectRequestOptions && $obj['objectRequestOptions'] = $objectRequestOptions;
        null !== $objectTypes && $obj['objectTypes'] = $objectTypes;
        null !== $outputFields && $obj['outputFields'] = $outputFields;
        null !== $published && $obj['published'] = $published;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appID'] = $appID;

        return $obj;
    }

    public function withActionURL(string $actionURL): self
    {
        $obj = clone $this;
        $obj['actionURL'] = $actionURL;

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
     * @param list<string> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $obj = clone $this;
        $obj['objectTypes'] = $objectTypes;

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

    public function withPublished(bool $published): self
    {
        $obj = clone $this;
        $obj['published'] = $published;

        return $obj;
    }
}
