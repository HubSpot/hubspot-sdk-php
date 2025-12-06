<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Pipelines\PipelineStage\WritePermissions;

/**
 * @phpstan-type CollectionResponsePipelineStageNoPagingShape = array{
 *   results: list<PipelineStage>
 * }
 */
final class CollectionResponsePipelineStageNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePipelineStageNoPagingShape> */
    use SdkModel;

    /** @var list<PipelineStage> $results */
    #[Api(list: PipelineStage::class)]
    public array $results;

    /**
     * `new CollectionResponsePipelineStageNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePipelineStageNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePipelineStageNoPaging)->withResults(...)
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
     * @param list<PipelineStage|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   displayOrder: int,
     *   label: string,
     *   metadata: array<string,string>,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   writePermissions?: value-of<WritePermissions>|null,
     * }> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<PipelineStage|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   displayOrder: int,
     *   label: string,
     *   metadata: array<string,string>,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   writePermissions?: value-of<WritePermissions>|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
