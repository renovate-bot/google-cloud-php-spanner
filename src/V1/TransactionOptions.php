<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/spanner/v1/transaction.proto

namespace Google\Cloud\Spanner\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Transactions:
 * Each session can have at most one active transaction at a time (note that
 * standalone reads and queries use a transaction internally and do count
 * towards the one transaction limit). After the active transaction is
 * completed, the session can immediately be re-used for the next transaction.
 * It is not necessary to create a new session for each transaction.
 * Transaction modes:
 * Cloud Spanner supports three transaction modes:
 *   1. Locking read-write. This type of transaction is the only way
 *      to write data into Cloud Spanner. These transactions rely on
 *      pessimistic locking and, if necessary, two-phase commit.
 *      Locking read-write transactions may abort, requiring the
 *      application to retry.
 *   2. Snapshot read-only. Snapshot read-only transactions provide guaranteed
 *      consistency across several reads, but do not allow
 *      writes. Snapshot read-only transactions can be configured to read at
 *      timestamps in the past, or configured to perform a strong read
 *      (where Spanner will select a timestamp such that the read is
 *      guaranteed to see the effects of all transactions that have committed
 *      before the start of the read). Snapshot read-only transactions do not
 *      need to be committed.
 *      Queries on change streams must be performed with the snapshot read-only
 *      transaction mode, specifying a strong read. Please see
 *      [TransactionOptions.ReadOnly.strong][google.spanner.v1.TransactionOptions.ReadOnly.strong] for more details.
 *   3. Partitioned DML. This type of transaction is used to execute
 *      a single Partitioned DML statement. Partitioned DML partitions
 *      the key space and runs the DML statement over each partition
 *      in parallel using separate, internal transactions that commit
 *      independently. Partitioned DML transactions do not need to be
 *      committed.
 * For transactions that only read, snapshot read-only transactions
 * provide simpler semantics and are almost always faster. In
 * particular, read-only transactions do not take locks, so they do
 * not conflict with read-write transactions. As a consequence of not
 * taking locks, they also do not abort, so retry loops are not needed.
 * Transactions may only read-write data in a single database. They
 * may, however, read-write data in different tables within that
 * database.
 * Locking read-write transactions:
 * Locking transactions may be used to atomically read-modify-write
 * data anywhere in a database. This type of transaction is externally
 * consistent.
 * Clients should attempt to minimize the amount of time a transaction
 * is active. Faster transactions commit with higher probability
 * and cause less contention. Cloud Spanner attempts to keep read locks
 * active as long as the transaction continues to do reads, and the
 * transaction has not been terminated by
 * [Commit][google.spanner.v1.Spanner.Commit] or
 * [Rollback][google.spanner.v1.Spanner.Rollback]. Long periods of
 * inactivity at the client may cause Cloud Spanner to release a
 * transaction's locks and abort it.
 * Conceptually, a read-write transaction consists of zero or more
 * reads or SQL statements followed by
 * [Commit][google.spanner.v1.Spanner.Commit]. At any time before
 * [Commit][google.spanner.v1.Spanner.Commit], the client can send a
 * [Rollback][google.spanner.v1.Spanner.Rollback] request to abort the
 * transaction.
 * Semantics:
 * Cloud Spanner can commit the transaction if all read locks it acquired
 * are still valid at commit time, and it is able to acquire write
 * locks for all writes. Cloud Spanner can abort the transaction for any
 * reason. If a commit attempt returns `ABORTED`, Cloud Spanner guarantees
 * that the transaction has not modified any user data in Cloud Spanner.
 * Unless the transaction commits, Cloud Spanner makes no guarantees about
 * how long the transaction's locks were held for. It is an error to
 * use Cloud Spanner locks for any sort of mutual exclusion other than
 * between Cloud Spanner transactions themselves.
 * Retrying aborted transactions:
 * When a transaction aborts, the application can choose to retry the
 * whole transaction again. To maximize the chances of successfully
 * committing the retry, the client should execute the retry in the
 * same session as the original attempt. The original session's lock
 * priority increases with each consecutive abort, meaning that each
 * attempt has a slightly better chance of success than the previous.
 * Under some circumstances (for example, many transactions attempting to
 * modify the same row(s)), a transaction can abort many times in a
 * short period before successfully committing. Thus, it is not a good
 * idea to cap the number of retries a transaction can attempt;
 * instead, it is better to limit the total amount of time spent
 * retrying.
 * Idle transactions:
 * A transaction is considered idle if it has no outstanding reads or
 * SQL queries and has not started a read or SQL query within the last 10
 * seconds. Idle transactions can be aborted by Cloud Spanner so that they
 * don't hold on to locks indefinitely. If an idle transaction is aborted, the
 * commit will fail with error `ABORTED`.
 * If this behavior is undesirable, periodically executing a simple
 * SQL query in the transaction (for example, `SELECT 1`) prevents the
 * transaction from becoming idle.
 * Snapshot read-only transactions:
 * Snapshot read-only transactions provides a simpler method than
 * locking read-write transactions for doing several consistent
 * reads. However, this type of transaction does not support writes.
 * Snapshot transactions do not take locks. Instead, they work by
 * choosing a Cloud Spanner timestamp, then executing all reads at that
 * timestamp. Since they do not acquire locks, they do not block
 * concurrent read-write transactions.
 * Unlike locking read-write transactions, snapshot read-only
 * transactions never abort. They can fail if the chosen read
 * timestamp is garbage collected; however, the default garbage
 * collection policy is generous enough that most applications do not
 * need to worry about this in practice.
 * Snapshot read-only transactions do not need to call
 * [Commit][google.spanner.v1.Spanner.Commit] or
 * [Rollback][google.spanner.v1.Spanner.Rollback] (and in fact are not
 * permitted to do so).
 * To execute a snapshot transaction, the client specifies a timestamp
 * bound, which tells Cloud Spanner how to choose a read timestamp.
 * The types of timestamp bound are:
 *   - Strong (the default).
 *   - Bounded staleness.
 *   - Exact staleness.
 * If the Cloud Spanner database to be read is geographically distributed,
 * stale read-only transactions can execute more quickly than strong
 * or read-write transactions, because they are able to execute far
 * from the leader replica.
 * Each type of timestamp bound is discussed in detail below.
 * Strong: Strong reads are guaranteed to see the effects of all transactions
 * that have committed before the start of the read. Furthermore, all
 * rows yielded by a single read are consistent with each other -- if
 * any part of the read observes a transaction, all parts of the read
 * see the transaction.
 * Strong reads are not repeatable: two consecutive strong read-only
 * transactions might return inconsistent results if there are
 * concurrent writes. If consistency across reads is required, the
 * reads should be executed within a transaction or at an exact read
 * timestamp.
 * Queries on change streams (see below for more details) must also specify
 * the strong read timestamp bound.
 * See [TransactionOptions.ReadOnly.strong][google.spanner.v1.TransactionOptions.ReadOnly.strong].
 * Exact staleness:
 * These timestamp bounds execute reads at a user-specified
 * timestamp. Reads at a timestamp are guaranteed to see a consistent
 * prefix of the global transaction history: they observe
 * modifications done by all transactions with a commit timestamp less than or
 * equal to the read timestamp, and observe none of the modifications done by
 * transactions with a larger commit timestamp. They will block until
 * all conflicting transactions that may be assigned commit timestamps
 * <= the read timestamp have finished.
 * The timestamp can either be expressed as an absolute Cloud Spanner commit
 * timestamp or a staleness relative to the current time.
 * These modes do not require a "negotiation phase" to pick a
 * timestamp. As a result, they execute slightly faster than the
 * equivalent boundedly stale concurrency modes. On the other hand,
 * boundedly stale reads usually return fresher results.
 * See [TransactionOptions.ReadOnly.read_timestamp][google.spanner.v1.TransactionOptions.ReadOnly.read_timestamp] and
 * [TransactionOptions.ReadOnly.exact_staleness][google.spanner.v1.TransactionOptions.ReadOnly.exact_staleness].
 * Bounded staleness:
 * Bounded staleness modes allow Cloud Spanner to pick the read timestamp,
 * subject to a user-provided staleness bound. Cloud Spanner chooses the
 * newest timestamp within the staleness bound that allows execution
 * of the reads at the closest available replica without blocking.
 * All rows yielded are consistent with each other -- if any part of
 * the read observes a transaction, all parts of the read see the
 * transaction. Boundedly stale reads are not repeatable: two stale
 * reads, even if they use the same staleness bound, can execute at
 * different timestamps and thus return inconsistent results.
 * Boundedly stale reads execute in two phases: the first phase
 * negotiates a timestamp among all replicas needed to serve the
 * read. In the second phase, reads are executed at the negotiated
 * timestamp.
 * As a result of the two phase execution, bounded staleness reads are
 * usually a little slower than comparable exact staleness
 * reads. However, they are typically able to return fresher
 * results, and are more likely to execute at the closest replica.
 * Because the timestamp negotiation requires up-front knowledge of
 * which rows will be read, it can only be used with single-use
 * read-only transactions.
 * See [TransactionOptions.ReadOnly.max_staleness][google.spanner.v1.TransactionOptions.ReadOnly.max_staleness] and
 * [TransactionOptions.ReadOnly.min_read_timestamp][google.spanner.v1.TransactionOptions.ReadOnly.min_read_timestamp].
 * Old read timestamps and garbage collection:
 * Cloud Spanner continuously garbage collects deleted and overwritten data
 * in the background to reclaim storage space. This process is known
 * as "version GC". By default, version GC reclaims versions after they
 * are one hour old. Because of this, Cloud Spanner cannot perform reads
 * at read timestamps more than one hour in the past. This
 * restriction also applies to in-progress reads and/or SQL queries whose
 * timestamp become too old while executing. Reads and SQL queries with
 * too-old read timestamps fail with the error `FAILED_PRECONDITION`.
 * You can configure and extend the `VERSION_RETENTION_PERIOD` of a
 * database up to a period as long as one week, which allows Cloud Spanner
 * to perform reads up to one week in the past.
 * Querying change Streams:
 * A Change Stream is a schema object that can be configured to watch data
 * changes on the entire database, a set of tables, or a set of columns
 * in a database.
 * When a change stream is created, Spanner automatically defines a
 * corresponding SQL Table-Valued Function (TVF) that can be used to query
 * the change records in the associated change stream using the
 * ExecuteStreamingSql API. The name of the TVF for a change stream is
 * generated from the name of the change stream: READ_<change_stream_name>.
 * All queries on change stream TVFs must be executed using the
 * ExecuteStreamingSql API with a single-use read-only transaction with a
 * strong read-only timestamp_bound. The change stream TVF allows users to
 * specify the start_timestamp and end_timestamp for the time range of
 * interest. All change records within the retention period is accessible
 * using the strong read-only timestamp_bound. All other TransactionOptions
 * are invalid for change stream queries.
 * In addition, if TransactionOptions.read_only.return_read_timestamp is set
 * to true, a special value of 2^63 - 2 will be returned in the
 * [Transaction][google.spanner.v1.Transaction] message that describes the
 * transaction, instead of a valid read timestamp. This special value should be
 * discarded and not used for any subsequent queries.
 * Please see https://cloud.google.com/spanner/docs/change-streams
 * for more details on how to query the change stream TVFs.
 * Partitioned DML transactions:
 * Partitioned DML transactions are used to execute DML statements with a
 * different execution strategy that provides different, and often better,
 * scalability properties for large, table-wide operations than DML in a
 * ReadWrite transaction. Smaller scoped statements, such as an OLTP workload,
 * should prefer using ReadWrite transactions.
 * Partitioned DML partitions the keyspace and runs the DML statement on each
 * partition in separate, internal transactions. These transactions commit
 * automatically when complete, and run independently from one another.
 * To reduce lock contention, this execution strategy only acquires read locks
 * on rows that match the WHERE clause of the statement. Additionally, the
 * smaller per-partition transactions hold locks for less time.
 * That said, Partitioned DML is not a drop-in replacement for standard DML used
 * in ReadWrite transactions.
 *  - The DML statement must be fully-partitionable. Specifically, the statement
 *    must be expressible as the union of many statements which each access only
 *    a single row of the table.
 *  - The statement is not applied atomically to all rows of the table. Rather,
 *    the statement is applied atomically to partitions of the table, in
 *    independent transactions. Secondary index rows are updated atomically
 *    with the base table rows.
 *  - Partitioned DML does not guarantee exactly-once execution semantics
 *    against a partition. The statement will be applied at least once to each
 *    partition. It is strongly recommended that the DML statement should be
 *    idempotent to avoid unexpected results. For instance, it is potentially
 *    dangerous to run a statement such as
 *    `UPDATE table SET column = column + 1` as it could be run multiple times
 *    against some rows.
 *  - The partitions are committed automatically - there is no support for
 *    Commit or Rollback. If the call returns an error, or if the client issuing
 *    the ExecuteSql call dies, it is possible that some rows had the statement
 *    executed on them successfully. It is also possible that statement was
 *    never executed against other rows.
 *  - Partitioned DML transactions may only contain the execution of a single
 *    DML statement via ExecuteSql or ExecuteStreamingSql.
 *  - If any error is encountered during the execution of the partitioned DML
 *    operation (for instance, a UNIQUE INDEX violation, division by zero, or a
 *    value that cannot be stored due to schema constraints), then the
 *    operation is stopped at that point and an error is returned. It is
 *    possible that at this point, some partitions have been committed (or even
 *    committed multiple times), and other partitions have not been run at all.
 * Given the above, Partitioned DML is good fit for large, database-wide,
 * operations that are idempotent, such as deleting old rows from a very large
 * table.
 *
 * Generated from protobuf message <code>google.spanner.v1.TransactionOptions</code>
 */
