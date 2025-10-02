<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type cms_hubdb_batch_input_hub_db_table_row_v3_batch_update_request = array{
 *   inputs: list<CmsHubdbHubDBTableRowV3BatchUpdateRequest>
 * }
 */
final class CmsHubdbBatchInputHubDBTableRowV3BatchUpdateRequest implements BaseModel
{
    /**
     * @use SdkModel<cms_hubdb_batch_input_hub_db_table_row_v3_batch_update_request>
     */
    use SdkModel;

    /** @var list<CmsHubdbHubDBTableRowV3BatchUpdateRequest> $inputs */
    #[Api(list: CmsHubdbHubDBTableRowV3BatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new CmsHubdbBatchInputHubDBTableRowV3BatchUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsHubdbBatchInputHubDBTableRowV3BatchUpdateRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsHubdbBatchInputHubDBTableRowV3BatchUpdateRequest)->withInputs(...)
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
