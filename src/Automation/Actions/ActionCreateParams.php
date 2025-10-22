<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\ActionCreateParams\InputFieldDependency;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new custom workflow action.
 *
 * @see HubspotSDK\Automation\Actions->create
 *
 * @phpstan-type action_create_params = array{
 *   actionURL: string,
 *   functions: list<PublicActionFunction>,
 *   inputFields: list<InputFieldDefinition>,
 *   labels: array<string, PublicActionLabels>,
 *   objectTypes: list<string>,
 *   published: bool,
 *   archivedAt?: int,
 *   executionRules?: list<PublicExecutionTranslationRule>,
 *   inputFieldDependencies?: list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency>,
 *   objectRequestOptions?: PublicObjectRequestOptions,
 *   outputFields?: list<OutputFieldDefinition>,
 * }
 */
final class ActionCreateParams implements BaseModel
{
    /** @use SdkModel<action_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api('actionUrl')]
    public string $actionURL;

    /** @var list<PublicActionFunction> $functions */
    #[Api(list: PublicActionFunction::class)]
    public array $functions;

    /** @var list<InputFieldDefinition> $inputFields */
    #[Api(list: InputFieldDefinition::class)]
    public array $inputFields;

    /** @var array<string, PublicActionLabels> $labels */
    #[Api(map: PublicActionLabels::class)]
    public array $labels;

    /** @var list<string> $objectTypes */
    #[Api(list: 'string')]
    public array $objectTypes;

    #[Api]
    public bool $published;

    #[Api(optional: true)]
    public ?int $archivedAt;

    /** @var list<PublicExecutionTranslationRule>|null $executionRules */
    #[Api(list: PublicExecutionTranslationRule::class, optional: true)]
    public ?array $executionRules;

    /**
     * @var list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency>|null $inputFieldDependencies
     */
    #[Api(list: InputFieldDependency::class, optional: true)]
    public ?array $inputFieldDependencies;

    #[Api(optional: true)]
    public ?PublicObjectRequestOptions $objectRequestOptions;

    /** @var list<OutputFieldDefinition>|null $outputFields */
    #[Api(list: OutputFieldDefinition::class, optional: true)]
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
     * @param list<PublicActionFunction> $functions
     * @param list<InputFieldDefinition> $inputFields
     * @param array<string, PublicActionLabels> $labels
     * @param list<string> $objectTypes
     * @param list<PublicExecutionTranslationRule> $executionRules
     * @param list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency> $inputFieldDependencies
     * @param list<OutputFieldDefinition> $outputFields
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
        ?PublicObjectRequestOptions $objectRequestOptions = null,
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
     * @param list<PublicActionFunction> $functions
     */
    public function withFunctions(array $functions): self
    {
        $obj = clone $this;
        $obj->functions = $functions;

        return $obj;
    }

    /**
     * @param list<InputFieldDefinition> $inputFields
     */
    public function withInputFields(array $inputFields): self
    {
        $obj = clone $this;
        $obj->inputFields = $inputFields;

        return $obj;
    }

    /**
     * @param array<string, PublicActionLabels> $labels
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
     * @param list<PublicExecutionTranslationRule> $executionRules
     */
    public function withExecutionRules(array $executionRules): self
    {
        $obj = clone $this;
        $obj->executionRules = $executionRules;

        return $obj;
    }

    /**
     * @param list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency> $inputFieldDependencies
     */
    public function withInputFieldDependencies(
        array $inputFieldDependencies
    ): self {
        $obj = clone $this;
        $obj->inputFieldDependencies = $inputFieldDependencies;

        return $obj;
    }

    public function withObjectRequestOptions(
        PublicObjectRequestOptions $objectRequestOptions
    ): self {
        $obj = clone $this;
        $obj->objectRequestOptions = $objectRequestOptions;

        return $obj;
    }

    /**
     * @param list<OutputFieldDefinition> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $obj = clone $this;
        $obj->outputFields = $outputFields;

        return $obj;
    }
}
