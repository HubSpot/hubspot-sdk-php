<?php

declare(strict_types=1);

namespace HubspotSDK\Account;

use HubspotSDK\Account\PortalInformationResponse\AccountType;
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

    /**
     * The type of account, such as APP_DEVELOPER, DEVELOPER_TEST, SANDBOX, or STANDARD.
     *
     * @var value-of<AccountType> $accountType
     */
    #[Required(enum: AccountType::class)]
    public string $accountType;

    /** @var list<string> $additionalCurrencies */
    #[Required(list: 'string')]
    public array $additionalCurrencies;

    /**
     * The primary currency used by the company.
     */
    #[Required]
    public string $companyCurrency;

    /**
     * The location where the account's data is hosted.
     */
    #[Required]
    public string $dataHostingLocation;

    /**
     * The unique identifier for the HubSpot account.
     */
    #[Required('portalId')]
    public int $portalID;

    /**
     * The time zone in which the account operates.
     */
    #[Required]
    public string $timeZone;

    /**
     * The domain used for accessing the HubSpot user interface.
     */
    #[Required]
    public string $uiDomain;

    /**
     * The time zone offset from UTC in hours and minutes.
     */
    #[Required]
    public string $utcOffset;

    /**
     * The time zone offset from UTC in milliseconds.
     */
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
     * The type of account, such as APP_DEVELOPER, DEVELOPER_TEST, SANDBOX, or STANDARD.
     *
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

    /**
     * The primary currency used by the company.
     */
    public function withCompanyCurrency(string $companyCurrency): self
    {
        $self = clone $this;
        $self['companyCurrency'] = $companyCurrency;

        return $self;
    }

    /**
     * The location where the account's data is hosted.
     */
    public function withDataHostingLocation(string $dataHostingLocation): self
    {
        $self = clone $this;
        $self['dataHostingLocation'] = $dataHostingLocation;

        return $self;
    }

    /**
     * The unique identifier for the HubSpot account.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * The time zone in which the account operates.
     */
    public function withTimeZone(string $timeZone): self
    {
        $self = clone $this;
        $self['timeZone'] = $timeZone;

        return $self;
    }

    /**
     * The domain used for accessing the HubSpot user interface.
     */
    public function withUiDomain(string $uiDomain): self
    {
        $self = clone $this;
        $self['uiDomain'] = $uiDomain;

        return $self;
    }

    /**
     * The time zone offset from UTC in hours and minutes.
     */
    public function withUtcOffset(string $utcOffset): self
    {
        $self = clone $this;
        $self['utcOffset'] = $utcOffset;

        return $self;
    }

    /**
     * The time zone offset from UTC in milliseconds.
     */
    public function withUtcOffsetMilliseconds(int $utcOffsetMilliseconds): self
    {
        $self = clone $this;
        $self['utcOffsetMilliseconds'] = $utcOffsetMilliseconds;

        return $self;
    }
}
