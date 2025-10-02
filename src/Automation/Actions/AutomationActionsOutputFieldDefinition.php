<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_actions_output_field_definition = array{
 *   typeDefinition: AutomationActionsFieldTypeDefinition
 * }
 */
final class AutomationActionsOutputFieldDefinition implements BaseModel
{
    /** @use SdkModel<automation_actions_output_field_definition> */
    use SdkModel;

    #[Api]
    public AutomationActionsFieldTypeDefinition $typeDefinition;

    /**
     * `new AutomationActionsOutputFieldDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsOutputFieldDefinition::with(typeDefinition: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsOutputFieldDefinition)->withTypeDefinition(...)
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
     */
    public static function with(
        AutomationActionsFieldTypeDefinition $typeDefinition
    ): self {
        $obj = new self;

        $obj->typeDefinition = $typeDefinition;

        return $obj;
    }

    public function withTypeDefinition(
        AutomationActionsFieldTypeDefinition $typeDefinition
    ): self {
        $obj = clone $this;
        $obj->typeDefinition = $typeDefinition;

        return $obj;
    }
}
