<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Associations\V4\PublicFetchAssociationsBatchRequest;

/**
 * Batch read associations for objects to specific object type. The 'after' field in a returned paging object  can be added alongside the 'id' to retrieve the next page of associations from that objectId. The 'link' field is deprecated and should be ignored. Note: The 'paging' field will only be present if there are more pages and absent otherwise.
 *
 * @see HubspotSDK\CRM\Associations\V4\Batch->batchRead
 *
 * @phpstan-type BatchBatchReadParamsShape = array{
 *   fromObjectType: string, inputs: list<PublicFetchAssociationsBatchRequest>
 * }
 */
final class BatchBatchReadParams implements BaseModel
{
    /** @use SdkModel<BatchBatchReadParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /** @var list<PublicFetchAssociationsBatchRequest> $inputs */
    #[Api(list: PublicFetchAssociationsBatchRequest::class)]
    public array $inputs;

    /**
     * `new BatchBatchReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchBatchReadParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchBatchReadParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicFetchAssociationsBatchRequest> $inputs
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
     * @param list<PublicFetchAssociationsBatchRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
