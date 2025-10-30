<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CollectionResponsePipelineNoPagingShape = array{
 *   results: list<Pipeline>
 * }
 */
final class CollectionResponsePipelineNoPaging implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CollectionResponsePipelineNoPagingShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Pipeline> $results */
    #[Api(list: Pipeline::class)]
    public array $results;

    /**
     * `new CollectionResponsePipelineNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePipelineNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePipelineNoPaging)->withResults(...)
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
     * @param list<Pipeline> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<Pipeline> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
