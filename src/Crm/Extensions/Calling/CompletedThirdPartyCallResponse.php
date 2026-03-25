<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse\CallerIDMatch;

/**
 * @phpstan-import-type CallerIDMatchVariants from \HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse\CallerIDMatch
 * @phpstan-import-type CallerIDMatchShape from \HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse\CallerIDMatch
 *
 * @phpstan-type CompletedThirdPartyCallResponseShape = array{
 *   callerIDMatches: list<CallerIDMatchShape>
 * }
 */
final class CompletedThirdPartyCallResponse implements BaseModel
{
    /** @use SdkModel<CompletedThirdPartyCallResponseShape> */
    use SdkModel;

    /** @var list<CallerIDMatchVariants> $callerIDMatches */
    #[Required('callerIdMatches', list: CallerIDMatch::class)]
    public array $callerIDMatches;

    /**
     * `new CompletedThirdPartyCallResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompletedThirdPartyCallResponse::with(callerIDMatches: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompletedThirdPartyCallResponse)->withCallerIDMatches(...)
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
     *
     * @param list<CallerIDMatchShape> $callerIDMatches
     */
    public static function with(array $callerIDMatches): self
    {
        $self = new self;

        $self['callerIDMatches'] = $callerIDMatches;

        return $self;
    }

    /**
     * @param list<CallerIDMatchShape> $callerIDMatches
     */
    public function withCallerIDMatches(array $callerIDMatches): self
    {
        $self = clone $this;
        $self['callerIDMatches'] = $callerIDMatches;

        return $self;
    }
}
