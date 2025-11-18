<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\PublicAssociation;

/**
 * This endpoint allows you to create multiple associations between specified 'from' and 'to' object types in a single batch request.
 *
 * @see HubspotSDK\Services\Crm\Associations\BatchService::create()
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   fromObjectType: string, inputs: list<PublicAssociation>
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /** @var list<PublicAssociation> $inputs */
    #[Api(list: PublicAssociation::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociation> $inputs
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
     * @param list<PublicAssociation> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
