<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\AutomationActionsPublicActionDefinitionPatch\InputFieldDependency;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_actions_public_action_definition_patch = array{
 *   actionURL?: string,
 *   executionRules?: list<AutomationActionsPublicExecutionTranslationRule>,
 *   inputFieldDependencies?: list<AutomationActionsPublicSingleFieldDependency|AutomationActionsPublicConditionalSingleFieldDependency>,
 *   inputFields?: list<AutomationActionsInputFieldDefinition>,
 *   labels?: array<string, AutomationActionsPublicActionLabels>,
 *   objectRequestOptions?: AutomationActionsPublicObjectRequestOptions,
 *   objectTypes?: list<string>,
 *   outputFields?: list<AutomationActionsOutputFieldDefinition>,
 *   published?: bool,
 * }
 */
final class AutomationActionsPublicActionDefinitionPatch implements BaseModel
{
    /** @use SdkModel<automation_actions_public_action_definition_patch> */
    use SdkModel;

    #[Api('actionUrl', optional: true)]
    public ?string $actionURL;

    /**
     * @var list<AutomationActionsPublicExecutionTranslationRule>|null $executionRules
     */
    #[Api(
        list: AutomationActionsPublicExecutionTranslationRule::class,
        optional: true
    )]
    public ?array $executionRules;

    /**
     * @var list<AutomationActionsPublicSingleFieldDependency|AutomationActionsPublicConditionalSingleFieldDependency>|null $inputFieldDependencies
     */
    #[Api(list: InputFieldDependency::class, optional: true)]
    public ?array $inputFieldDependencies;

    /** @var list<AutomationActionsInputFieldDefinition>|null $inputFields */
    #[Api(list: AutomationActionsInputFieldDefinition::class, optional: true)]
    public ?array $inputFields;

    /** @var array<string, AutomationActionsPublicActionLabels>|null $labels */
    #[Api(map: AutomationActionsPublicActionLabels::class, optional: true)]
    public ?array $labels;

    #[Api(optional: true)]
    public ?AutomationActionsPublicObjectRequestOptions $objectRequestOptions;

    /** @var list<string>|null $objectTypes */
    #[Api(list: 'string', optional: true)]
    public ?array $objectTypes;

    /** @var list<AutomationActionsOutputFieldDefinition>|null $outputFields */
    #[Api(list: AutomationActionsOutputFieldDefinition::class, optional: true)]
    public ?array $outputFields;

    #[Api(optional: true)]
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
     * @param list<AutomationActionsPublicExecutionTranslationRule> $executionRules
     * @param list<AutomationActionsPublicSingleFieldDependency|AutomationActionsPublicConditionalSingleFieldDependency> $inputFieldDependencies
     * @param list<AutomationActionsInputFieldDefinition> $inputFields
     * @param array<string, AutomationActionsPublicActionLabels> $labels
     * @param list<string> $objectTypes
     * @param list<AutomationActionsOutputFieldDefinition> $outputFields
     */
    public static function with(
        ?string $actionURL = null,
        ?array $executionRules = null,
        ?array $inputFieldDependencies = null,
        ?array $inputFields = null,
        ?array $labels = null,
        ?AutomationActionsPublicObjectRequestOptions $objectRequestOptions = null,
        ?array $objectTypes = null,
        ?array $outputFields = null,
        ?bool $published = null,
    ): self {
        $obj = new self;

        null !== $actionURL && $obj->actionURL = $actionURL;
        null !== $executionRules && $obj->executionRules = $executionRules;
        null !== $inputFieldDependencies && $obj->inputFieldDependencies = $inputFieldDependencies;
        null !== $inputFields && $obj->inputFields = $inputFields;
        null !== $labels && $obj->labels = $labels;
        null !== $objectRequestOptions && $obj->objectRequestOptions = $objectRequestOptions;
        null !== $objectTypes && $obj->objectTypes = $objectTypes;
        null !== $outputFields && $obj->outputFields = $outputFields;
        null !== $published && $obj->published = $published;

        return $obj;
    }

    public function withActionURL(string $actionURL): self
    {
        $obj = clone $this;
        $obj->actionURL = $actionURL;

        return $obj;
    }

    /**
     * @param list<AutomationActionsPublicExecutionTranslationRule> $executionRules
     */
    public function withExecutionRules(array $executionRules): self
    {
        $obj = clone $this;
        $obj->executionRules = $executionRules;

        return $obj;
    }

    /**
     * @param list<AutomationActionsPublicSingleFieldDependency|AutomationActionsPublicConditionalSingleFieldDependency> $inputFieldDependencies
     */
    public function withInputFieldDependencies(
        array $inputFieldDependencies
    ): self {
        $obj = clone $this;
        $obj->inputFieldDependencies = $inputFieldDependencies;

        return $obj;
    }

    /**
     * @param list<AutomationActionsInputFieldDefinition> $inputFields
     */
    public function withInputFields(array $inputFields): self
    {
        $obj = clone $this;
        $obj->inputFields = $inputFields;

        return $obj;
    }

    /**
     * @param array<string, AutomationActionsPublicActionLabels> $labels
     */
    public function withLabels(array $labels): self
    {
        $obj = clone $this;
        $obj->labels = $labels;

        return $obj;
    }

    public function withObjectRequestOptions(
        AutomationActionsPublicObjectRequestOptions $objectRequestOptions
    ): self {
        $obj = clone $this;
        $obj->objectRequestOptions = $objectRequestOptions;

        return $obj;
    }

    /**
     * @param list<string> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $obj = clone $this;
        $obj->objectTypes = $objectTypes;

        return $obj;
    }

    /**
     * @param list<AutomationActionsOutputFieldDefinition> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $obj = clone $this;
        $obj->outputFields = $outputFields;

        return $obj;
    }

    public function withPublished(bool $published): self
    {
        $obj = clone $this;
        $obj->published = $published;

        return $obj;
    }
}
