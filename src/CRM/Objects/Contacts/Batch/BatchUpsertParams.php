<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Contacts\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\SimplePublicObjectBatchInputUpsert;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BatchUpsertParams); // set properties as needed
 * $client->crm.objects.contacts.batch->upsert(...$params->toArray());
 * ```
 * Create or update a batch of contacts.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.contacts.batch->upsert(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Contacts\Batch->upsert
 *
 * @phpstan-type batch_upsert_params = array{
 *   inputs: list<SimplePublicObjectBatchInputUpsert>
 * }
 */
final class BatchUpsertParams implements BaseModel
{
    /** @use SdkModel<batch_upsert_params> */
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
