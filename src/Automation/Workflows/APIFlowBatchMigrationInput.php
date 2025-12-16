<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIFlowBatchMigrationInput\Input;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InputShape from \HubspotSDK\Automation\Workflows\APIFlowBatchMigrationInput\Input
 *
 * @phpstan-type APIFlowBatchMigrationInputShape = array{inputs: list<InputShape>}
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
     * @param list<InputShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<InputShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
