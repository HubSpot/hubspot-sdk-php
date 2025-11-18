<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\SimplePublicObjectBatchInputUpsert;

/**
 * Upsert a batch of CRM objects, creating new records or updating existing ones based on their internal IDs or unique property values.
 *
 * @see HubspotSDK\Services\Crm\Associations\V4\BatchService::upsert()
 *
 * @phpstan-type BatchUpsertParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInputUpsert>
 * }
 */
final class BatchUpsertParams implements BaseModel
{
    /** @use SdkModel<BatchUpsertParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInputUpsert> $inputs */
    #[Api(list: SimplePublicObjectBatchInputUpsert::class)]
    public array $inputs;

    /**
     * `new BatchUpsertParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchUpsertParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchUpsertParams)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInputUpsert> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectBatchInputUpsert> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
