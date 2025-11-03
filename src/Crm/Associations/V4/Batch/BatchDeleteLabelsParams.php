<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\V4\PublicAssociationMultiPost;

/**
 * Batch delete specific association labels for objects. Deleting an unlabeled association will also delete all labeled associations between those two objects.
 *
 * @see HubspotSDK\Crm\Associations\V4\Batch->deleteLabels
 *
 * @phpstan-type BatchDeleteLabelsParamsShape = array{
 *   fromObjectType: string, inputs: list<PublicAssociationMultiPost>
 * }
 */
final class BatchDeleteLabelsParams implements BaseModel
{
    /** @use SdkModel<BatchDeleteLabelsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /** @var list<PublicAssociationMultiPost> $inputs */
    #[Api(list: PublicAssociationMultiPost::class)]
    public array $inputs;

    /**
     * `new BatchDeleteLabelsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchDeleteLabelsParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchDeleteLabelsParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationMultiPost> $inputs
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
     * @param list<PublicAssociationMultiPost> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
