<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type cms_hubdb_batch_input_hub_db_table_row_batch_clone_request = array{
 *   inputs: list<CmsHubdbHubDBTableRowBatchCloneRequest>
 * }
 */
final class CmsHubdbBatchInputHubDBTableRowBatchCloneRequest implements BaseModel
{
    /** @use SdkModel<cms_hubdb_batch_input_hub_db_table_row_batch_clone_request> */
    use SdkModel;

    /** @var list<CmsHubdbHubDBTableRowBatchCloneRequest> $inputs */
    #[Api(list: CmsHubdbHubDBTableRowBatchCloneRequest::class)]
    public array $inputs;

    /**
     * `new CmsHubdbBatchInputHubDBTableRowBatchCloneRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsHubdbBatchInputHubDBTableRowBatchCloneRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsHubdbBatchInputHubDBTableRowBatchCloneRequest)->withInputs(...)
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
