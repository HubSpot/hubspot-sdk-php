<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionDefinitionPatch\InputFieldDependency;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicActionDefinitionPatchShape = array{
 *   actionUrl?: string|null,
 *   executionRules?: list<PublicExecutionTranslationRule>|null,
 *   inputFieldDependencies?: list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency>|null,
 *   inputFields?: list<InputFieldDefinition>|null,
 *   labels?: array<string,PublicActionLabels>|null,
 *   objectRequestOptions?: PublicObjectRequestOptions|null,
 *   objectTypes?: list<string>|null,
 *   outputFields?: list<OutputFieldDefinition>|null,
 *   published?: bool|null,
 * }
 */
final class PublicActionDefinitionPatch implements BaseModel
{
    /** @use SdkModel<PublicActionDefinitionPatchShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $actionUrl;

    /** @var list<PublicExecutionTranslationRule>|null $executionRules */
    #[Api(list: PublicExecutionTranslationRule::class, optional: true)]
    public ?array $executionRules;

    /**
     * @var list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency>|null $inputFieldDependencies
     */
    #[Api(list: InputFieldDependency::class, optional: true)]
    public ?array $inputFieldDependencies;

    /** @var list<InputFieldDefinition>|null $inputFields */
    #[Api(list: InputFieldDefinition::class, optional: true)]
    public ?array $inputFields;

    /** @var array<string,PublicActionLabels>|null $labels */
    #[Api(map: PublicActionLabels::class, optional: true)]
    public ?array $labels;

    #[Api(optional: true)]
    public ?PublicObjectRequestOptions $objectRequestOptions;

    /** @var list<string>|null $objectTypes */
    #[Api(list: 'string', optional: true)]
    public ?array $objectTypes;

    /** @var list<OutputFieldDefinition>|null $outputFields */
    #[Api(list: OutputFieldDefinition::class, optional: true)]
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
     * @param list<PublicExecutionTranslationRule> $executionRules
     * @param list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency> $inputFieldDependencies
     * @param list<InputFieldDefinition> $inputFields
     * @param array<string,PublicActionLabels> $labels
     * @param list<string> $objectTypes
     * @param list<OutputFieldDefinition> $outputFields
     */
    public static function with(
        ?string $actionUrl = null,
        ?array $executionRules = null,
        ?array $inputFieldDependencies = null,
        ?array $inputFields = null,
        ?array $labels = null,
        ?PublicObjectRequestOptions $objectRequestOptions = null,
        ?array $objectTypes = null,
        ?array $outputFields = null,
        ?bool $published = null,
    ): self {
        $obj = new self;

        null !== $actionUrl && $obj->actionUrl = $actionUrl;
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
        $obj->actionUrl = $actionURL;

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
     * @param array<string,PublicActionLabels> $labels
     */
    public function withLabels(array $labels): self
    {
        $obj = clone $this;
        $obj->labels = $labels;

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
     * @param list<string> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $obj = clone $this;
        $obj->objectTypes = $objectTypes;

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

    public function withPublished(bool $published): self
    {
        $obj = clone $this;
        $obj->published = $published;

        return $obj;
    }
}
