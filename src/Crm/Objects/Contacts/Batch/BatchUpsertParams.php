<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Contacts\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\SimplePublicObjectBatchInputUpsert;

/**
 * Upsert a batch of contacts. The `inputs` array can contain a `properties` object to define property values for each record.
 *
 * @see HubspotSDK\Services\Crm\Objects\Contacts\BatchService::upsert()
 *
 * @phpstan-type BatchUpsertParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInputUpsert|array{
 *     id: string,
 *     properties: array<string,string>,
 *     idProperty?: string|null,
 *     objectWriteTraceID?: string|null,
 *   }>,
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
     * @param list<SimplePublicObjectBatchInputUpsert|array{
     *   id: string,
     *   properties: array<string,string>,
     *   idProperty?: string|null,
     *   objectWriteTraceID?: string|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectBatchInputUpsert|array{
     *   id: string,
     *   properties: array<string,string>,
     *   idProperty?: string|null,
     *   objectWriteTraceID?: string|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
