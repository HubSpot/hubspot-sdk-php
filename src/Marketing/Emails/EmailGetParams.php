<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Use this endpoint to get aggregated statistics of emails sent in a specified time span. It also returns the list of emails that were sent during the time span.
 *
 * @see HubspotSDK\Services\Marketing\EmailsService::get()
 *
 * @phpstan-type EmailGetParamsShape = array{
 *   emailIDs?: list<int>|null,
 *   endTimestamp?: string|null,
 *   property?: string|null,
 *   startTimestamp?: string|null,
 * }
 */
final class EmailGetParams implements BaseModel
{
    /** @use SdkModel<EmailGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<int>|null $emailIDs */
    #[Optional(list: 'int')]
    public ?array $emailIDs;

    #[Optional]
    public ?string $endTimestamp;

    #[Optional]
    public ?string $property;

    #[Optional]
    public ?string $startTimestamp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $emailIDs
     */
    public static function with(
        ?array $emailIDs = null,
        ?string $endTimestamp = null,
        ?string $property = null,
        ?string $startTimestamp = null,
    ): self {
        $self = new self;

        null !== $emailIDs && $self['emailIDs'] = $emailIDs;
        null !== $endTimestamp && $self['endTimestamp'] = $endTimestamp;
        null !== $property && $self['property'] = $property;
        null !== $startTimestamp && $self['startTimestamp'] = $startTimestamp;

        return $self;
    }

    /**
     * @param list<int> $emailIDs
     */
    public function withEmailIDs(array $emailIDs): self
    {
        $self = clone $this;
        $self['emailIDs'] = $emailIDs;

        return $self;
    }

    public function withEndTimestamp(string $endTimestamp): self
    {
        $self = clone $this;
        $self['endTimestamp'] = $endTimestamp;

        return $self;
    }

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    public function withStartTimestamp(string $startTimestamp): self
    {
        $self = clone $this;
        $self['startTimestamp'] = $startTimestamp;

        return $self;
    }
}
