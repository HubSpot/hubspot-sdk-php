<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get a specific revision of a marketing email.
 *
 * @see HubspotSDK\Services\Marketing\EmailsService::getRevision()
 *
 * @phpstan-type EmailGetRevisionParamsShape = array{emailId: string}
 */
final class EmailGetRevisionParams implements BaseModel
{
    /** @use SdkModel<EmailGetRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $emailId;

    /**
     * `new EmailGetRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailGetRevisionParams::with(emailId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailGetRevisionParams)->withEmailID(...)
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

        $obj['emailId'] = $emailId;

        return $obj;
    }

    public function withEmailID(string $emailID): self
    {
        $obj = clone $this;
        $obj['emailId'] = $emailID;

        return $obj;
    }
}
