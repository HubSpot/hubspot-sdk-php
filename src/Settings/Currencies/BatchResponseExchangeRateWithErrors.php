<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ErrorDetail;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRateWithErrors\Status;
use HubspotSDK\Settings\Currencies\ExchangeRate\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\ExchangeRate\ToCurrencyCode;
use HubspotSDK\StandardError;

/**
 * @phpstan-type BatchResponseExchangeRateWithErrorsShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<ExchangeRate>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   errors?: list<StandardError>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponseExchangeRateWithErrors implements BaseModel
{
    /** @use SdkModel<BatchResponseExchangeRateWithErrorsShape> */
    use SdkModel;

    #[Required]
    public \DateTimeInterface $completedAt;

    /** @var list<ExchangeRate> $results */
    #[Required(list: ExchangeRate::class)]
    public array $results;

    #[Required]
    public \DateTimeInterface $startedAt;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var list<StandardError>|null $errors */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /** @var array<string,string>|null $links */
    #[Optional(map: 'string')]
    public ?array $links;

    #[Optional]
    public ?int $numErrors;

    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponseExchangeRateWithErrors()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseExchangeRateWithErrors::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseExchangeRateWithErrors)
     *   ->withCompletedAt(...)
     *   ->withResults(...)
     *   ->withStartedAt(...)
     *   ->withStatus(...)
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
     * @param list<ExchangeRate|array{
     *   id: string,
     *   conversionRate: float,
     *   createdAt: \DateTimeInterface,
     *   effectiveAt: \DateTimeInterface,
     *   fromCurrencyCode: value-of<FromCurrencyCode>,
     *   toCurrencyCode: value-of<ToCurrencyCode>,
     *   updatedAt: \DateTimeInterface,
     *   visibleInUi: bool,
     * }> $results
     * @param Status|value-of<Status> $status
     * @param list<StandardError|array{
     *   category: string,
     *   context: array<string,list<string>>,
     *   errors: list<ErrorDetail>,
     *   links: array<string,string>,
     *   message: string,
     *   status: string,
     *   id?: string|null,
     *   subCategory?: mixed,
     * }> $errors
     * @param array<string,string> $links
     */
    public static function with(
        \DateTimeInterface $completedAt,
        array $results,
        \DateTimeInterface $startedAt,
        Status|string $status,
        ?array $errors = null,
        ?array $links = null,
        ?int $numErrors = null,
        ?\DateTimeInterface $requestedAt = null,
    ): self {
        $self = new self;

        $self['completedAt'] = $completedAt;
        $self['results'] = $results;
        $self['startedAt'] = $startedAt;
        $self['status'] = $status;

        null !== $errors && $self['errors'] = $errors;
        null !== $links && $self['links'] = $links;
        null !== $numErrors && $self['numErrors'] = $numErrors;
        null !== $requestedAt && $self['requestedAt'] = $requestedAt;

        return $self;
    }

    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * @param list<ExchangeRate|array{
     *   id: string,
     *   conversionRate: float,
     *   createdAt: \DateTimeInterface,
     *   effectiveAt: \DateTimeInterface,
     *   fromCurrencyCode: value-of<FromCurrencyCode>,
     *   toCurrencyCode: value-of<ToCurrencyCode>,
     *   updatedAt: \DateTimeInterface,
     *   visibleInUi: bool,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param list<StandardError|array{
     *   category: string,
     *   context: array<string,list<string>>,
     *   errors: list<ErrorDetail>,
     *   links: array<string,string>,
     *   message: string,
     *   status: string,
     *   id?: string|null,
     *   subCategory?: mixed,
     * }> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $self = clone $this;
        $self['links'] = $links;

        return $self;
    }

    public function withNumErrors(int $numErrors): self
    {
        $self = clone $this;
        $self['numErrors'] = $numErrors;

        return $self;
    }

    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
