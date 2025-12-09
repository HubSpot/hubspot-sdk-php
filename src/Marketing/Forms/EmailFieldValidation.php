<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Describes how an email address should be validated.
 *
 * @phpstan-type EmailFieldValidationShape = array{
 *   blockedEmailDomains: list<string>, useDefaultBlockList: bool
 * }
 */
final class EmailFieldValidation implements BaseModel
{
    /** @use SdkModel<EmailFieldValidationShape> */
    use SdkModel;

    /**
     * A list of email domains to block.
     *
     * @var list<string> $blockedEmailDomains
     */
    #[Required(list: 'string')]
    public array $blockedEmailDomains;

    /**
     * Whether to block the free email providers.
     */
    #[Required]
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

        $obj['blockedEmailDomains'] = $blockedEmailDomains;
        $obj['useDefaultBlockList'] = $useDefaultBlockList;

        return $obj;
    }

    /**
     * A list of email domains to block.
     *
     * @param list<string> $blockedEmailDomains
     */
    public function withBlockedEmailDomains(array $blockedEmailDomains): self
    {
        $obj = clone $this;
        $obj['blockedEmailDomains'] = $blockedEmailDomains;

        return $obj;
    }

    /**
     * Whether to block the free email providers.
     */
    public function withUseDefaultBlockList(bool $useDefaultBlockList): self
    {
        $obj = clone $this;
        $obj['useDefaultBlockList'] = $useDefaultBlockList;

        return $obj;
    }
}
