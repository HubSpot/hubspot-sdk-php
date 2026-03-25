<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Marketing\EmailsService::getRevision()
 *
 * @phpstan-type EmailGetRevisionParamsShape = array{emailID: string}
 */
final class EmailGetRevisionParams implements BaseModel
{
    /** @use SdkModel<EmailGetRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $emailID;

    /**
     * `new EmailGetRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailGetRevisionParams::with(emailID: ...)
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
    public static function with(string $emailID): self
    {
        $self = new self;

        $self['emailID'] = $emailID;

        return $self;
    }

    public function withEmailID(string $emailID): self
    {
        $self = clone $this;
        $self['emailID'] = $emailID;

        return $self;
    }
}
