<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Associations\V4\PublicAssociationMultiArchive;

/**
 * Batch delete associations for objects.
 *
 * @see HubspotSDK\CRM\Associations\V4\Batch->batchDelete
 *
 * @phpstan-type batch_batch_delete_params = array{
 *   fromObjectType: string, inputs: list<PublicAssociationMultiArchive>
 * }
 */
final class BatchBatchDeleteParams implements BaseModel
{
    /** @use SdkModel<batch_batch_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /** @var list<PublicAssociationMultiArchive> $inputs */
    #[Api(list: PublicAssociationMultiArchive::class)]
    public array $inputs;

    /**
     * `new BatchBatchDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchBatchDeleteParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchBatchDeleteParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationMultiArchive> $inputs
     */
    public static function with(string $fromObjectType, array $inputs): self
    {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    /**
     * @param list<PublicAssociationMultiArchive> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
