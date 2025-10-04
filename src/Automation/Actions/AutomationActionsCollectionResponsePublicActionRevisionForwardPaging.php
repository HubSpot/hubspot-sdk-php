<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type automation_actions_collection_response_public_action_revision_forward_paging = array{
 *   results: list<AutomationActionsPublicActionRevision>, paging?: ForwardPaging
 * }
 */
final class AutomationActionsCollectionResponsePublicActionRevisionForwardPaging implements BaseModel, ResponseConverter
{
    /**
     * @use SdkModel<automation_actions_collection_response_public_action_revision_forward_paging>
     */
    use SdkModel;

    use SdkResponse;

    /** @var list<AutomationActionsPublicActionRevision> $results */
    #[Api(list: AutomationActionsPublicActionRevision::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new AutomationActionsCollectionResponsePublicActionRevisionForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsCollectionResponsePublicActionRevisionForwardPaging::with(
     *   results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsCollectionResponsePublicActionRevisionForwardPaging)
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
     * @param list<AutomationActionsPublicActionRevision> $results
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
     * @param list<AutomationActionsPublicActionRevision> $results
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
