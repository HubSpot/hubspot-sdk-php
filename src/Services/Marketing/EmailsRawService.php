<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticInterval;
use HubspotSDK\Marketing\Emails\EmailCloneParams;
use HubspotSDK\Marketing\Emails\EmailCreateAbTestVariationParams;
use HubspotSDK\Marketing\Emails\EmailCreateParams;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubspotSDK\Marketing\Emails\EmailCreateParams\State;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Subcategory;
use HubspotSDK\Marketing\Emails\EmailDeleteParams;
use HubspotSDK\Marketing\Emails\EmailGetAbTestVariationParams;
use HubspotSDK\Marketing\Emails\EmailGetHistogramParams;
use HubspotSDK\Marketing\Emails\EmailGetHistogramParams\Interval;
use HubspotSDK\Marketing\Emails\EmailGetParams;
use HubspotSDK\Marketing\Emails\EmailGetRevisionParams;
use HubspotSDK\Marketing\Emails\EmailListParams;
use HubspotSDK\Marketing\Emails\EmailListParams\Type;
use HubspotSDK\Marketing\Emails\EmailListRevisionsParams;
use HubspotSDK\Marketing\Emails\EmailRestoreRevisionParams;
use HubspotSDK\Marketing\Emails\EmailRestoreRevisionToDraftParams;
use HubspotSDK\Marketing\Emails\EmailUpdateDraftParams;
use HubspotSDK\Marketing\Emails\EmailUpdateParams;
use HubspotSDK\Marketing\Emails\PublicEmail;
use HubspotSDK\Marketing\Emails\PublicEmailContent;
use HubspotSDK\Marketing\Emails\PublicEmailFromDetails;
use HubspotSDK\Marketing\Emails\PublicEmailSubscriptionDetails;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails;
use HubspotSDK\Marketing\Emails\PublicEmailToDetails;
use HubspotSDK\Marketing\Emails\PublicEmailVersion;
use HubspotSDK\Marketing\Emails\PublicRssEmailDetails;
use HubspotSDK\Marketing\Emails\PublicWebversionDetails;
use HubspotSDK\Marketing\Emails\VersionPublicEmail;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\EmailsRawContract;

