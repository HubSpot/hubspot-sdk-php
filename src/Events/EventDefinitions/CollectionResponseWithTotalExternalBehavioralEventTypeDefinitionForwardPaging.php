<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type collection_response_with_total_external_behavioral_event_type_definition_forward_paging = array{
 *   results: list<ExternalBehavioralEventTypeDefinition>,
 *   total: int,
 *   paging?: ForwardPaging,
 * }
 */
final class CollectionResponseWithTotalExternalBehavioralEventTypeDefinitionForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<collection_response_with_total_external_behavioral_event_type_definition_forward_paging>
     */
    use SdkModel;

    /** @var list<ExternalBehavioralEventTypeDefinition> $results */
    #[Api(list: ExternalBehavioralEventTypeDefinition::class)]
    public array $results;

    #[Api]
    public int $total;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalExternalBehavioralEventTypeDefinitionForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalExternalBehavioralEventTypeDefinitionForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalExternalBehavioralEventTypeDefinitionForwardPaging)
     *   ->withResults(...)
     *   ->withTotal(...)
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
     * @param list<ExternalBehavioralEventTypeDefinition> $results
     */
    public static function with(
        array $results,
        int $total,
        ?ForwardPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<ExternalBehavioralEventTypeDefinition> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }

    public function withPaging(ForwardPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
