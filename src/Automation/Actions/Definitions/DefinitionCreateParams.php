<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\Definitions;

use HubSpotSDK\Automation\Actions\Definitions\DefinitionCreateParams\InputFieldDependency;
use HubSpotSDK\Automation\Actions\OutputFieldDefinition;
use HubSpotSDK\Automation\Actions\PublicActionFunction;
use HubSpotSDK\Automation\Actions\PublicActionLabels;
use HubSpotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubSpotSDK\Automation\Actions\PublicInputFieldDefinition;
use HubSpotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a new custom workflow action.
 *
 * @see HubSpotSDK\Services\Automation\Actions\DefinitionsService::create()
 *
 * @phpstan-import-type InputFieldDependencyVariants from \HubSpotSDK\Automation\Actions\Definitions\DefinitionCreateParams\InputFieldDependency
 * @phpstan-import-type PublicActionFunctionShape from \HubSpotSDK\Automation\Actions\PublicActionFunction
 * @phpstan-import-type PublicInputFieldDefinitionShape from \HubSpotSDK\Automation\Actions\PublicInputFieldDefinition
 * @phpstan-import-type PublicActionLabelsShape from \HubSpotSDK\Automation\Actions\PublicActionLabels
 * @phpstan-import-type PublicExecutionTranslationRuleShape from \HubSpotSDK\Automation\Actions\PublicExecutionTranslationRule
 * @phpstan-import-type InputFieldDependencyShape from \HubSpotSDK\Automation\Actions\Definitions\DefinitionCreateParams\InputFieldDependency
 * @phpstan-import-type PublicObjectRequestOptionsShape from \HubSpotSDK\Automation\Actions\PublicObjectRequestOptions
 * @phpstan-import-type OutputFieldDefinitionShape from \HubSpotSDK\Automation\Actions\OutputFieldDefinition
 *
 * @phpstan-type DefinitionCreateParamsShape = array{
 *   actionURL: string,
 *   functions: list<PublicActionFunction|PublicActionFunctionShape>,
 *   inputFields: list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape>,
 *   labels: array<string,PublicActionLabels|PublicActionLabelsShape>,
 *   objectTypes: list<string>,
 *   published: bool,
 *   archivedAt?: int|null,
 *   executionRules?: list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape>|null,
 *   inputFieldDependencies?: list<InputFieldDependencyShape>|null,
 *   objectRequestOptions?: null|PublicObjectRequestOptions|PublicObjectRequestOptionsShape,
 *   outputFields?: list<OutputFieldDefinition|OutputFieldDefinitionShape>|null,
 * }
 */
final class DefinitionCreateParams implements BaseModel
{
    /** @use SdkModel<DefinitionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL endpoint where the action is executed.
     */
    #[Required('actionUrl')]
    public string $actionURL;

    /** @var list<PublicActionFunction> $functions */
    #[Required(list: PublicActionFunction::class)]
    public array $functions;

    /** @var list<PublicInputFieldDefinition> $inputFields */
    #[Required(list: PublicInputFieldDefinition::class)]
    public array $inputFields;

    /**
     * Holds various labels associated with the action, including names and descriptions.
     *
     * @var array<string,PublicActionLabels> $labels
     */
    #[Required(map: PublicActionLabels::class)]
    public array $labels;

    /** @var list<string> $objectTypes */
    #[Required(list: 'string')]
    public array $objectTypes;

    /**
     * Indicates whether the action is published and available for use.
     */
    #[Required]
    public bool $published;

    /**
     * The timestamp indicating when the action was archived.
     */
    #[Optional]
    public ?int $archivedAt;

    /** @var list<PublicExecutionTranslationRule>|null $executionRules */
    #[Optional(list: PublicExecutionTranslationRule::class)]
    public ?array $executionRules;

    /** @var list<InputFieldDependencyVariants>|null $inputFieldDependencies */
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
     * @param list<PublicActionFunction|PublicActionFunctionShape> $functions
     * @param list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape> $inputFields
     * @param array<string,PublicActionLabels|PublicActionLabelsShape> $labels
     * @param list<string> $objectTypes
     * @param list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape>|null $executionRules
     * @param list<InputFieldDependencyShape>|null $inputFieldDependencies
     * @param PublicObjectRequestOptions|PublicObjectRequestOptionsShape|null $objectRequestOptions
     * @param list<OutputFieldDefinition|OutputFieldDefinitionShape>|null $outputFields
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
        $self = new self;

        $self['actionURL'] = $actionURL;
        $self['functions'] = $functions;
        $self['inputFields'] = $inputFields;
        $self['labels'] = $labels;
        $self['objectTypes'] = $objectTypes;
        $self['published'] = $published;

        null !== $archivedAt && $self['archivedAt'] = $archivedAt;
        null !== $executionRules && $self['executionRules'] = $executionRules;
        null !== $inputFieldDependencies && $self['inputFieldDependencies'] = $inputFieldDependencies;
        null !== $objectRequestOptions && $self['objectRequestOptions'] = $objectRequestOptions;
        null !== $outputFields && $self['outputFields'] = $outputFields;

        return $self;
    }

    /**
     * The URL endpoint where the action is executed.
     */
    public function withActionURL(string $actionURL): self
    {
        $self = clone $this;
        $self['actionURL'] = $actionURL;

        return $self;
    }

    /**
     * @param list<PublicActionFunction|PublicActionFunctionShape> $functions
     */
    public function withFunctions(array $functions): self
    {
        $self = clone $this;
        $self['functions'] = $functions;

        return $self;
    }

    /**
     * @param list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape> $inputFields
     */
    public function withInputFields(array $inputFields): self
    {
        $self = clone $this;
        $self['inputFields'] = $inputFields;

        return $self;
    }

    /**
     * Holds various labels associated with the action, including names and descriptions.
     *
     * @param array<string,PublicActionLabels|PublicActionLabelsShape> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    /**
     * @param list<string> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $self = clone $this;
        $self['objectTypes'] = $objectTypes;

        return $self;
    }

    /**
     * Indicates whether the action is published and available for use.
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }

    /**
     * The timestamp indicating when the action was archived.
     */
    public function withArchivedAt(int $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }

    /**
     * @param list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape> $executionRules
     */
    public function withExecutionRules(array $executionRules): self
    {
        $self = clone $this;
        $self['executionRules'] = $executionRules;

        return $self;
    }

    /**
     * @param list<InputFieldDependencyShape> $inputFieldDependencies
     */
    public function withInputFieldDependencies(
        array $inputFieldDependencies
    ): self {
        $self = clone $this;
        $self['inputFieldDependencies'] = $inputFieldDependencies;

        return $self;
    }

    /**
     * @param PublicObjectRequestOptions|PublicObjectRequestOptionsShape $objectRequestOptions
     */
    public function withObjectRequestOptions(
        PublicObjectRequestOptions|array $objectRequestOptions
    ): self {
        $self = clone $this;
        $self['objectRequestOptions'] = $objectRequestOptions;

        return $self;
    }

    /**
     * @param list<OutputFieldDefinition|OutputFieldDefinitionShape> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $self = clone $this;
        $self['outputFields'] = $outputFields;

        return $self;
    }
}
