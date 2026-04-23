<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Automation\Actions\PublicActionDefinitionPatch\InputFieldDependency;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InputFieldDependencyVariants from \HubSpotSDK\Automation\Actions\PublicActionDefinitionPatch\InputFieldDependency
 * @phpstan-import-type PublicExecutionTranslationRuleShape from \HubSpotSDK\Automation\Actions\PublicExecutionTranslationRule
 * @phpstan-import-type InputFieldDependencyShape from \HubSpotSDK\Automation\Actions\PublicActionDefinitionPatch\InputFieldDependency
 * @phpstan-import-type PublicInputFieldDefinitionShape from \HubSpotSDK\Automation\Actions\PublicInputFieldDefinition
 * @phpstan-import-type PublicActionLabelsShape from \HubSpotSDK\Automation\Actions\PublicActionLabels
 * @phpstan-import-type PublicObjectRequestOptionsShape from \HubSpotSDK\Automation\Actions\PublicObjectRequestOptions
 * @phpstan-import-type OutputFieldDefinitionShape from \HubSpotSDK\Automation\Actions\OutputFieldDefinition
 *
 * @phpstan-type PublicActionDefinitionPatchShape = array{
 *   actionURL?: string|null,
 *   executionRules?: list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape>|null,
 *   inputFieldDependencies?: list<InputFieldDependencyShape>|null,
 *   inputFields?: list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape>|null,
 *   labels?: array<string,PublicActionLabels|PublicActionLabelsShape>|null,
 *   objectRequestOptions?: null|PublicObjectRequestOptions|PublicObjectRequestOptionsShape,
 *   objectTypes?: list<string>|null,
 *   outputFields?: list<OutputFieldDefinition|OutputFieldDefinitionShape>|null,
 *   published?: bool|null,
 * }
 */
final class PublicActionDefinitionPatch implements BaseModel
{
    /** @use SdkModel<PublicActionDefinitionPatchShape> */
    use SdkModel;

    /**
     * The URL endpoint where the action is executed.
     */
    #[Optional('actionUrl')]
    public ?string $actionURL;

    /** @var list<PublicExecutionTranslationRule>|null $executionRules */
    #[Optional(list: PublicExecutionTranslationRule::class)]
    public ?array $executionRules;

    /** @var list<InputFieldDependencyVariants>|null $inputFieldDependencies */
    #[Optional(list: InputFieldDependency::class)]
    public ?array $inputFieldDependencies;

    /** @var list<PublicInputFieldDefinition>|null $inputFields */
    #[Optional(list: PublicInputFieldDefinition::class)]
    public ?array $inputFields;

    /**
     * Contains labels for the action, including names and descriptions.
     *
     * @var array<string,PublicActionLabels>|null $labels
     */
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

    /**
     * Indicates whether the action is published and available for use.
     */
    #[Optional]
    public ?bool $published;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape>|null $executionRules
     * @param list<InputFieldDependencyShape>|null $inputFieldDependencies
     * @param list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape>|null $inputFields
     * @param array<string,PublicActionLabels|PublicActionLabelsShape>|null $labels
     * @param PublicObjectRequestOptions|PublicObjectRequestOptionsShape|null $objectRequestOptions
     * @param list<string>|null $objectTypes
     * @param list<OutputFieldDefinition|OutputFieldDefinitionShape>|null $outputFields
     */
    public static function with(
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
        $self = new self;

        null !== $actionURL && $self['actionURL'] = $actionURL;
        null !== $executionRules && $self['executionRules'] = $executionRules;
        null !== $inputFieldDependencies && $self['inputFieldDependencies'] = $inputFieldDependencies;
        null !== $inputFields && $self['inputFields'] = $inputFields;
        null !== $labels && $self['labels'] = $labels;
        null !== $objectRequestOptions && $self['objectRequestOptions'] = $objectRequestOptions;
        null !== $objectTypes && $self['objectTypes'] = $objectTypes;
        null !== $outputFields && $self['outputFields'] = $outputFields;
        null !== $published && $self['published'] = $published;

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
     * @param list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape> $inputFields
     */
    public function withInputFields(array $inputFields): self
    {
        $self = clone $this;
        $self['inputFields'] = $inputFields;

        return $self;
    }

    /**
     * Contains labels for the action, including names and descriptions.
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
     * @param list<string> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $self = clone $this;
        $self['objectTypes'] = $objectTypes;

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

    /**
     * Indicates whether the action is published and available for use.
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }
}
