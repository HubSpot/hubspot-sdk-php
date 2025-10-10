<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows\Draft\Batch;

use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BatchReplaceBatchParams); // set properties as needed
 * $client->cms.hubdb.rows.draft.batch->replaceBatch(...$params->toArray());
 * ```
 * Replace rows in batch in draft table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb.rows.draft.batch->replaceBatch(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb\Rows\Draft\Batch->replaceBatch
 *
 * @phpstan-type batch_replace_batch_params = array{
 *   inputs: list<HubDBTableRowV3BatchUpdateRequest>
 * }
 */
final class BatchReplaceBatchParams implements BaseModel
{
    /** @use SdkModel<batch_replace_batch_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<HubDBTableRowV3BatchUpdateRequest> $inputs */
    #[Api(list: HubDBTableRowV3BatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new BatchReplaceBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchReplaceBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchReplaceBatchParams)->withInputs(...)
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
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
