<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type automation_actions_collection_response_public_action_definition_forward_paging = array{
 *   results: list<AutomationActionsPublicActionDefinition>, paging?: ForwardPaging
 * }
 */
final class AutomationActionsCollectionResponsePublicActionDefinitionForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<automation_actions_collection_response_public_action_definition_forward_paging>
     */
    use SdkModel;

    /** @var list<AutomationActionsPublicActionDefinition> $results */
    #[Api(list: AutomationActionsPublicActionDefinition::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new AutomationActionsCollectionResponsePublicActionDefinitionForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsCollectionResponsePublicActionDefinitionForwardPaging::with(
     *   results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsCollectionResponsePublicActionDefinitionForwardPaging)
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
     * @param list<AutomationActionsPublicActionDefinition> $results
     */
    public static function with(
        array $results,
        ?ForwardPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<AutomationActionsPublicActionDefinition> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(ForwardPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
