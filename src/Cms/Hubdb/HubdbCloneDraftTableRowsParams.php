<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new HubdbCloneDraftTableRowsParams); // set properties as needed
 * $client->cms.hubdb->cloneDraftTableRows(...$params->toArray());
 * ```
 * Clone rows in batch.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->cloneDraftTableRows(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->cloneDraftTableRows
 *
 * @phpstan-type hubdb_clone_draft_table_rows_params = array{
 *   inputs: list<CmsHubdbHubDBTableRowBatchCloneRequest>
 * }
 */
final class HubdbCloneDraftTableRowsParams implements BaseModel
{
    /** @use SdkModel<hubdb_clone_draft_table_rows_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<CmsHubdbHubDBTableRowBatchCloneRequest> $inputs */
    #[Api(list: CmsHubdbHubDBTableRowBatchCloneRequest::class)]
    public array $inputs;

    /**
     * `new HubdbCloneDraftTableRowsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbCloneDraftTableRowsParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbCloneDraftTableRowsParams)->withInputs(...)
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
     * @param list<CmsHubdbHubDBTableRowBatchCloneRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CmsHubdbHubDBTableRowBatchCloneRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