/**
 * @phpstan-import-type PublicEmailContentShape from \HubspotSDK\Marketing\Emails\PublicEmailContent
 * @phpstan-import-type PublicEmailFromDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailFromDetails
 * @phpstan-import-type PublicRssEmailDetailsShape from \HubspotSDK\Marketing\Emails\PublicRssEmailDetails
 * @phpstan-import-type PublicEmailSubscriptionDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailSubscriptionDetails
 * @phpstan-import-type PublicEmailTestingDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailTestingDetails
 * @phpstan-import-type PublicEmailToDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailToDetails
 * @phpstan-import-type PublicWebversionDetailsShape from \HubspotSDK\Marketing\Emails\PublicWebversionDetails
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class EmailsRawService implements EmailsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   activeDomain?: string,
     *   archived?: bool,
     *   businessUnitID?: int,
     *   campaign?: string,
     *   content?: PublicEmailContent|PublicEmailContentShape,
     *   feedbackSurveyID?: string,
     *   folderIDV2?: int,
     *   from?: PublicEmailFromDetails|PublicEmailFromDetailsShape,
     *   jitterSendTime?: bool,
     *   language?: value-of<Language>,
     *   name?: string,
     *   publishDate?: \DateTimeInterface,
     *   rssData?: PublicRssEmailDetails|PublicRssEmailDetailsShape,
     *   sendOnPublish?: bool,
     *   state?: value-of<State>,
     *   subcategory?: value-of<Subcategory>,
     *   subject?: string,
     *   subscriptionDetails?: PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape,
     *   testing?: PublicEmailTestingDetails|PublicEmailTestingDetailsShape,
     *   to?: PublicEmailToDetails|PublicEmailToDetailsShape,
     *   webversion?: PublicWebversionDetails|PublicWebversionDetailsShape,
     * }|EmailCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function create(
        array|EmailCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/emails/2026-03',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * @param string $emailID Path param
     * @param array{
     *   archived?: bool,
     *   activeDomain?: string,
     *   businessUnitID?: int,
     *   campaign?: string,
     *   content?: PublicEmailContent|PublicEmailContentShape,
     *   folderIDV2?: int,
     *   from?: PublicEmailFromDetails|PublicEmailFromDetailsShape,
     *   jitterSendTime?: bool,
     *   language?: value-of<EmailUpdateParams\Language>,
     *   name?: string,
     *   publishDate?: \DateTimeInterface,
     *   rssData?: PublicRssEmailDetails|PublicRssEmailDetailsShape,
     *   sendOnPublish?: bool,
     *   state?: value-of<EmailUpdateParams\State>,
     *   subcategory?: value-of<EmailUpdateParams\Subcategory>,
     *   subject?: string,
     *   subscriptionDetails?: PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape,
     *   testing?: PublicEmailTestingDetails|PublicEmailTestingDetailsShape,
     *   to?: PublicEmailToDetails|PublicEmailToDetailsShape,
     *   webversion?: PublicWebversionDetails|PublicWebversionDetailsShape,
     * }|EmailUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        array|EmailUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['marketing/emails/2026-03/%1$s', $emailID],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   campaign?: string,
     *   createdAfter?: \DateTimeInterface,
     *   createdAt?: \DateTimeInterface,
     *   createdBefore?: \DateTimeInterface,
     *   includedProperties?: list<string>,
     *   includeStats?: bool,
     *   isPublished?: bool,
     *   limit?: int,
     *   marketingCampaignNames?: bool,
     *   publishedAfter?: \DateTimeInterface,
     *   publishedAt?: \DateTimeInterface,
     *   publishedBefore?: \DateTimeInterface,
     *   sort?: list<string>,
     *   type?: value-of<Type>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     *   variantStats?: bool,
     *   workflowNames?: bool,
     * }|EmailListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicEmail>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/emails/2026-03',
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{archived?: bool}|EmailDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        array|EmailDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['marketing/emails/2026-03/%1$s', $emailID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   id: string, cloneName?: string, language?: string
     * }|EmailCloneParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function clone(
        array|EmailCloneParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailCloneParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/emails/2026-03/clone',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   contentID: string, variationName: string
     * }|EmailCreateAbTestVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|EmailCreateAbTestVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailCreateAbTestVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/emails/2026-03/ab-test/create-variation',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   emailIDs?: list<int>,
     *   endTimestamp?: string,
     *   property?: string,
     *   startTimestamp?: string,
     * }|EmailGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AggregateEmailStatistics>
     *
     * @throws APIException
     */
    public function get(
        array|EmailGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/emails/2026-03/statistics/list',
            query: Util::array_transform_keys($parsed, ['emailIDs' => 'emailIds']),
            options: $options,
            convert: AggregateEmailStatistics::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   archived?: bool,
     *   includedProperties?: list<string>,
     *   includeStats?: bool,
     *   marketingCampaignNames?: bool,
     *   variantStats?: bool,
     *   workflowNames?: bool,
     * }|EmailGetAbTestVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function getAbTestVariation(
        string $emailID,
        array|EmailGetAbTestVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailGetAbTestVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/emails/2026-03/%1$s/ab-test/get-variation', $emailID],
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function getDraft(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/emails/2026-03/%1$s/draft', $emailID],
            options: $requestOptions,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   emailIDs?: list<int>,
     *   endTimestamp?: string,
     *   interval?: Interval|value-of<Interval>,
     *   startTimestamp?: string,
     * }|EmailGetHistogramParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalEmailStatisticInterval>
     *
     * @throws APIException
     */
    public function getHistogram(
        array|EmailGetHistogramParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailGetHistogramParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/emails/2026-03/statistics/histogram',
            query: Util::array_transform_keys($parsed, ['emailIDs' => 'emailIds']),
            options: $options,
            convert: CollectionResponseWithTotalEmailStatisticInterval::class,
        );
    }

    /**
     * @api
     *
     * @param array{emailID: string}|EmailGetRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmailVersion>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|EmailGetRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailGetRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/emails/2026-03/%1$s/revisions/%2$s', $emailID, $revisionID,
            ],
            options: $options,
            convert: PublicEmailVersion::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|EmailListRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<VersionPublicEmail>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $emailID,
        array|EmailListRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailListRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/emails/2026-03/%1$s/revisions', $emailID],
            query: $parsed,
            options: $options,
            convert: VersionPublicEmail::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function publish(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['marketing/emails/2026-03/%1$s/publish', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resetDraft(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['marketing/emails/2026-03/%1$s/draft/reset', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{emailID: string}|EmailRestoreRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|EmailRestoreRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailRestoreRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/emails/2026-03/%1$s/revisions/%2$s/restore',
                $emailID,
                $revisionID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{emailID: string}|EmailRestoreRevisionToDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|EmailRestoreRevisionToDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailRestoreRevisionToDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/emails/2026-03/%1$s/revisions/%2$s/restore-to-draft',
                $emailID,
                $revisionID,
            ],
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function unpublish(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['marketing/emails/2026-03/%1$s/unpublish', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   activeDomain?: string,
     *   archived?: bool,
     *   businessUnitID?: int,
     *   campaign?: string,
     *   content?: PublicEmailContent|PublicEmailContentShape,
     *   folderIDV2?: int,
     *   from?: PublicEmailFromDetails|PublicEmailFromDetailsShape,
     *   jitterSendTime?: bool,
     *   language?: value-of<EmailUpdateDraftParams\Language>,
     *   name?: string,
     *   publishDate?: \DateTimeInterface,
     *   rssData?: PublicRssEmailDetails|PublicRssEmailDetailsShape,
     *   sendOnPublish?: bool,
     *   state?: value-of<EmailUpdateDraftParams\State>,
     *   subcategory?: value-of<EmailUpdateDraftParams\Subcategory>,
     *   subject?: string,
     *   subscriptionDetails?: PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape,
     *   testing?: PublicEmailTestingDetails|PublicEmailTestingDetailsShape,
     *   to?: PublicEmailToDetails|PublicEmailToDetailsShape,
     *   webversion?: PublicWebversionDetails|PublicWebversionDetailsShape,
     * }|EmailUpdateDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $emailID,
        array|EmailUpdateDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailUpdateDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['marketing/emails/2026-03/%1$s/draft', $emailID],
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }
}
