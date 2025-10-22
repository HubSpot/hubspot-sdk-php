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
 * @see HubspotSDK\Marketing\Emails->getRevisionByID
 *
 * @phpstan-type email_get_revision_by_id_params = array{emailID: string}
 */
final class EmailGetRevisionByIDParams implements BaseModel
{
    /** @use SdkModel<email_get_revision_by_id_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $emailID;

    /**
     * `new EmailGetRevisionByIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailGetRevisionByIDParams::with(emailID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailGetRevisionByIDParams)->withEmailID(...)
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
