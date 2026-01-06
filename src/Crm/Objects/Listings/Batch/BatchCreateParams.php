<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Listings\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\PublicAssociationsForObject;
use HubspotSDK\Crm\SimplePublicObjectBatchInputForCreate;

/**
 * Create multiple listings in a single request.
 *
 * @see HubspotSDK\Services\Crm\Objects\Listings\BatchService::create()
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInputForCreate|array{
 *     associations: list<PublicAssociationsForObject>,
 *     properties: array<string,string>,
 *     objectWriteTraceID?: string|null,
 *   }>,
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInputForCreate> $inputs */
    #[Required(list: SimplePublicObjectBatchInputForCreate::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInputForCreate|array{
     *   associations: list<PublicAssociationsForObject>,
     *   properties: array<string,string>,
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
     * @param list<SimplePublicObjectBatchInputForCreate|array{
     *   associations: list<PublicAssociationsForObject>,
     *   properties: array<string,string>,
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
