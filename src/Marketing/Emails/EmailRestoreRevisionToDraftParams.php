<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Restores a previous revision of a marketing email to DRAFT state. If there is currently something in the draft for that object, it is overwritten.
 *
 * @see HubspotSDK\Marketing\Emails->restoreRevisionToDraft
 *
 * @phpstan-type email_restore_revision_to_draft_params = array{emailID: string}
 */
final class EmailRestoreRevisionToDraftParams implements BaseModel
{
    /** @use SdkModel<email_restore_revision_to_draft_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $emailID;

    /**
     * `new EmailRestoreRevisionToDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailRestoreRevisionToDraftParams::with(emailID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailRestoreRevisionToDraftParams)->withEmailID(...)
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
