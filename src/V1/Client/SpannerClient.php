<?php
/*
 * Copyright 2023 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/spanner/v1/spanner.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Spanner\V1\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\InsecureCredentialsWrapper;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\ServerStream;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Spanner\V1\BatchCreateSessionsRequest;
use Google\Cloud\Spanner\V1\BatchCreateSessionsResponse;
use Google\Cloud\Spanner\V1\BatchWriteRequest;
use Google\Cloud\Spanner\V1\BeginTransactionRequest;
use Google\Cloud\Spanner\V1\CommitRequest;
use Google\Cloud\Spanner\V1\CommitResponse;
use Google\Cloud\Spanner\V1\CreateSessionRequest;
use Google\Cloud\Spanner\V1\DeleteSessionRequest;
use Google\Cloud\Spanner\V1\ExecuteBatchDmlRequest;
use Google\Cloud\Spanner\V1\ExecuteBatchDmlRequest\Statement;
use Google\Cloud\Spanner\V1\ExecuteBatchDmlResponse;
use Google\Cloud\Spanner\V1\ExecuteSqlRequest;
use Google\Cloud\Spanner\V1\GetSessionRequest;
use Google\Cloud\Spanner\V1\ListSessionsRequest;
use Google\Cloud\Spanner\V1\Mutation;
use Google\Cloud\Spanner\V1\PartitionQueryRequest;
use Google\Cloud\Spanner\V1\PartitionReadRequest;
use Google\Cloud\Spanner\V1\PartitionResponse;
use Google\Cloud\Spanner\V1\ReadRequest;
use Google\Cloud\Spanner\V1\ResultSet;
use Google\Cloud\Spanner\V1\RollbackRequest;
use Google\Cloud\Spanner\V1\Session;
use Google\Cloud\Spanner\V1\Transaction;
use Grpc\ChannelCredentials;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Log\LoggerInterface;

/**
 * Service Description: Cloud Spanner API
 *
 * The Cloud Spanner API can be used to manage sessions and execute
 * transactions on data stored in Cloud Spanner databases.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @method PromiseInterface<BatchCreateSessionsResponse> batchCreateSessionsAsync(BatchCreateSessionsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Transaction> beginTransactionAsync(BeginTransactionRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<CommitResponse> commitAsync(CommitRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Session> createSessionAsync(CreateSessionRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<void> deleteSessionAsync(DeleteSessionRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<ExecuteBatchDmlResponse> executeBatchDmlAsync(ExecuteBatchDmlRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<ResultSet> executeSqlAsync(ExecuteSqlRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Session> getSessionAsync(GetSessionRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<PagedListResponse> listSessionsAsync(ListSessionsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<PartitionResponse> partitionQueryAsync(PartitionQueryRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<PartitionResponse> partitionReadAsync(PartitionReadRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<ResultSet> readAsync(ReadRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<void> rollbackAsync(RollbackRequest $request, array $optionalArgs = [])
 */
