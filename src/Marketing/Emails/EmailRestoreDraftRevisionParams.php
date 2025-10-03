<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new EmailRestoreDraftRevisionParams); // set properties as needed
 * $client->marketing.emails->restoreDraftRevision(...$params->toArray());
 * ```
 * Restore a revision of a marketing email to DRAFT state.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.emails->restoreDraftRevision(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Emails->restoreDraftRevision
 *
 * @phpstan-type email_restore_draft_revision_params = array{emailID: string}
 */
final class EmailRestoreDraftRevisionParams implements BaseModel
{
    /** @use SdkModel<email_restore_draft_revision_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $emailID;

    /**
     * `new EmailRestoreDraftRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailRestoreDraftRevisionParams::with(emailID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailRestoreDraftRevisionParams)->withEmailID(...)
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
