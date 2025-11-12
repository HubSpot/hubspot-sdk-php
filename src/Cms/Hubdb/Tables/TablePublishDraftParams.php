<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Publishes the table by copying the data and table schema changes from draft version to the published version, meaning any website pages using data from the table will be updated.
 *
 * @see HubspotSDK\Cms\Hubdb\Tables->publishDraft
 *
 * @phpstan-type TablePublishDraftParamsShape = array{includeForeignIds?: bool}
 */
final class TablePublishDraftParams implements BaseModel
{
    /** @use SdkModel<TablePublishDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set this to `true` to populate foreign ID values in the response.
     */
    #[Api(optional: true)]
    public ?bool $includeForeignIds;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $includeForeignIds = null): self
    {
        $obj = new self;

        null !== $includeForeignIds && $obj->includeForeignIds = $includeForeignIds;

        return $obj;
    }

    /**
     * Set this to `true` to populate foreign ID values in the response.
     */
    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $obj = clone $this;
        $obj->includeForeignIds = $includeForeignIDs;

        return $obj;
    }
}
