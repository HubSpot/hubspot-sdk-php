<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Definitions;

use HubspotSDK\Automation\Actions\Definitions\DefinitionUpdateParams\InputFieldDependency;
use HubspotSDK\Automation\Actions\InputFieldDefinition;
use HubspotSDK\Automation\Actions\OutputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Automation\Actions\PublicConditionalSingleFieldDependency;
use HubspotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubspotSDK\Automation\Actions\PublicSingleFieldDependency;
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
 * @phpstan-import-type PublicExecutionTranslationRuleShape from \HubspotSDK\Automation\Actions\PublicExecutionTranslationRule
 * @phpstan-import-type InputFieldDependencyShape from \HubspotSDK\Automation\Actions\Definitions\DefinitionUpdateParams\InputFieldDependency
 * @phpstan-import-type InputFieldDefinitionShape from \HubspotSDK\Automation\Actions\InputFieldDefinition
 * @phpstan-import-type PublicActionLabelsShape from \HubspotSDK\Automation\Actions\PublicActionLabels
 * @phpstan-import-type PublicObjectRequestOptionsShape from \HubspotSDK\Automation\Actions\PublicObjectRequestOptions
 * @phpstan-import-type OutputFieldDefinitionShape from \HubspotSDK\Automation\Actions\OutputFieldDefinition
 *
 * @phpstan-type DefinitionUpdateParamsShape = array{
 *   appID: int,
 *   actionURL?: string|null,
 *   executionRules?: list<PublicExecutionTranslationRuleShape>|null,
 *   inputFieldDependencies?: list<InputFieldDependencyShape>|null,
 *   inputFields?: list<InputFieldDefinitionShape>|null,
 *   labels?: array<string,PublicActionLabelsShape>|null,
 *   objectRequestOptions?: PublicObjectRequestOptionsShape|null,
 *   objectTypes?: list<string>|null,
 *   outputFields?: list<OutputFieldDefinitionShape>|null,
 *   published?: bool|null,
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
     * @param list<PublicExecutionTranslationRuleShape> $executionRules
     * @param list<InputFieldDependencyShape> $inputFieldDependencies
     * @param list<InputFieldDefinitionShape> $inputFields
     * @param array<string,PublicActionLabelsShape> $labels
     * @param PublicObjectRequestOptionsShape $objectRequestOptions
     * @param list<string> $objectTypes
     * @param list<OutputFieldDefinitionShape> $outputFields
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
        $self = new self;

        $self['appID'] = $appID;

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

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withActionURL(string $actionURL): self
    {
        $self = clone $this;
        $self['actionURL'] = $actionURL;

        return $self;
    }

    /**
     * @param list<PublicExecutionTranslationRuleShape> $executionRules
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
     * @param list<InputFieldDefinitionShape> $inputFields
     */
    public function withInputFields(array $inputFields): self
    {
        $self = clone $this;
        $self['inputFields'] = $inputFields;

        return $self;
    }

    /**
     * @param array<string,PublicActionLabelsShape> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    /**
     * @param PublicObjectRequestOptionsShape $objectRequestOptions
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
     * @param list<OutputFieldDefinitionShape> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $self = clone $this;
        $self['outputFields'] = $outputFields;

        return $self;
    }

    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }
}
