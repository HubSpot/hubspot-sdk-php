<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Account\Activity\PortalInformationResponse\AccountType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortalInformationResponseShape = array{
 *   accountType: AccountType|value-of<AccountType>,
 *   additionalCurrencies: list<string>,
 *   companyCurrency: string,
 *   dataHostingLocation: string,
 *   portalID: int,
 *   timeZone: string,
 *   uiDomain: string,
 *   utcOffset: string,
 *   utcOffsetMilliseconds: int,
 * }
 */
final class PortalInformationResponse implements BaseModel
{
    /** @use SdkModel<PortalInformationResponseShape> */
    use SdkModel;

    /** @var value-of<AccountType> $accountType */
    #[Required(enum: AccountType::class)]
    public string $accountType;

    /** @var list<string> $additionalCurrencies */
    #[Required(list: 'string')]
    public array $additionalCurrencies;

    #[Required]
    public string $companyCurrency;

    #[Required]
    public string $dataHostingLocation;

    #[Required('portalId')]
    public int $portalID;

    #[Required]
    public string $timeZone;

    #[Required]
    public string $uiDomain;

    #[Required]
    public string $utcOffset;

    #[Required]
    public int $utcOffsetMilliseconds;

    /**
     * `new PortalInformationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalInformationResponse::with(
     *   accountType: ...,
     *   additionalCurrencies: ...,
     *   companyCurrency: ...,
     *   dataHostingLocation: ...,
     *   portalID: ...,
     *   timeZone: ...,
     *   uiDomain: ...,
     *   utcOffset: ...,
     *   utcOffsetMilliseconds: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalInformationResponse)
     *   ->withAccountType(...)
     *   ->withAdditionalCurrencies(...)
     *   ->withCompanyCurrency(...)
     *   ->withDataHostingLocation(...)
     *   ->withPortalID(...)
     *   ->withTimeZone(...)
     *   ->withUiDomain(...)
     *   ->withUtcOffset(...)
     *   ->withUtcOffsetMilliseconds(...)
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
     * @param AccountType|value-of<AccountType> $accountType
     * @param list<string> $additionalCurrencies
     */
    public static function with(
        AccountType|string $accountType,
        array $additionalCurrencies,
        string $companyCurrency,
        string $dataHostingLocation,
        int $portalID,
        string $timeZone,
        string $uiDomain,
        string $utcOffset,
        int $utcOffsetMilliseconds,
    ): self {
        $self = new self;

        $self['accountType'] = $accountType;
        $self['additionalCurrencies'] = $additionalCurrencies;
        $self['companyCurrency'] = $companyCurrency;
        $self['dataHostingLocation'] = $dataHostingLocation;
        $self['portalID'] = $portalID;
        $self['timeZone'] = $timeZone;
        $self['uiDomain'] = $uiDomain;
        $self['utcOffset'] = $utcOffset;
        $self['utcOffsetMilliseconds'] = $utcOffsetMilliseconds;

        return $self;
    }

    /**
     * @param AccountType|value-of<AccountType> $accountType
     */
    public function withAccountType(AccountType|string $accountType): self
    {
        $self = clone $this;
        $self['accountType'] = $accountType;

        return $self;
    }

    /**
     * @param list<string> $additionalCurrencies
     */
    public function withAdditionalCurrencies(array $additionalCurrencies): self
    {
        $self = clone $this;
        $self['additionalCurrencies'] = $additionalCurrencies;

        return $self;
    }

    public function withCompanyCurrency(string $companyCurrency): self
    {
        $self = clone $this;
        $self['companyCurrency'] = $companyCurrency;

        return $self;
    }

    public function withDataHostingLocation(string $dataHostingLocation): self
    {
        $self = clone $this;
        $self['dataHostingLocation'] = $dataHostingLocation;

        return $self;
    }

    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    public function withTimeZone(string $timeZone): self
    {
        $self = clone $this;
        $self['timeZone'] = $timeZone;

        return $self;
    }

    public function withUiDomain(string $uiDomain): self
    {
        $self = clone $this;
        $self['uiDomain'] = $uiDomain;

        return $self;
    }

    public function withUtcOffset(string $utcOffset): self
    {
        $self = clone $this;
        $self['utcOffset'] = $utcOffset;

        return $self;
    }

    public function withUtcOffsetMilliseconds(int $utcOffsetMilliseconds): self
    {
        $self = clone $this;
        $self['utcOffsetMilliseconds'] = $utcOffsetMilliseconds;

        return $self;
    }
}
