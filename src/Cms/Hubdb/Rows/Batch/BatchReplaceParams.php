<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows\Batch;

use HubspotSDK\Cms\Hubdb\CmsHubdbHubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BatchReplaceParams); // set properties as needed
 * $client->cms.hubdb.rows.batch->replace(...$params->toArray());
 * ```
 * Replace rows in batch in draft table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb.rows.batch->replace(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb\Rows\Batch->replace
 *
 * @phpstan-type batch_replace_params = array{
 *   inputs: list<CmsHubdbHubDBTableRowV3BatchUpdateRequest>
 * }
 */
final class BatchReplaceParams implements BaseModel
{
    /** @use SdkModel<batch_replace_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<CmsHubdbHubDBTableRowV3BatchUpdateRequest> $inputs */
    #[Api(list: CmsHubdbHubDBTableRowV3BatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new BatchReplaceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchReplaceParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchReplaceParams)->withInputs(...)
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
     * @param list<CmsHubdbHubDBTableRowV3BatchUpdateRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CmsHubdbHubDBTableRowV3BatchUpdateRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
