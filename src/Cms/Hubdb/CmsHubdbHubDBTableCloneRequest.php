<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type cms_hubdb_hub_db_table_clone_request = array{
 *   copyRows: bool, isHubspotDefined: bool, newLabel?: string, newName?: string
 * }
 */
final class CmsHubdbHubDBTableCloneRequest implements BaseModel
{
    /** @use SdkModel<cms_hubdb_hub_db_table_clone_request> */
    use SdkModel;

    #[Api]
    public bool $copyRows;

    #[Api]
    public bool $isHubspotDefined;

    #[Api(optional: true)]
    public ?string $newLabel;

    #[Api(optional: true)]
    public ?string $newName;

    /**
     * `new CmsHubdbHubDBTableCloneRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsHubdbHubDBTableCloneRequest::with(copyRows: ..., isHubspotDefined: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsHubdbHubDBTableCloneRequest)
     *   ->withCopyRows(...)
     *   ->withIsHubspotDefined(...)
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
    public static function with(
        bool $copyRows,
        bool $isHubspotDefined,
        ?string $newLabel = null,
        ?string $newName = null,
    ): self {
        $obj = new self;

        $obj->copyRows = $copyRows;
        $obj->isHubspotDefined = $isHubspotDefined;

        null !== $newLabel && $obj->newLabel = $newLabel;
        null !== $newName && $obj->newName = $newName;

        return $obj;
    }

    public function withCopyRows(bool $copyRows): self
    {
        $obj = clone $this;
        $obj->copyRows = $copyRows;

        return $obj;
    }

    public function withIsHubspotDefined(bool $isHubspotDefined): self
    {
        $obj = clone $this;
        $obj->isHubspotDefined = $isHubspotDefined;

        return $obj;
    }

    public function withNewLabel(string $newLabel): self
    {
        $obj = clone $this;
        $obj->newLabel = $newLabel;

        return $obj;
    }

    public function withNewName(string $newName): self
    {
        $obj = clone $this;
        $obj->newName = $newName;

        return $obj;
    }
}
