<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicBoolPropertyOperation\OperationType;
use HubspotSDK\PublicCalendarDatePropertyOperation\FiscalYearStart;
use HubspotSDK\PublicRangedTimeOperation\Type;
use HubspotSDK\PublicSurveyMonkeyValueFilter\FilterType;

/**
 * @phpstan-type PublicSurveyMonkeyValueFilterShape = array{
 *   filterType: value-of<FilterType>,
 *   operator: string,
 *   surveyId: string,
 *   surveyQuestion: string,
 *   valueComparison: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
 *   surveyAnswerColId?: string|null,
 *   surveyAnswerRowId?: string|null,
 * }
 */
final class PublicSurveyMonkeyValueFilter implements BaseModel
{
    /** @use SdkModel<PublicSurveyMonkeyValueFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $operator;

    #[Api]
    public string $surveyId;

    #[Api]
    public string $surveyQuestion;

    #[Api]
    public PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison;

    #[Api(optional: true)]
    public ?string $surveyAnswerColId;

    #[Api(optional: true)]
    public ?string $surveyAnswerRowId;

    /**
     * `new PublicSurveyMonkeyValueFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSurveyMonkeyValueFilter::with(
     *   filterType: ...,
     *   operator: ...,
     *   surveyId: ...,
     *   surveyQuestion: ...,
     *   valueComparison: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSurveyMonkeyValueFilter)
     *   ->withFilterType(...)
     *   ->withOperator(...)
     *   ->withSurveyID(...)
     *   ->withSurveyQuestion(...)
     *   ->withValueComparison(...)
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
     * @param PublicBoolPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<OperationType>,
     *   operator: string,
     *   value: bool,
     * }|PublicNumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicNumberPropertyOperation\OperationType>,
     *   operator: string,
     *   value: float,
     * }|PublicStringPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicStringPropertyOperation\OperationType>,
     *   operator: string,
     *   value: string,
     * }|PublicDateTimePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicDateTimePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     *   timestamp: int,
     * }|PublicRangedDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBound: int,
     *   operationType: value-of<PublicRangedDatePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     *   upperBound: int,
     * }|PublicComparativePropertyUpdatedOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicComparativePropertyUpdatedOperation\OperationType>,
     *   operator: string,
     *   defaultComparisonValue?: string|null,
     * }|PublicComparativeDatePropertyOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicComparativeDatePropertyOperation\OperationType>,
     *   operator: string,
     *   defaultComparisonValue?: string|null,
     * }|PublicRollingDateRangePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: value-of<PublicRollingDateRangePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     * }|PublicRollingPropertyUpdatedOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: value-of<PublicRollingPropertyUpdatedOperation\OperationType>,
     *   operator: string,
     * }|PublicEnumerationPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicEnumerationPropertyOperation\OperationType>,
     *   operator: string,
     *   values: list<string>,
     * }|PublicAllPropertyTypesOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicAllPropertyTypesOperation\OperationType>,
     *   operator: string,
     * }|PublicRangedNumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBound: int,
     *   operationType: value-of<PublicRangedNumberPropertyOperation\OperationType>,
     *   operator: string,
     *   upperBound: int,
     * }|PublicMultiStringPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicMultiStringPropertyOperation\OperationType>,
     *   operator: string,
     *   values: list<string>,
     * }|PublicDatePropertyOperation|array{
     *   day: int,
     *   includeObjectsWithNoValueSet: bool,
     *   month: string,
     *   operationType: value-of<PublicDatePropertyOperation\OperationType>,
     *   operator: string,
     *   year: int,
     * }|PublicCalendarDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicCalendarDatePropertyOperation\OperationType>,
     *   operator: string,
     *   timeUnit: string,
     *   fiscalYearStart?: value-of<FiscalYearStart>|null,
     *   timeUnitCount?: int|null,
     *   useFiscalYear?: bool|null,
     * }|PublicTimePointOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicTimePointOperation\OperationType>,
     *   operator: string,
     *   timePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   type: string,
     *   endpointBehavior?: string|null,
     *   propertyParser?: string|null,
     * }|PublicRangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   operationType: string,
     *   operator: string,
     *   type: value-of<Type>,
     *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   lowerBoundEndpointBehavior?: string|null,
     *   propertyParser?: string|null,
     *   upperBoundEndpointBehavior?: string|null,
     * } $valueComparison
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $operator,
        string $surveyId,
        string $surveyQuestion,
        PublicBoolPropertyOperation|array|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison,
        FilterType|string $filterType = 'SURVEY_MONKEY_VALUE',
        ?string $surveyAnswerColId = null,
        ?string $surveyAnswerRowId = null,
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj['operator'] = $operator;
        $obj['surveyId'] = $surveyId;
        $obj['surveyQuestion'] = $surveyQuestion;
        $obj['valueComparison'] = $valueComparison;

        null !== $surveyAnswerColId && $obj['surveyAnswerColId'] = $surveyAnswerColId;
        null !== $surveyAnswerRowId && $obj['surveyAnswerRowId'] = $surveyAnswerRowId;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    public function withSurveyID(string $surveyID): self
    {
        $obj = clone $this;
        $obj['surveyId'] = $surveyID;

        return $obj;
    }

    public function withSurveyQuestion(string $surveyQuestion): self
    {
        $obj = clone $this;
        $obj['surveyQuestion'] = $surveyQuestion;

        return $obj;
    }

    /**
     * @param PublicBoolPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<OperationType>,
     *   operator: string,
     *   value: bool,
     * }|PublicNumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicNumberPropertyOperation\OperationType>,
     *   operator: string,
     *   value: float,
     * }|PublicStringPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicStringPropertyOperation\OperationType>,
     *   operator: string,
     *   value: string,
     * }|PublicDateTimePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicDateTimePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     *   timestamp: int,
     * }|PublicRangedDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBound: int,
     *   operationType: value-of<PublicRangedDatePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     *   upperBound: int,
     * }|PublicComparativePropertyUpdatedOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicComparativePropertyUpdatedOperation\OperationType>,
     *   operator: string,
     *   defaultComparisonValue?: string|null,
     * }|PublicComparativeDatePropertyOperation|array{
     *   comparisonPropertyName: string,
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicComparativeDatePropertyOperation\OperationType>,
     *   operator: string,
     *   defaultComparisonValue?: string|null,
     * }|PublicRollingDateRangePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: value-of<PublicRollingDateRangePropertyOperation\OperationType>,
     *   operator: string,
     *   requiresTimeZoneConversion: bool,
     * }|PublicRollingPropertyUpdatedOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   numberOfDays: int,
     *   operationType: value-of<PublicRollingPropertyUpdatedOperation\OperationType>,
     *   operator: string,
     * }|PublicEnumerationPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicEnumerationPropertyOperation\OperationType>,
     *   operator: string,
     *   values: list<string>,
     * }|PublicAllPropertyTypesOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicAllPropertyTypesOperation\OperationType>,
     *   operator: string,
     * }|PublicRangedNumberPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBound: int,
     *   operationType: value-of<PublicRangedNumberPropertyOperation\OperationType>,
     *   operator: string,
     *   upperBound: int,
     * }|PublicMultiStringPropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicMultiStringPropertyOperation\OperationType>,
     *   operator: string,
     *   values: list<string>,
     * }|PublicDatePropertyOperation|array{
     *   day: int,
     *   includeObjectsWithNoValueSet: bool,
     *   month: string,
     *   operationType: value-of<PublicDatePropertyOperation\OperationType>,
     *   operator: string,
     *   year: int,
     * }|PublicCalendarDatePropertyOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicCalendarDatePropertyOperation\OperationType>,
     *   operator: string,
     *   timeUnit: string,
     *   fiscalYearStart?: value-of<FiscalYearStart>|null,
     *   timeUnitCount?: int|null,
     *   useFiscalYear?: bool|null,
     * }|PublicTimePointOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<PublicTimePointOperation\OperationType>,
     *   operator: string,
     *   timePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   type: string,
     *   endpointBehavior?: string|null,
     *   propertyParser?: string|null,
     * }|PublicRangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   operationType: string,
     *   operator: string,
     *   type: value-of<Type>,
     *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   lowerBoundEndpointBehavior?: string|null,
     *   propertyParser?: string|null,
     *   upperBoundEndpointBehavior?: string|null,
     * } $valueComparison
     */
    public function withValueComparison(
        PublicBoolPropertyOperation|array|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison,
    ): self {
        $obj = clone $this;
        $obj['valueComparison'] = $valueComparison;

        return $obj;
    }

    public function withSurveyAnswerColID(string $surveyAnswerColID): self
    {
        $obj = clone $this;
        $obj['surveyAnswerColId'] = $surveyAnswerColID;

        return $obj;
    }

    public function withSurveyAnswerRowID(string $surveyAnswerRowID): self
    {
        $obj = clone $this;
        $obj['surveyAnswerRowId'] = $surveyAnswerRowID;

        return $obj;
    }
}
