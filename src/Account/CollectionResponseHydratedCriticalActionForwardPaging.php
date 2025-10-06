<?php

declare(strict_types=1);

namespace HubspotSDK\Account;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type collection_response_hydrated_critical_action_forward_paging = array{
 *   results: list<HydratedCriticalAction>, paging?: ForwardPaging
 * }
 */
final class CollectionResponseHydratedCriticalActionForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<collection_response_hydrated_critical_action_forward_paging>
     */
    use SdkModel;

    /** @var list<HydratedCriticalAction> $results */
    #[Api(list: HydratedCriticalAction::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseHydratedCriticalActionForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseHydratedCriticalActionForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseHydratedCriticalActionForwardPaging)->withResults(...)
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
     * @param list<HydratedCriticalAction> $results
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
     * @param list<HydratedCriticalAction> $results
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
