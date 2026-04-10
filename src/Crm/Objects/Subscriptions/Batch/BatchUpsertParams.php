<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\Subscriptions\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert;

/**
 * This endpoint allows you to perform a batch upsert operation on subscription objects, which will either update existing records or create new ones if they do not already exist. The operation returns the status, timestamps, and a list of successfully processed objects.
 *
 * @see HubSpotSDK\Services\Crm\Objects\Subscriptions\BatchService::upsert()
 *
 * @phpstan-import-type SimplePublicObjectBatchInputUpsertShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert
 *
 * @phpstan-type BatchUpsertParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInputUpsert|SimplePublicObjectBatchInputUpsertShape>,
 * }
 */
final class BatchUpsertParams implements BaseModel
{
    /** @use SdkModel<BatchUpsertParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInputUpsert> $inputs */
    #[Required(list: SimplePublicObjectBatchInputUpsert::class)]
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
     * @param list<SimplePublicObjectBatchInputUpsert|SimplePublicObjectBatchInputUpsertShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectBatchInputUpsert|SimplePublicObjectBatchInputUpsertShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
