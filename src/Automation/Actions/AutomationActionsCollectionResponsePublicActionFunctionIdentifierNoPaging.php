<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_actions_collection_response_public_action_function_identifier_no_paging = array{
 *   results: list<AutomationActionsPublicActionFunctionIdentifier>
 * }
 */
final class AutomationActionsCollectionResponsePublicActionFunctionIdentifierNoPaging implements BaseModel
{
    /**
     * @use SdkModel<automation_actions_collection_response_public_action_function_identifier_no_paging>
     */
    use SdkModel;

    /** @var list<AutomationActionsPublicActionFunctionIdentifier> $results */
    #[Api(list: AutomationActionsPublicActionFunctionIdentifier::class)]
    public array $results;

    /**
     * `new AutomationActionsCollectionResponsePublicActionFunctionIdentifierNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsCollectionResponsePublicActionFunctionIdentifierNoPaging::with(
     *   results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsCollectionResponsePublicActionFunctionIdentifierNoPaging)
     *   ->withResults(...)
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
     * @param list<AutomationActionsPublicActionFunctionIdentifier> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<AutomationActionsPublicActionFunctionIdentifier> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
