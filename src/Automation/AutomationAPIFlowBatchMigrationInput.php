<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIFlowBatchMigrationInput\Input;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_flow_batch_migration_input = array{
 *   inputs: list<AutomationAPIFlowBatchFetchMigrationFlowIDCoordinate|AutomationAPIFlowBatchFetchMigrationWorkflowIDCoordinate>,
 * }
 */
final class AutomationAPIFlowBatchMigrationInput implements BaseModel
{
    /** @use SdkModel<automation_api_flow_batch_migration_input> */
    use SdkModel;

    /**
     * @var list<AutomationAPIFlowBatchFetchMigrationFlowIDCoordinate|AutomationAPIFlowBatchFetchMigrationWorkflowIDCoordinate> $inputs
     */
    #[Api(list: Input::class)]
    public array $inputs;

    /**
     * `new AutomationAPIFlowBatchMigrationInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIFlowBatchMigrationInput::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIFlowBatchMigrationInput)->withInputs(...)
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
     * @param list<AutomationAPIFlowBatchFetchMigrationFlowIDCoordinate|AutomationAPIFlowBatchFetchMigrationWorkflowIDCoordinate> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<AutomationAPIFlowBatchFetchMigrationFlowIDCoordinate|AutomationAPIFlowBatchFetchMigrationWorkflowIDCoordinate> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
