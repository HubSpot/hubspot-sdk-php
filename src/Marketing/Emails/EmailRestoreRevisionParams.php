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
 * @see HubspotSDK\Services\Marketing\EmailsService::restoreRevision()
 *
 * @phpstan-type EmailRestoreRevisionParamsShape = array{emailId: string}
 */
final class EmailRestoreRevisionParams implements BaseModel
{
    /** @use SdkModel<EmailRestoreRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $emailId;

    /**
     * `new EmailRestoreRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailRestoreRevisionParams::with(emailId: ...)
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
    public static function with(string $emailId): self
    {
        $obj = new self;

        $obj->emailId = $emailId;

        return $obj;
    }

    public function withEmailID(string $emailID): self
    {
        $obj = clone $this;
        $obj->emailId = $emailID;

        return $obj;
    }
}
