<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Data structure representing lists of IDs that should be included and excluded.
 *
 * @phpstan-type PublicEmailRecipientsShape = array{
 *   exclude?: list<string>|null, include?: list<string>|null
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
    #[Optional(list: 'string')]
    public ?array $exclude;

    /**
     * Included IDs.
     *
     * @var list<string>|null $include
     */
    #[Optional(list: 'string')]
    public ?array $include;

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
     * @param list<string> $include
     */
    public static function with(
        ?array $exclude = null,
        ?array $include = null
    ): self {
        $self = new self;

        null !== $exclude && $self['exclude'] = $exclude;
        null !== $include && $self['include'] = $include;

        return $self;
    }

    /**
     * Excluded IDs.
     *
     * @param list<string> $exclude
     */
    public function withExclude(array $exclude): self
    {
        $self = clone $this;
        $self['exclude'] = $exclude;

        return $self;
    }

    /**
     * Included IDs.
     *
     * @param list<string> $include
     */
    public function withInclude(array $include): self
    {
        $self = clone $this;
        $self['include'] = $include;

        return $self;
    }
}
