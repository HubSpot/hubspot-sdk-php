<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\EmailCloneParams;
use HubspotSDK\Marketing\Emails\EmailCreateAbTestVariationParams;
use HubspotSDK\Marketing\Emails\EmailCreateParams;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubspotSDK\Marketing\Emails\EmailCreateParams\State;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Subcategory;
use HubspotSDK\Marketing\Emails\EmailDeleteParams;
use HubspotSDK\Marketing\Emails\EmailGetAbTestVariationParams;
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
     * Use this endpoint to create a new marketing email.
     *
     * @param array{
     *   name: string,
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
            path: 'marketing/v3/emails/',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Change properties of a marketing email.
     *
     * @param string $emailID Path param: The ID of the marketing email that should get updated
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
            path: ['marketing/v3/emails/%1$s', $emailID],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * The results can be filtered, allowing you to find a specific set of emails. See the table below for a full list of filtering options.
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
            path: 'marketing/v3/emails/',
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete a marketing email by its ID
     *
     * @param string $emailID the ID of the marketing email to delete
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
            path: ['marketing/v3/emails/%1$s', $emailID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * This will create a duplicate email with the same properties as the original, with the exception of a unique ID.
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
            path: 'marketing/v3/emails/clone',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Create a variation of a marketing email for an A/B test. The new variation will be created as a draft. If an active variation already exists, a new one won't be created.
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
            path: 'marketing/v3/emails/ab-test/create-variation',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Get the details for a marketing email.
     *
     * @param string $emailID the marketing email ID
     * @param array{
     *   archived?: bool,
     *   includedProperties?: list<string>,
     *   includeStats?: bool,
     *   marketingCampaignNames?: bool,
     *   workflowNames?: bool,
     * }|EmailGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function get(
        string $emailID,
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
            path: ['marketing/v3/emails/%1$s', $emailID],
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * This endpoint lets you obtain the variation of an A/B marketing email. If the email is variation A (master) it will return variation B (variant) and vice versa.
     *
     * @param string $emailID the ID of an A/B marketing email
     * @param array{
     *   archived?: bool,
     *   includedProperties?: list<string>,
     *   includeStats?: bool,
     *   marketingCampaignNames?: bool,
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
            path: ['marketing/v3/emails/%1$s/ab-test/get-variation', $emailID],
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Get the draft version of an email (if it exists). If no draft version exists, the published email is returned.
     *
     * @param string $emailID the marketing email ID
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
            path: ['marketing/v3/emails/%1$s/draft', $emailID],
            options: $requestOptions,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Get a specific revision of a marketing email.
     *
     * @param string $revisionID the ID of a revision
     * @param array{emailID: string}|EmailGetRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VersionPublicEmail>
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
            path: ['marketing/v3/emails/%1$s/revisions/%2$s', $emailID, $revisionID],
            options: $options,
            convert: VersionPublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Get a list of all versions of a marketing email, with each entry including the full state of that particular version. To view the most recent version, sort by the updatedAt parameter.
     *
     * @param string $emailID the marketing email ID
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
            path: ['marketing/v3/emails/%1$s/revisions', $emailID],
            query: $parsed,
            options: $options,
            convert: VersionPublicEmail::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to publish an automated email or send/schedule a regular email.
     *
     * @param string $emailID the marketing email ID
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
            path: ['marketing/v3/emails/%1$s/publish', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Resets the draft back to a copy of the live object.
     *
     * @param string $emailID the marketing email ID
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
            path: ['marketing/v3/emails/%1$s/draft/reset', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email. The current revision becomes old, and the restored revision is given a new version number.
     *
     * @param string $revisionID the ID of a revision
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
                'marketing/v3/emails/%1$s/revisions/%2$s/restore', $emailID, $revisionID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email to DRAFT state. If there is currently something in the draft for that object, it is overwritten.
     *
     * @param int $revisionID the ID of a revision
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
                'marketing/v3/emails/%1$s/revisions/%2$s/restore-to-draft',
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
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to unpublish an automated email or cancel a regular email. If the email is already in the process of being sent, canceling might not be possible.
     *
     * @param string $emailID the ID of the email to unpublish
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
            path: ['marketing/v3/emails/%1$s/unpublish', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create or update the draft version of a marketing email. If no draft exists, the system creates a draft from the current “live” email then applies the request body to that draft. The draft version only lives on the buffer—the email is not cloned.
     *
     * @param string $emailID the marketing email ID
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
            path: ['marketing/v3/emails/%1$s/draft', $emailID],
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }
}
