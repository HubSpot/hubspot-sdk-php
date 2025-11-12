<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Data structure representing lists of IDs that should be included and excluded.
 *
 * @phpstan-type PublicEmailRecipientsShape = array{
 *   exclude?: list<string>|null, include1?: list<string>|null
 * }
 */
final class PublicEmailRecipients implements BaseModel
{
    /** @use SdkModel<PublicEmailRecipientsShape> */
    use SdkModel;

    /**
     * Excluded IDs.
     *
     * @var list<string>|null $exclude
     */
    #[Api(list: 'string', optional: true)]
    public ?array $exclude;

    /**
     * Included IDs.
     *
     * @var list<string>|null $include1
     */
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
     * Excluded IDs.
     *
     * @param list<string> $exclude
     */
    public function withExclude(array $exclude): self
    {
        $obj = clone $this;
        $obj->exclude = $exclude;

        return $obj;
    }

    /**
     * Included IDs.
     *
     * @param list<string> $include1
     */
    public function withInclude(array $include1): self
    {
        $obj = clone $this;
        $obj->include1 = $include1;

        return $obj;
    }
}
