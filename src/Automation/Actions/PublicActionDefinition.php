<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionDefinition\InputFieldDependency;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_action_definition = array{
 *   id: string,
 *   actionURL: string,
 *   functions: list<PublicActionFunctionIdentifier>,
 *   inputFields: list<InputFieldDefinition>,
 *   labels: array<string, PublicActionLabels>,
 *   objectTypes: list<string>,
 *   published: bool,
 *   revisionID: string,
 *   archivedAt?: int,
 *   executionRules?: list<PublicExecutionTranslationRule>,
 *   inputFieldDependencies?: list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency>,
 *   objectRequestOptions?: PublicObjectRequestOptions,
 *   outputFields?: list<OutputFieldDefinition>,
 * }
 */
final class PublicActionDefinition implements BaseModel
{
    /** @use SdkModel<public_action_definition> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api('actionUrl')]
    public string $actionURL;

    /** @var list<PublicActionFunctionIdentifier> $functions */
    #[Api(list: PublicActionFunctionIdentifier::class)]
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

    #[Api('revisionId')]
    public string $revisionID;

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
     * `new PublicActionDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicActionDefinition::with(
     *   id: ...,
     *   actionURL: ...,
     *   functions: ...,
     *   inputFields: ...,
     *   labels: ...,
     *   objectTypes: ...,
     *   published: ...,
     *   revisionID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicActionDefinition)
     *   ->withID(...)
     *   ->withActionURL(...)
     *   ->withFunctions(...)
     *   ->withInputFields(...)
     *   ->withLabels(...)
     *   ->withObjectTypes(...)
     *   ->withPublished(...)
     *   ->withRevisionID(...)
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
     * @param list<PublicActionFunctionIdentifier> $functions
     * @param list<InputFieldDefinition> $inputFields
     * @param array<string, PublicActionLabels> $labels
     * @param list<string> $objectTypes
     * @param list<PublicExecutionTranslationRule> $executionRules
     * @param list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency> $inputFieldDependencies
     * @param list<OutputFieldDefinition> $outputFields
     */
    public static function with(
        string $id,
        string $actionURL,
        array $functions,
        array $inputFields,
        array $labels,
        array $objectTypes,
        bool $published,
        string $revisionID,
        ?int $archivedAt = null,
        ?array $executionRules = null,
        ?array $inputFieldDependencies = null,
        ?PublicObjectRequestOptions $objectRequestOptions = null,
        ?array $outputFields = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->actionURL = $actionURL;
        $obj->functions = $functions;
        $obj->inputFields = $inputFields;
        $obj->labels = $labels;
        $obj->objectTypes = $objectTypes;
        $obj->published = $published;
        $obj->revisionID = $revisionID;

        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $executionRules && $obj->executionRules = $executionRules;
        null !== $inputFieldDependencies && $obj->inputFieldDependencies = $inputFieldDependencies;
        null !== $objectRequestOptions && $obj->objectRequestOptions = $objectRequestOptions;
        null !== $outputFields && $obj->outputFields = $outputFields;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withActionURL(string $actionURL): self
    {
        $obj = clone $this;
        $obj->actionURL = $actionURL;

        return $obj;
    }

    /**
     * @param list<PublicActionFunctionIdentifier> $functions
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

    public function withRevisionID(string $revisionID): self
    {
        $obj = clone $this;
        $obj->revisionID = $revisionID;

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
