<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionDefinitionEgg\InputFieldDependency;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InputFieldDependencyVariants from \HubspotSDK\Automation\Actions\PublicActionDefinitionEgg\InputFieldDependency
 * @phpstan-import-type PublicActionFunctionShape from \HubspotSDK\Automation\Actions\PublicActionFunction
 * @phpstan-import-type InputFieldDefinitionShape from \HubspotSDK\Automation\Actions\InputFieldDefinition
 * @phpstan-import-type PublicActionLabelsShape from \HubspotSDK\Automation\Actions\PublicActionLabels
 * @phpstan-import-type PublicExecutionTranslationRuleShape from \HubspotSDK\Automation\Actions\PublicExecutionTranslationRule
 * @phpstan-import-type InputFieldDependencyShape from \HubspotSDK\Automation\Actions\PublicActionDefinitionEgg\InputFieldDependency
 * @phpstan-import-type PublicObjectRequestOptionsShape from \HubspotSDK\Automation\Actions\PublicObjectRequestOptions
 * @phpstan-import-type OutputFieldDefinitionShape from \HubspotSDK\Automation\Actions\OutputFieldDefinition
 *
 * @phpstan-type PublicActionDefinitionEggShape = array{
 *   actionURL: string,
 *   functions: list<PublicActionFunction|PublicActionFunctionShape>,
 *   inputFields: list<InputFieldDefinition|InputFieldDefinitionShape>,
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
final class PublicActionDefinitionEgg implements BaseModel
{
    /** @use SdkModel<PublicActionDefinitionEggShape> */
    use SdkModel;

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

    /** @var list<InputFieldDependencyVariants>|null $inputFieldDependencies */
    #[Optional(list: InputFieldDependency::class)]
    public ?array $inputFieldDependencies;

    #[Optional]
    public ?PublicObjectRequestOptions $objectRequestOptions;

    /** @var list<OutputFieldDefinition>|null $outputFields */
    #[Optional(list: OutputFieldDefinition::class)]
    public ?array $outputFields;

    /**
     * `new PublicActionDefinitionEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicActionDefinitionEgg::with(
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
     * (new PublicActionDefinitionEgg)
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
     * @param list<InputFieldDefinition|InputFieldDefinitionShape> $inputFields
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
     * @param list<InputFieldDefinition|InputFieldDefinitionShape> $inputFields
     */
    public function withInputFields(array $inputFields): self
    {
        $self = clone $this;
        $self['inputFields'] = $inputFields;

        return $self;
    }

    /**
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

    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }

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
