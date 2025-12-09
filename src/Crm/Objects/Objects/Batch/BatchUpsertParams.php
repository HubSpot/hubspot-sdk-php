<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Objects\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\SimplePublicObjectBatchInputUpsert;

/**
 * Create or update records identified by a unique property value as specified by the `idProperty` query param. `idProperty` query param refers to a property whose values are unique for the object.
 *
 * @see HubspotSDK\Services\Crm\Objects\Objects\BatchService::upsert()
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
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
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
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
