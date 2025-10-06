<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_email_recipients = array{
 *   exclude?: list<string>, include1?: list<string>
 * }
 */
final class PublicEmailRecipients implements BaseModel
{
    /** @use SdkModel<public_email_recipients> */
    use SdkModel;

    /** @var list<string>|null $exclude */
    #[Api(list: 'string', optional: true)]
    public ?array $exclude;

    /** @var list<string>|null $include1 */
    #[Api(list: 'string', optional: true)]
    public ?array $include1;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $exclude
     * @param list<string> $include1
     */
    public static function with(
        ?array $exclude = null,
        ?array $include1 = null
    ): self {
        $obj = new self;

        null !== $exclude && $obj->exclude = $exclude;
        null !== $include1 && $obj->include1 = $include1;

        return $obj;
    }

    /**
     * @param list<string> $exclude
     */
    public function withExclude(array $exclude): self
    {
        $obj = clone $this;
        $obj->exclude = $exclude;

        return $obj;
    }

    /**
     * @param list<string> $include1
     */
    public function withInclude(array $include1): self
    {
        $obj = clone $this;
        $obj->include1 = $include1;

        return $obj;
    }
}
