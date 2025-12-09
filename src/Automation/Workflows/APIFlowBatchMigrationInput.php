<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationFlowIDCoordinate\Type;
use HubspotSDK\Automation\Workflows\APIFlowBatchMigrationInput\Input;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIFlowBatchMigrationInputShape = array{
 *   inputs: list<APIFlowBatchFetchMigrationFlowIDCoordinate|APIFlowBatchFetchMigrationWorkflowIDCoordinate>,
 * }
 */
final class APIFlowBatchMigrationInput implements BaseModel
{
    /** @use SdkModel<APIFlowBatchMigrationInputShape> */
    use SdkModel;

    /**
     * @var list<APIFlowBatchFetchMigrationFlowIDCoordinate|APIFlowBatchFetchMigrationWorkflowIDCoordinate> $inputs
     */
    #[Required(list: Input::class)]
    public array $inputs;

    /**
     * `new APIFlowBatchMigrationInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFlowBatchMigrationInput::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIFlowBatchMigrationInput)->withInputs(...)
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
     * @param list<APIFlowBatchFetchMigrationFlowIDCoordinate|array{
     *   flowMigrationStatuses: string, type: value-of<Type>
     * }|APIFlowBatchFetchMigrationWorkflowIDCoordinate|array{
     *   flowMigrationStatusForClassicWorkflows: string,
     *   type: value-of<APIFlowBatchFetchMigrationWorkflowIDCoordinate\Type>,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<APIFlowBatchFetchMigrationFlowIDCoordinate|array{
     *   flowMigrationStatuses: string, type: value-of<Type>
     * }|APIFlowBatchFetchMigrationWorkflowIDCoordinate|array{
     *   flowMigrationStatusForClassicWorkflows: string,
     *   type: value-of<APIFlowBatchFetchMigrationWorkflowIDCoordinate\Type>,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
