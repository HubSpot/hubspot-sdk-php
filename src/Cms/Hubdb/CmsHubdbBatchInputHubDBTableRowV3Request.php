<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type cms_hubdb_batch_input_hub_db_table_row_v3_request = array{
 *   inputs: list<CmsHubdbHubDBTableRowV3Request>
 * }
 */
final class CmsHubdbBatchInputHubDBTableRowV3Request implements BaseModel
{
    /** @use SdkModel<cms_hubdb_batch_input_hub_db_table_row_v3_request> */
    use SdkModel;

    /** @var list<CmsHubdbHubDBTableRowV3Request> $inputs */
    #[Api(list: CmsHubdbHubDBTableRowV3Request::class)]
    public array $inputs;

    /**
     * `new CmsHubdbBatchInputHubDBTableRowV3Request()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsHubdbBatchInputHubDBTableRowV3Request::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsHubdbBatchInputHubDBTableRowV3Request)->withInputs(...)
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
     * @param list<CmsHubdbHubDBTableRowV3Request> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CmsHubdbHubDBTableRowV3Request> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
