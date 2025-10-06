<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type hub_db_table_row_batch_clone_request = array{
 *   id: string, name?: string
 * }
 */
final class HubDBTableRowBatchCloneRequest implements BaseModel
{
    /** @use SdkModel<hub_db_table_row_batch_clone_request> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new HubDBTableRowBatchCloneRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableRowBatchCloneRequest::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableRowBatchCloneRequest)->withID(...)
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
     */
    public static function with(string $id, ?string $name = null): self
    {
        $obj = new self;

        $obj->id = $id;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
