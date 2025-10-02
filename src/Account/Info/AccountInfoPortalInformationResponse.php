<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Info;

use HubspotSDK\Account\Info\AccountInfoPortalInformationResponse\AccountType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type account_info_portal_information_response = array{
 *   accountType: value-of<AccountType>,
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
final class AccountInfoPortalInformationResponse implements BaseModel
{
    /** @use SdkModel<account_info_portal_information_response> */
    use SdkModel;

    /** @var value-of<AccountType> $accountType */
    #[Api(enum: AccountType::class)]
    public string $accountType;

    /** @var list<string> $additionalCurrencies */
    #[Api(list: 'string')]
    public array $additionalCurrencies;

    #[Api]
    public string $companyCurrency;

    #[Api]
    public string $dataHostingLocation;

    #[Api('portalId')]
    public int $portalID;

    #[Api]
    public string $timeZone;

    #[Api]
    public string $uiDomain;

    #[Api]
    public string $utcOffset;

    #[Api]
    public int $utcOffsetMilliseconds;

    /**
     * `new AccountInfoPortalInformationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccountInfoPortalInformationResponse::with(
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
     * (new AccountInfoPortalInformationResponse)
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
        $obj = new self;

        $obj->accountType = $accountType instanceof AccountType ? $accountType->value : $accountType;
        $obj->additionalCurrencies = $additionalCurrencies;
        $obj->companyCurrency = $companyCurrency;
        $obj->dataHostingLocation = $dataHostingLocation;
        $obj->portalID = $portalID;
        $obj->timeZone = $timeZone;
        $obj->uiDomain = $uiDomain;
        $obj->utcOffset = $utcOffset;
        $obj->utcOffsetMilliseconds = $utcOffsetMilliseconds;

        return $obj;
    }

    /**
     * @param AccountType|value-of<AccountType> $accountType
     */
    public function withAccountType(AccountType|string $accountType): self
    {
        $obj = clone $this;
        $obj->accountType = $accountType instanceof AccountType ? $accountType->value : $accountType;

        return $obj;
    }

    /**
     * @param list<string> $additionalCurrencies
     */
    public function withAdditionalCurrencies(array $additionalCurrencies): self
    {
        $obj = clone $this;
        $obj->additionalCurrencies = $additionalCurrencies;

        return $obj;
    }

    public function withCompanyCurrency(string $companyCurrency): self
    {
        $obj = clone $this;
        $obj->companyCurrency = $companyCurrency;

        return $obj;
    }

    public function withDataHostingLocation(string $dataHostingLocation): self
    {
        $obj = clone $this;
        $obj->dataHostingLocation = $dataHostingLocation;

        return $obj;
    }

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj->portalID = $portalID;

        return $obj;
    }

    public function withTimeZone(string $timeZone): self
    {
        $obj = clone $this;
        $obj->timeZone = $timeZone;

        return $obj;
    }

    public function withUiDomain(string $uiDomain): self
    {
        $obj = clone $this;
        $obj->uiDomain = $uiDomain;

        return $obj;
    }

    public function withUtcOffset(string $utcOffset): self
    {
        $obj = clone $this;
        $obj->utcOffset = $utcOffset;

        return $obj;
    }

    public function withUtcOffsetMilliseconds(int $utcOffsetMilliseconds): self
    {
        $obj = clone $this;
        $obj->utcOffsetMilliseconds = $utcOffsetMilliseconds;

        return $obj;
    }
}
