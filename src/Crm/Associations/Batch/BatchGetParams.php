<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * This endpoint allows you to retrieve multiple associations between specified 'from' and 'to' object types in a single batch request.
 *
 * @see HubspotSDK\Services\Crm\Associations\BatchService::get()
 *
 * @phpstan-type BatchGetParamsShape = array{
 *   fromObjectType: string, inputs: list<PublicObjectID>
 * }
 */
final class BatchGetParams implements BaseModel
{
    /** @use SdkModel<BatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /** @var list<PublicObjectID> $inputs */
    #[Api(list: PublicObjectID::class)]
    public array $inputs;

    /**
     * `new BatchGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchGetParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchGetParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicObjectID> $inputs
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
     * @param list<PublicObjectID> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