class TransactionOptions extends \Google\Protobuf\Internal\Message
{
    protected $mode;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Spanner\V1\TransactionOptions\ReadWrite $read_write
     *           Transaction may write.
     *           Authorization to begin a read-write transaction requires
     *           `spanner.databases.beginOrRollbackReadWriteTransaction` permission
     *           on the `session` resource.
     *     @type \Google\Cloud\Spanner\V1\TransactionOptions\PartitionedDml $partitioned_dml
     *           Partitioned DML transaction.
     *           Authorization to begin a Partitioned DML transaction requires
     *           `spanner.databases.beginPartitionedDmlTransaction` permission
     *           on the `session` resource.
     *     @type \Google\Cloud\Spanner\V1\TransactionOptions\PBReadOnly $read_only
     *           Transaction will not write.
     *           Authorization to begin a read-only transaction requires
     *           `spanner.databases.beginReadOnlyTransaction` permission
     *           on the `session` resource.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Spanner\V1\Transaction::initOnce();
        parent::__construct($data);
    }

    /**
     * Transaction may write.
     * Authorization to begin a read-write transaction requires
     * `spanner.databases.beginOrRollbackReadWriteTransaction` permission
     * on the `session` resource.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionOptions.ReadWrite read_write = 1;</code>
     * @return \Google\Cloud\Spanner\V1\TransactionOptions\ReadWrite|null
     */
    public function getReadWrite()
    {
        return $this->readOneof(1);
    }

    public function hasReadWrite()
    {
        return $this->hasOneof(1);
    }

    /**
     * Transaction may write.
     * Authorization to begin a read-write transaction requires
     * `spanner.databases.beginOrRollbackReadWriteTransaction` permission
     * on the `session` resource.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionOptions.ReadWrite read_write = 1;</code>
     * @param \Google\Cloud\Spanner\V1\TransactionOptions\ReadWrite $var
     * @return $this
     */
    public function setReadWrite($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Spanner\V1\TransactionOptions\ReadWrite::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Partitioned DML transaction.
     * Authorization to begin a Partitioned DML transaction requires
     * `spanner.databases.beginPartitionedDmlTransaction` permission
     * on the `session` resource.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionOptions.PartitionedDml partitioned_dml = 3;</code>
     * @return \Google\Cloud\Spanner\V1\TransactionOptions\PartitionedDml|null
     */
    public function getPartitionedDml()
    {
        return $this->readOneof(3);
    }

    public function hasPartitionedDml()
    {
        return $this->hasOneof(3);
    }

    /**
     * Partitioned DML transaction.
     * Authorization to begin a Partitioned DML transaction requires
     * `spanner.databases.beginPartitionedDmlTransaction` permission
     * on the `session` resource.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionOptions.PartitionedDml partitioned_dml = 3;</code>
     * @param \Google\Cloud\Spanner\V1\TransactionOptions\PartitionedDml $var
     * @return $this
     */
    public function setPartitionedDml($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Spanner\V1\TransactionOptions\PartitionedDml::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Transaction will not write.
     * Authorization to begin a read-only transaction requires
     * `spanner.databases.beginReadOnlyTransaction` permission
     * on the `session` resource.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionOptions.ReadOnly read_only = 2;</code>
     * @return \Google\Cloud\Spanner\V1\TransactionOptions\PBReadOnly|null
     */
    public function getReadOnly()
    {
        return $this->readOneof(2);
    }

    public function hasReadOnly()
    {
        return $this->hasOneof(2);
    }

    /**
     * Transaction will not write.
     * Authorization to begin a read-only transaction requires
     * `spanner.databases.beginReadOnlyTransaction` permission
     * on the `session` resource.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionOptions.ReadOnly read_only = 2;</code>
     * @param \Google\Cloud\Spanner\V1\TransactionOptions\PBReadOnly $var
     * @return $this
     */
    public function setReadOnly($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Spanner\V1\TransactionOptions\PBReadOnly::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->whichOneof("mode");
    }

}