final class SpannerClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.spanner.v1.Spanner';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    private const SERVICE_ADDRESS = 'spanner.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'spanner.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
        'https://www.googleapis.com/auth/spanner.data',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/spanner_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/spanner_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/spanner_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/spanner_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Formats a string containing the fully-qualified path to represent a database
     * resource.
     *
     * @param string $project
     * @param string $instance
     * @param string $database
     *
     * @return string The formatted database resource.
     */
    public static function databaseName(string $project, string $instance, string $database): string
    {
        return self::getPathTemplate('database')->render([
            'project' => $project,
            'instance' => $instance,
            'database' => $database,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a session
     * resource.
     *
     * @param string $project
     * @param string $instance
     * @param string $database
     * @param string $session
     *
     * @return string The formatted session resource.
     */
    public static function sessionName(string $project, string $instance, string $database, string $session): string
    {
        return self::getPathTemplate('session')->render([
            'project' => $project,
            'instance' => $instance,
            'database' => $database,
            'session' => $session,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - database: projects/{project}/instances/{instance}/databases/{database}
     * - session: projects/{project}/instances/{instance}/databases/{database}/sessions/{session}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string  $formattedName The formatted name string
     * @param ?string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName(string $formattedName, ?string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * Setting the "SPANNER_EMULATOR_HOST" environment variable will automatically set
     * the API Endpoint to the value specified in the variable, as well as ensure that
     * empty credentials are used in the transport layer.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'spanner.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *           *Important*: If you accept a credential configuration (credential
     *           JSON/File/Stream) from an external source for authentication to Google Cloud
     *           Platform, you must validate it before providing it to any Google API or library.
     *           Providing an unvalidated credential configuration to Google APIs can compromise
     *           the security of your systems and data. For more information {@see
     *           https://cloud.google.com/docs/authentication/external/externally-sourced-credentials}
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     *     @type false|LoggerInterface $logger
     *           A PSR-3 compliant logger. If set to false, logging is disabled, ignoring the
     *           'GOOGLE_SDK_PHP_LOGGING' environment flag
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $options = $this->setDefaultEmulatorConfig($options);
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Creates multiple new sessions.
     *
     * This API can be used to initialize a session cache on the clients.
     * See https://goo.gl/TgSFN2 for best practices on session cache management.
     *
     * The async variant is {@see SpannerClient::batchCreateSessionsAsync()} .
     *
     * @example samples/V1/SpannerClient/batch_create_sessions.php
     *
     * @param BatchCreateSessionsRequest $request     A request to house fields associated with the call.
     * @param array                      $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return BatchCreateSessionsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function batchCreateSessions(BatchCreateSessionsRequest $request, array $callOptions = []): BatchCreateSessionsResponse
    {
        return $this->startApiCall('BatchCreateSessions', $request, $callOptions)->wait();
    }

    /**
     * Batches the supplied mutation groups in a collection of efficient
     * transactions. All mutations in a group are committed atomically. However,
     * mutations across groups can be committed non-atomically in an unspecified
     * order and thus, they must be independent of each other. Partial failure is
     * possible, i.e., some groups may have been committed successfully, while
     * some may have failed. The results of individual batches are streamed into
     * the response as the batches are applied.
     *
     * BatchWrite requests are not replay protected, meaning that each mutation
     * group may be applied more than once. Replays of non-idempotent mutations
     * may have undesirable effects. For example, replays of an insert mutation
     * may produce an already exists error or if you use generated or commit
     * timestamp-based keys, it may result in additional rows being added to the
     * mutation's table. We recommend structuring your mutation groups to be
     * idempotent to avoid this issue.
     *
     * @example samples/V1/SpannerClient/batch_write.php
     *
     * @param BatchWriteRequest $request     A request to house fields associated with the call.
     * @param array             $callOptions {
     *     Optional.
     *
     *     @type int $timeoutMillis
     *           Timeout to use for this call.
     * }
     *
     * @return ServerStream
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function batchWrite(BatchWriteRequest $request, array $callOptions = []): ServerStream
    {
        return $this->startApiCall('BatchWrite', $request, $callOptions);
    }

    /**
     * Begins a new transaction. This step can often be skipped:
     * [Read][google.spanner.v1.Spanner.Read],
     * [ExecuteSql][google.spanner.v1.Spanner.ExecuteSql] and
     * [Commit][google.spanner.v1.Spanner.Commit] can begin a new transaction as a
     * side-effect.
     *
     * The async variant is {@see SpannerClient::beginTransactionAsync()} .
     *
     * @example samples/V1/SpannerClient/begin_transaction.php
     *
     * @param BeginTransactionRequest $request     A request to house fields associated with the call.
     * @param array                   $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Transaction
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function beginTransaction(BeginTransactionRequest $request, array $callOptions = []): Transaction
    {
        return $this->startApiCall('BeginTransaction', $request, $callOptions)->wait();
    }

    /**
     * Commits a transaction. The request includes the mutations to be
     * applied to rows in the database.
     *
     * `Commit` might return an `ABORTED` error. This can occur at any time;
     * commonly, the cause is conflicts with concurrent
     * transactions. However, it can also happen for a variety of other
     * reasons. If `Commit` returns `ABORTED`, the caller should re-attempt
     * the transaction from the beginning, re-using the same session.
     *
     * On very rare occasions, `Commit` might return `UNKNOWN`. This can happen,
     * for example, if the client job experiences a 1+ hour networking failure.
     * At that point, Cloud Spanner has lost track of the transaction outcome and
     * we recommend that you perform another read from the database to see the
     * state of things as they are now.
     *
     * The async variant is {@see SpannerClient::commitAsync()} .
     *
     * @example samples/V1/SpannerClient/commit.php
     *
     * @param CommitRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return CommitResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function commit(CommitRequest $request, array $callOptions = []): CommitResponse
    {
        return $this->startApiCall('Commit', $request, $callOptions)->wait();
    }

    /**
     * Creates a new session. A session can be used to perform
     * transactions that read and/or modify data in a Cloud Spanner database.
     * Sessions are meant to be reused for many consecutive
     * transactions.
     *
     * Sessions can only execute one transaction at a time. To execute
     * multiple concurrent read-write/write-only transactions, create
     * multiple sessions. Note that standalone reads and queries use a
     * transaction internally, and count toward the one transaction
     * limit.
     *
     * Active sessions use additional server resources, so it is a good idea to
     * delete idle and unneeded sessions.
     * Aside from explicit deletes, Cloud Spanner may delete sessions for which no
     * operations are sent for more than an hour. If a session is deleted,
     * requests to it return `NOT_FOUND`.
     *
     * Idle sessions can be kept alive by sending a trivial SQL query
     * periodically, e.g., `"SELECT 1"`.
     *
     * The async variant is {@see SpannerClient::createSessionAsync()} .
     *
     * @example samples/V1/SpannerClient/create_session.php
     *
     * @param CreateSessionRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Session
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createSession(CreateSessionRequest $request, array $callOptions = []): Session
    {
        return $this->startApiCall('CreateSession', $request, $callOptions)->wait();
    }

    /**
     * Ends a session, releasing server resources associated with it. This will
     * asynchronously trigger cancellation of any operations that are running with
     * this session.
     *
     * The async variant is {@see SpannerClient::deleteSessionAsync()} .
     *
     * @example samples/V1/SpannerClient/delete_session.php
     *
     * @param DeleteSessionRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteSession(DeleteSessionRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('DeleteSession', $request, $callOptions)->wait();
    }

    /**
     * Executes a batch of SQL DML statements. This method allows many statements
     * to be run with lower latency than submitting them sequentially with
     * [ExecuteSql][google.spanner.v1.Spanner.ExecuteSql].
     *
     * Statements are executed in sequential order. A request can succeed even if
     * a statement fails. The
     * [ExecuteBatchDmlResponse.status][google.spanner.v1.ExecuteBatchDmlResponse.status]
     * field in the response provides information about the statement that failed.
     * Clients must inspect this field to determine whether an error occurred.
     *
     * Execution stops after the first failed statement; the remaining statements
     * are not executed.
     *
     * The async variant is {@see SpannerClient::executeBatchDmlAsync()} .
     *
     * @example samples/V1/SpannerClient/execute_batch_dml.php
     *
     * @param ExecuteBatchDmlRequest $request     A request to house fields associated with the call.
     * @param array                  $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return ExecuteBatchDmlResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function executeBatchDml(ExecuteBatchDmlRequest $request, array $callOptions = []): ExecuteBatchDmlResponse
    {
        return $this->startApiCall('ExecuteBatchDml', $request, $callOptions)->wait();
    }

    /**
     * Executes an SQL statement, returning all results in a single reply. This
     * method cannot be used to return a result set larger than 10 MiB;
     * if the query yields more data than that, the query fails with
     * a `FAILED_PRECONDITION` error.
     *
     * Operations inside read-write transactions might return `ABORTED`. If
     * this occurs, the application should restart the transaction from
     * the beginning. See [Transaction][google.spanner.v1.Transaction] for more
     * details.
     *
     * Larger result sets can be fetched in streaming fashion by calling
     * [ExecuteStreamingSql][google.spanner.v1.Spanner.ExecuteStreamingSql]
     * instead.
     *
     * The async variant is {@see SpannerClient::executeSqlAsync()} .
     *
     * @example samples/V1/SpannerClient/execute_sql.php
     *
     * @param ExecuteSqlRequest $request     A request to house fields associated with the call.
     * @param array             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return ResultSet
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function executeSql(ExecuteSqlRequest $request, array $callOptions = []): ResultSet
    {
        return $this->startApiCall('ExecuteSql', $request, $callOptions)->wait();
    }

    /**
     * Like [ExecuteSql][google.spanner.v1.Spanner.ExecuteSql], except returns the
     * result set as a stream. Unlike
     * [ExecuteSql][google.spanner.v1.Spanner.ExecuteSql], there is no limit on
     * the size of the returned result set. However, no individual row in the
     * result set can exceed 100 MiB, and no column value can exceed 10 MiB.
     *
     * @example samples/V1/SpannerClient/execute_streaming_sql.php
     *
     * @param ExecuteSqlRequest $request     A request to house fields associated with the call.
     * @param array             $callOptions {
     *     Optional.
     *
     *     @type int $timeoutMillis
     *           Timeout to use for this call.
     * }
     *
     * @return ServerStream
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function executeStreamingSql(ExecuteSqlRequest $request, array $callOptions = []): ServerStream
    {
        return $this->startApiCall('ExecuteStreamingSql', $request, $callOptions);
    }

    /**
     * Gets a session. Returns `NOT_FOUND` if the session does not exist.
     * This is mainly useful for determining whether a session is still
     * alive.
     *
     * The async variant is {@see SpannerClient::getSessionAsync()} .
     *
     * @example samples/V1/SpannerClient/get_session.php
     *
     * @param GetSessionRequest $request     A request to house fields associated with the call.
     * @param array             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Session
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getSession(GetSessionRequest $request, array $callOptions = []): Session
    {
        return $this->startApiCall('GetSession', $request, $callOptions)->wait();
    }

    /**
     * Lists all sessions in a given database.
     *
     * The async variant is {@see SpannerClient::listSessionsAsync()} .
     *
     * @example samples/V1/SpannerClient/list_sessions.php
     *
     * @param ListSessionsRequest $request     A request to house fields associated with the call.
     * @param array               $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listSessions(ListSessionsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListSessions', $request, $callOptions);
    }

    /**
     * Creates a set of partition tokens that can be used to execute a query
     * operation in parallel.  Each of the returned partition tokens can be used
     * by [ExecuteStreamingSql][google.spanner.v1.Spanner.ExecuteStreamingSql] to
     * specify a subset of the query result to read.  The same session and
     * read-only transaction must be used by the PartitionQueryRequest used to
     * create the partition tokens and the ExecuteSqlRequests that use the
     * partition tokens.
     *
     * Partition tokens become invalid when the session used to create them
     * is deleted, is idle for too long, begins a new transaction, or becomes too
     * old.  When any of these happen, it is not possible to resume the query, and
     * the whole operation must be restarted from the beginning.
     *
     * The async variant is {@see SpannerClient::partitionQueryAsync()} .
     *
     * @example samples/V1/SpannerClient/partition_query.php
     *
     * @param PartitionQueryRequest $request     A request to house fields associated with the call.
     * @param array                 $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PartitionResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function partitionQuery(PartitionQueryRequest $request, array $callOptions = []): PartitionResponse
    {
        return $this->startApiCall('PartitionQuery', $request, $callOptions)->wait();
    }

    /**
     * Creates a set of partition tokens that can be used to execute a read
     * operation in parallel.  Each of the returned partition tokens can be used
     * by [StreamingRead][google.spanner.v1.Spanner.StreamingRead] to specify a
     * subset of the read result to read.  The same session and read-only
     * transaction must be used by the PartitionReadRequest used to create the
     * partition tokens and the ReadRequests that use the partition tokens.  There
     * are no ordering guarantees on rows returned among the returned partition
     * tokens, or even within each individual StreamingRead call issued with a
     * partition_token.
     *
     * Partition tokens become invalid when the session used to create them
     * is deleted, is idle for too long, begins a new transaction, or becomes too
     * old.  When any of these happen, it is not possible to resume the read, and
     * the whole operation must be restarted from the beginning.
     *
     * The async variant is {@see SpannerClient::partitionReadAsync()} .
     *
     * @example samples/V1/SpannerClient/partition_read.php
     *
     * @param PartitionReadRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PartitionResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function partitionRead(PartitionReadRequest $request, array $callOptions = []): PartitionResponse
    {
        return $this->startApiCall('PartitionRead', $request, $callOptions)->wait();
    }

    /**
     * Reads rows from the database using key lookups and scans, as a
     * simple key/value style alternative to
     * [ExecuteSql][google.spanner.v1.Spanner.ExecuteSql].  This method cannot be
     * used to return a result set larger than 10 MiB; if the read matches more
     * data than that, the read fails with a `FAILED_PRECONDITION`
     * error.
     *
     * Reads inside read-write transactions might return `ABORTED`. If
     * this occurs, the application should restart the transaction from
     * the beginning. See [Transaction][google.spanner.v1.Transaction] for more
     * details.
     *
     * Larger result sets can be yielded in streaming fashion by calling
     * [StreamingRead][google.spanner.v1.Spanner.StreamingRead] instead.
     *
     * The async variant is {@see SpannerClient::readAsync()} .
     *
     * @example samples/V1/SpannerClient/read.php
     *
     * @param ReadRequest $request     A request to house fields associated with the call.
     * @param array       $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return ResultSet
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function read(ReadRequest $request, array $callOptions = []): ResultSet
    {
        return $this->startApiCall('Read', $request, $callOptions)->wait();
    }

    /**
     * Rolls back a transaction, releasing any locks it holds. It is a good
     * idea to call this for any transaction that includes one or more
     * [Read][google.spanner.v1.Spanner.Read] or
     * [ExecuteSql][google.spanner.v1.Spanner.ExecuteSql] requests and ultimately
     * decides not to commit.
     *
     * `Rollback` returns `OK` if it successfully aborts the transaction, the
     * transaction was already aborted, or the transaction is not
     * found. `Rollback` never returns `ABORTED`.
     *
     * The async variant is {@see SpannerClient::rollbackAsync()} .
     *
     * @example samples/V1/SpannerClient/rollback.php
     *
     * @param RollbackRequest $request     A request to house fields associated with the call.
     * @param array           $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function rollback(RollbackRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('Rollback', $request, $callOptions)->wait();
    }

    /**
     * Like [Read][google.spanner.v1.Spanner.Read], except returns the result set
     * as a stream. Unlike [Read][google.spanner.v1.Spanner.Read], there is no
     * limit on the size of the returned result set. However, no individual row in
     * the result set can exceed 100 MiB, and no column value can exceed
     * 10 MiB.
     *
     * @example samples/V1/SpannerClient/streaming_read.php
     *
     * @param ReadRequest $request     A request to house fields associated with the call.
     * @param array       $callOptions {
     *     Optional.
     *
     *     @type int $timeoutMillis
     *           Timeout to use for this call.
     * }
     *
     * @return ServerStream
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function streamingRead(ReadRequest $request, array $callOptions = []): ServerStream
    {
        return $this->startApiCall('StreamingRead', $request, $callOptions);
    }

    /** Configure the gapic configuration to use a service emulator. */
    private function setDefaultEmulatorConfig(array $options): array
    {
        $emulatorHost = getenv('SPANNER_EMULATOR_HOST');
        if (empty($emulatorHost)) {
            return $options;
        }

        if ($scheme = parse_url($emulatorHost, PHP_URL_SCHEME)) {
            $search = $scheme . '://';
            $emulatorHost = str_replace($search, '', $emulatorHost);
        }

        $options['apiEndpoint'] ??= $emulatorHost;
        if (class_exists(ChannelCredentials::class)) {
            $options['transportConfig']['grpc']['stubOpts']['credentials'] ??= ChannelCredentials::createInsecure();
        }

        $options['credentials'] ??= new InsecureCredentialsWrapper();
        return $options;
    }
}
