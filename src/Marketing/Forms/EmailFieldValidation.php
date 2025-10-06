<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type email_field_validation = array{
 *   blockedEmailDomains: list<string>, useDefaultBlockList: bool
 * }
 */
final class EmailFieldValidation implements BaseModel
{
    /** @use SdkModel<email_field_validation> */
    use SdkModel;

    /** @var list<string> $blockedEmailDomains */
    #[Api(list: 'string')]
    public array $blockedEmailDomains;

    #[Api]
    public bool $useDefaultBlockList;

    /**
     * `new EmailFieldValidation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailFieldValidation::with(blockedEmailDomains: ..., useDefaultBlockList: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailFieldValidation)
     *   ->withBlockedEmailDomains(...)
     *   ->withUseDefaultBlockList(...)
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
     * @param list<string> $blockedEmailDomains
     */
    public static function with(
        array $blockedEmailDomains,
        bool $useDefaultBlockList
    ): self {
        $obj = new self;

        $obj->blockedEmailDomains = $blockedEmailDomains;
        $obj->useDefaultBlockList = $useDefaultBlockList;

        return $obj;
    }

    /**
     * @param list<string> $blockedEmailDomains
     */
    public function withBlockedEmailDomains(array $blockedEmailDomains): self
    {
        $obj = clone $this;
        $obj->blockedEmailDomains = $blockedEmailDomains;

        return $obj;
    }

    public function withUseDefaultBlockList(bool $useDefaultBlockList): self
    {
        $obj = clone $this;
        $obj->useDefaultBlockList = $useDefaultBlockList;

        return $obj;
    }
}
