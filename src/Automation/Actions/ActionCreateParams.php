<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\ActionCreateParams\InputFieldDependency;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionCreateParams); // set properties as needed
 * $client->automation.actions->create(...$params->toArray());
 * ```
 * Create a new custom action definition.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->automation.actions->create(...$params->toArray());`
 *
 * @see HubspotSDK\Automation\Actions->create
 *
 * @phpstan-type action_create_params = array{
 *   actionURL: string,
 *   functions: list<AutomationActionsPublicActionFunction>,
 *   inputFields: list<AutomationActionsInputFieldDefinition>,
 *   labels: array<string, AutomationActionsPublicActionLabels>,
 *   objectTypes: list<string>,
 *   published: bool,
 *   archivedAt?: int,
 *   executionRules?: list<AutomationActionsPublicExecutionTranslationRule>,
 *   inputFieldDependencies?: list<AutomationActionsPublicSingleFieldDependency|AutomationActionsPublicConditionalSingleFieldDependency>,
 *   objectRequestOptions?: AutomationActionsPublicObjectRequestOptions,
 *   outputFields?: list<AutomationActionsOutputFieldDefinition>,
 * }
 */
final class ActionCreateParams implements BaseModel
{
    /** @use SdkModel<action_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api('actionUrl')]
    public string $actionURL;

    /** @var list<AutomationActionsPublicActionFunction> $functions */
    #[Api(list: AutomationActionsPublicActionFunction::class)]
    public array $functions;

    /** @var list<AutomationActionsInputFieldDefinition> $inputFields */
    #[Api(list: AutomationActionsInputFieldDefinition::class)]
    public array $inputFields;

    /** @var array<string, AutomationActionsPublicActionLabels> $labels */
    #[Api(map: AutomationActionsPublicActionLabels::class)]
    public array $labels;

    /** @var list<string> $objectTypes */
    #[Api(list: 'string')]
    public array $objectTypes;

    #[Api]
    public bool $published;

    #[Api(optional: true)]
    public ?int $archivedAt;

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

    #[Api(optional: true)]
    public ?AutomationActionsPublicObjectRequestOptions $objectRequestOptions;

    /** @var list<AutomationActionsOutputFieldDefinition>|null $outputFields */
    #[Api(list: AutomationActionsOutputFieldDefinition::class, optional: true)]
    public ?array $outputFields;

    /**
     * `new ActionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionCreateParams::with(
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
     * (new ActionCreateParams)
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
     * @param list<AutomationActionsPublicActionFunction> $functions
     * @param list<AutomationActionsInputFieldDefinition> $inputFields
     * @param array<string, AutomationActionsPublicActionLabels> $labels
     * @param list<string> $objectTypes
     * @param list<AutomationActionsPublicExecutionTranslationRule> $executionRules
     * @param list<AutomationActionsPublicSingleFieldDependency|AutomationActionsPublicConditionalSingleFieldDependency> $inputFieldDependencies
     * @param list<AutomationActionsOutputFieldDefinition> $outputFields
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
        ?AutomationActionsPublicObjectRequestOptions $objectRequestOptions = null,
        ?array $outputFields = null,
    ): self {
        $obj = new self;

        $obj->actionURL = $actionURL;
        $obj->functions = $functions;
        $obj->inputFields = $inputFields;
        $obj->labels = $labels;
        $obj->objectTypes = $objectTypes;
        $obj->published = $published;

        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $executionRules && $obj->executionRules = $executionRules;
        null !== $inputFieldDependencies && $obj->inputFieldDependencies = $inputFieldDependencies;
        null !== $objectRequestOptions && $obj->objectRequestOptions = $objectRequestOptions;
        null !== $outputFields && $obj->outputFields = $outputFields;

        return $obj;
    }

    public function withActionURL(string $actionURL): self
    {
        $obj = clone $this;
        $obj->actionURL = $actionURL;

        return $obj;
    }

    /**
     * @param list<AutomationActionsPublicActionFunction> $functions
     */
    public function withFunctions(array $functions): self
    {
        $obj = clone $this;
        $obj->functions = $functions;

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

    /**
     * @param list<string> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $obj = clone $this;
        $obj->objectTypes = $objectTypes;

        return $obj;
    }

    public function withPublished(bool $published): self
    {
        $obj = clone $this;
        $obj->published = $published;

        return $obj;
    }

    public function withArchivedAt(int $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

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

    public function withObjectRequestOptions(
        AutomationActionsPublicObjectRequestOptions $objectRequestOptions
    ): self {
        $obj = clone $this;
        $obj->objectRequestOptions = $objectRequestOptions;

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
}
