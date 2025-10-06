<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSampleSizeDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSamplingDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbStatus;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSuccessMetric;

/**
 * @phpstan-type public_email_testing_details = array{
 *   abSampleSizeDefault?: value-of<AbSampleSizeDefault>,
 *   abSamplingDefault?: value-of<AbSamplingDefault>,
 *   abStatus?: value-of<AbStatus>,
 *   abSuccessMetric?: value-of<AbSuccessMetric>,
 *   abTestPercentage?: int,
 *   hoursToWait?: int,
 *   testID?: string,
 * }
 */
final class PublicEmailTestingDetails implements BaseModel
{
    /** @use SdkModel<public_email_testing_details> */
    use SdkModel;

    /** @var value-of<AbSampleSizeDefault>|null $abSampleSizeDefault */
    #[Api(enum: AbSampleSizeDefault::class, optional: true)]
    public ?string $abSampleSizeDefault;

    /** @var value-of<AbSamplingDefault>|null $abSamplingDefault */
    #[Api(enum: AbSamplingDefault::class, optional: true)]
    public ?string $abSamplingDefault;

    /** @var value-of<AbStatus>|null $abStatus */
    #[Api(enum: AbStatus::class, optional: true)]
    public ?string $abStatus;

    /** @var value-of<AbSuccessMetric>|null $abSuccessMetric */
    #[Api(enum: AbSuccessMetric::class, optional: true)]
    public ?string $abSuccessMetric;

    #[Api(optional: true)]
    public ?int $abTestPercentage;

    #[Api(optional: true)]
    public ?int $hoursToWait;

    #[Api('testId', optional: true)]
    public ?string $testID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AbSampleSizeDefault|value-of<AbSampleSizeDefault> $abSampleSizeDefault
     * @param AbSamplingDefault|value-of<AbSamplingDefault> $abSamplingDefault
     * @param AbStatus|value-of<AbStatus> $abStatus
     * @param AbSuccessMetric|value-of<AbSuccessMetric> $abSuccessMetric
     */
    public static function with(
        AbSampleSizeDefault|string|null $abSampleSizeDefault = null,
        AbSamplingDefault|string|null $abSamplingDefault = null,
        AbStatus|string|null $abStatus = null,
        AbSuccessMetric|string|null $abSuccessMetric = null,
        ?int $abTestPercentage = null,
        ?int $hoursToWait = null,
        ?string $testID = null,
    ): self {
        $obj = new self;

        null !== $abSampleSizeDefault && $obj['abSampleSizeDefault'] = $abSampleSizeDefault;
        null !== $abSamplingDefault && $obj['abSamplingDefault'] = $abSamplingDefault;
        null !== $abStatus && $obj['abStatus'] = $abStatus;
        null !== $abSuccessMetric && $obj['abSuccessMetric'] = $abSuccessMetric;
        null !== $abTestPercentage && $obj->abTestPercentage = $abTestPercentage;
        null !== $hoursToWait && $obj->hoursToWait = $hoursToWait;
        null !== $testID && $obj->testID = $testID;

        return $obj;
    }

    /**
     * @param AbSampleSizeDefault|value-of<AbSampleSizeDefault> $abSampleSizeDefault
     */
    public function withAbSampleSizeDefault(
        AbSampleSizeDefault|string $abSampleSizeDefault
    ): self {
        $obj = clone $this;
        $obj['abSampleSizeDefault'] = $abSampleSizeDefault;

        return $obj;
    }

    /**
     * @param AbSamplingDefault|value-of<AbSamplingDefault> $abSamplingDefault
     */
    public function withAbSamplingDefault(
        AbSamplingDefault|string $abSamplingDefault
    ): self {
        $obj = clone $this;
        $obj['abSamplingDefault'] = $abSamplingDefault;

        return $obj;
    }

    /**
     * @param AbStatus|value-of<AbStatus> $abStatus
     */
    public function withAbStatus(AbStatus|string $abStatus): self
    {
        $obj = clone $this;
        $obj['abStatus'] = $abStatus;

        return $obj;
    }

    /**
     * @param AbSuccessMetric|value-of<AbSuccessMetric> $abSuccessMetric
     */
    public function withAbSuccessMetric(
        AbSuccessMetric|string $abSuccessMetric
    ): self {
        $obj = clone $this;
        $obj['abSuccessMetric'] = $abSuccessMetric;

        return $obj;
    }

    public function withAbTestPercentage(int $abTestPercentage): self
    {
        $obj = clone $this;
        $obj->abTestPercentage = $abTestPercentage;

        return $obj;
    }

    public function withHoursToWait(int $hoursToWait): self
    {
        $obj = clone $this;
        $obj->hoursToWait = $hoursToWait;

        return $obj;
    }

    public function withTestID(string $testID): self
    {
        $obj = clone $this;
        $obj->testID = $testID;

        return $obj;
    }
}
