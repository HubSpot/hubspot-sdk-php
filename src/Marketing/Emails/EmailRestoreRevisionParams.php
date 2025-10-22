<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Restores a previous revision of a marketing email. The current revision becomes old, and the restored revision is given a new version number.
 *
 * @see HubspotSDK\Marketing\Emails->restoreRevision
 *
 * @phpstan-type email_restore_revision_params = array{emailID: string}
 */
final class EmailRestoreRevisionParams implements BaseModel
{
    /** @use SdkModel<email_restore_revision_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $emailID;

    /**
     * `new EmailRestoreRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailRestoreRevisionParams::with(emailID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailRestoreRevisionParams)->withEmailID(...)
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
    public static function with(string $emailID): self
    {
        $obj = new self;

        $obj->emailID = $emailID;

        return $obj;
    }

    public function withEmailID(string $emailID): self
    {
        $obj = clone $this;
        $obj->emailID = $emailID;

        return $obj;
    }
}
