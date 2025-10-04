<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\AutomationActionsInputFieldDefinition\SupportedValueType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_actions_input_field_definition = array{
 *   isRequired: bool,
 *   typeDefinition: AutomationActionsFieldTypeDefinition,
 *   automationFieldType?: string,
 *   supportedValueTypes?: list<value-of<SupportedValueType>>,
 * }
 */
final class AutomationActionsInputFieldDefinition implements BaseModel
{
    /** @use SdkModel<automation_actions_input_field_definition> */
    use SdkModel;

    #[Api]
    public bool $isRequired;

    #[Api]
    public AutomationActionsFieldTypeDefinition $typeDefinition;

    #[Api(optional: true)]
    public ?string $automationFieldType;

    /** @var list<value-of<SupportedValueType>>|null $supportedValueTypes */
    #[Api(list: SupportedValueType::class, optional: true)]
    public ?array $supportedValueTypes;

    /**
     * `new AutomationActionsInputFieldDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsInputFieldDefinition::with(
     *   isRequired: ..., typeDefinition: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsInputFieldDefinition)
     *   ->withIsRequired(...)
     *   ->withTypeDefinition(...)
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
     * @param list<SupportedValueType|value-of<SupportedValueType>> $supportedValueTypes
     */
    public static function with(
        bool $isRequired,
        AutomationActionsFieldTypeDefinition $typeDefinition,
        ?string $automationFieldType = null,
        ?array $supportedValueTypes = null,
    ): self {
        $obj = new self;

        $obj->isRequired = $isRequired;
        $obj->typeDefinition = $typeDefinition;

        null !== $automationFieldType && $obj->automationFieldType = $automationFieldType;
        null !== $supportedValueTypes && $obj['supportedValueTypes'] = $supportedValueTypes;

        return $obj;
    }

    public function withIsRequired(bool $isRequired): self
    {
        $obj = clone $this;
        $obj->isRequired = $isRequired;

        return $obj;
    }

    public function withTypeDefinition(
        AutomationActionsFieldTypeDefinition $typeDefinition
    ): self {
        $obj = clone $this;
        $obj->typeDefinition = $typeDefinition;

        return $obj;
    }

    public function withAutomationFieldType(string $automationFieldType): self
    {
        $obj = clone $this;
        $obj->automationFieldType = $automationFieldType;

        return $obj;
    }

    /**
     * @param list<SupportedValueType|value-of<SupportedValueType>> $supportedValueTypes
     */
    public function withSupportedValueTypes(array $supportedValueTypes): self
    {
        $obj = clone $this;
        $obj['supportedValueTypes'] = $supportedValueTypes;

        return $obj;
    }
}
