<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/spanner/admin/instance/v1/spanner_instance_admin.proto

namespace Google\Cloud\Spanner\Admin\Instance\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An isolated set of Cloud Spanner resources that databases can define
 * placements on.
 *
 * Generated from protobuf message <code>google.spanner.admin.instance.v1.InstancePartition</code>
 */
class InstancePartition extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. A unique identifier for the instance partition. Values are of the
     * form
     * `projects/<project>/instances/<instance>/instancePartitions/[a-z][-a-z0-9]*[a-z0-9]`.
     * The final segment of the name must be between 2 and 64 characters in
     * length. An instance partition's name cannot be changed after the instance
     * partition is created.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $name = '';
    /**
     * Required. The name of the instance partition's configuration. Values are of
     * the form `projects/<project>/instanceConfigs/<configuration>`. See also
     * [InstanceConfig][google.spanner.admin.instance.v1.InstanceConfig] and
     * [ListInstanceConfigs][google.spanner.admin.instance.v1.InstanceAdmin.ListInstanceConfigs].
     *
     * Generated from protobuf field <code>string config = 2 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $config = '';
    /**
     * Required. The descriptive name for this instance partition as it appears in
     * UIs. Must be unique per project and between 4 and 30 characters in length.
     *
     * Generated from protobuf field <code>string display_name = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $display_name = '';
    /**
     * Output only. The current instance partition state.
     *
     * Generated from protobuf field <code>.google.spanner.admin.instance.v1.InstancePartition.State state = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state = 0;
    /**
     * Output only. The time at which the instance partition was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. The time at which the instance partition was most recently
     * updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * Output only. The names of the databases that reference this
     * instance partition. Referencing databases should share the parent instance.
     * The existence of any referencing database prevents the instance partition
     * from being deleted.
     *
     * Generated from protobuf field <code>repeated string referencing_databases = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $referencing_databases;
    /**
     * Output only. The names of the backups that reference this instance
     * partition. Referencing backups should share the parent instance. The
     * existence of any referencing backup prevents the instance partition from
     * being deleted.
     *
     * Generated from protobuf field <code>repeated string referencing_backups = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $referencing_backups;
    /**
     * Used for optimistic concurrency control as a way
     * to help prevent simultaneous updates of a instance partition from
     * overwriting each other. It is strongly suggested that systems make use of
     * the etag in the read-modify-write cycle to perform instance partition
     * updates in order to avoid race conditions: An etag is returned in the
     * response which contains instance partitions, and systems are expected to
     * put that etag in the request to update instance partitions to ensure that
     * their change will be applied to the same version of the instance partition.
     * If no etag is provided in the call to update instance partition, then the
     * existing instance partition is overwritten blindly.
     *
     * Generated from protobuf field <code>string etag = 12;</code>
     */
    private $etag = '';
    protected $compute_capacity;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. A unique identifier for the instance partition. Values are of the
     *           form
     *           `projects/<project>/instances/<instance>/instancePartitions/[a-z][-a-z0-9]*[a-z0-9]`.
     *           The final segment of the name must be between 2 and 64 characters in
     *           length. An instance partition's name cannot be changed after the instance
     *           partition is created.
     *     @type string $config
     *           Required. The name of the instance partition's configuration. Values are of
     *           the form `projects/<project>/instanceConfigs/<configuration>`. See also
     *           [InstanceConfig][google.spanner.admin.instance.v1.InstanceConfig] and
     *           [ListInstanceConfigs][google.spanner.admin.instance.v1.InstanceAdmin.ListInstanceConfigs].
     *     @type string $display_name
     *           Required. The descriptive name for this instance partition as it appears in
     *           UIs. Must be unique per project and between 4 and 30 characters in length.
     *     @type int $node_count
     *           The number of nodes allocated to this instance partition.
     *           Users can set the node_count field to specify the target number of nodes
     *           allocated to the instance partition.
     *           This may be zero in API responses for instance partitions that are not
     *           yet in state `READY`.
     *     @type int $processing_units
     *           The number of processing units allocated to this instance partition.
     *           Users can set the processing_units field to specify the target number of
     *           processing units allocated to the instance partition.
     *           This may be zero in API responses for instance partitions that are not
     *           yet in state `READY`.
     *     @type int $state
     *           Output only. The current instance partition state.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. The time at which the instance partition was created.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. The time at which the instance partition was most recently
     *           updated.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $referencing_databases
     *           Output only. The names of the databases that reference this
     *           instance partition. Referencing databases should share the parent instance.
     *           The existence of any referencing database prevents the instance partition
     *           from being deleted.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $referencing_backups
     *           Output only. The names of the backups that reference this instance
     *           partition. Referencing backups should share the parent instance. The
     *           existence of any referencing backup prevents the instance partition from
     *           being deleted.
     *     @type string $etag
     *           Used for optimistic concurrency control as a way
     *           to help prevent simultaneous updates of a instance partition from
     *           overwriting each other. It is strongly suggested that systems make use of
     *           the etag in the read-modify-write cycle to perform instance partition
     *           updates in order to avoid race conditions: An etag is returned in the
     *           response which contains instance partitions, and systems are expected to
     *           put that etag in the request to update instance partitions to ensure that
     *           their change will be applied to the same version of the instance partition.
     *           If no etag is provided in the call to update instance partition, then the
     *           existing instance partition is overwritten blindly.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Spanner\Admin\Instance\V1\SpannerInstanceAdmin::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. A unique identifier for the instance partition. Values are of the
     * form
     * `projects/<project>/instances/<instance>/instancePartitions/[a-z][-a-z0-9]*[a-z0-9]`.
     * The final segment of the name must be between 2 and 64 characters in
     * length. An instance partition's name cannot be changed after the instance
     * partition is created.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. A unique identifier for the instance partition. Values are of the
     * form
     * `projects/<project>/instances/<instance>/instancePartitions/[a-z][-a-z0-9]*[a-z0-9]`.
     * The final segment of the name must be between 2 and 64 characters in
     * length. An instance partition's name cannot be changed after the instance
     * partition is created.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Required. The name of the instance partition's configuration. Values are of
     * the form `projects/<project>/instanceConfigs/<configuration>`. See also
     * [InstanceConfig][google.spanner.admin.instance.v1.InstanceConfig] and
     * [ListInstanceConfigs][google.spanner.admin.instance.v1.InstanceAdmin.ListInstanceConfigs].
     *
     * Generated from protobuf field <code>string config = 2 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Required. The name of the instance partition's configuration. Values are of
     * the form `projects/<project>/instanceConfigs/<configuration>`. See also
     * [InstanceConfig][google.spanner.admin.instance.v1.InstanceConfig] and
     * [ListInstanceConfigs][google.spanner.admin.instance.v1.InstanceAdmin.ListInstanceConfigs].
     *
     * Generated from protobuf field <code>string config = 2 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setConfig($var)
    {
        GPBUtil::checkString($var, True);
        $this->config = $var;

        return $this;
    }

    /**
     * Required. The descriptive name for this instance partition as it appears in
     * UIs. Must be unique per project and between 4 and 30 characters in length.
     *
     * Generated from protobuf field <code>string display_name = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Required. The descriptive name for this instance partition as it appears in
     * UIs. Must be unique per project and between 4 and 30 characters in length.
     *
     * Generated from protobuf field <code>string display_name = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->display_name = $var;

        return $this;
    }

    /**
     * The number of nodes allocated to this instance partition.
     * Users can set the node_count field to specify the target number of nodes
     * allocated to the instance partition.
     * This may be zero in API responses for instance partitions that are not
     * yet in state `READY`.
     *
     * Generated from protobuf field <code>int32 node_count = 5;</code>
     * @return int
     */
    public function getNodeCount()
    {
        return $this->readOneof(5);
    }

    public function hasNodeCount()
    {
        return $this->hasOneof(5);
    }

    /**
     * The number of nodes allocated to this instance partition.
     * Users can set the node_count field to specify the target number of nodes
     * allocated to the instance partition.
     * This may be zero in API responses for instance partitions that are not
     * yet in state `READY`.
     *
     * Generated from protobuf field <code>int32 node_count = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setNodeCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * The number of processing units allocated to this instance partition.
     * Users can set the processing_units field to specify the target number of
     * processing units allocated to the instance partition.
     * This may be zero in API responses for instance partitions that are not
     * yet in state `READY`.
     *
     * Generated from protobuf field <code>int32 processing_units = 6;</code>
     * @return int
     */
    public function getProcessingUnits()
    {
        return $this->readOneof(6);
    }

    public function hasProcessingUnits()
    {
        return $this->hasOneof(6);
    }

    /**
     * The number of processing units allocated to this instance partition.
     * Users can set the processing_units field to specify the target number of
     * processing units allocated to the instance partition.
     * This may be zero in API responses for instance partitions that are not
     * yet in state `READY`.
     *
     * Generated from protobuf field <code>int32 processing_units = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setProcessingUnits($var)
    {
        GPBUtil::checkInt32($var);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Output only. The current instance partition state.
     *
     * Generated from protobuf field <code>.google.spanner.admin.instance.v1.InstancePartition.State state = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. The current instance partition state.
     *
     * Generated from protobuf field <code>.google.spanner.admin.instance.v1.InstancePartition.State state = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Spanner\Admin\Instance\V1\InstancePartition\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. The time at which the instance partition was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * Output only. The time at which the instance partition was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Output only. The time at which the instance partition was most recently
     * updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    public function hasUpdateTime()
    {
        return isset($this->update_time);
    }

    public function clearUpdateTime()
    {
        unset($this->update_time);
    }

    /**
     * Output only. The time at which the instance partition was most recently
     * updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * Output only. The names of the databases that reference this
     * instance partition. Referencing databases should share the parent instance.
     * The existence of any referencing database prevents the instance partition
     * from being deleted.
     *
     * Generated from protobuf field <code>repeated string referencing_databases = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getReferencingDatabases()
    {
        return $this->referencing_databases;
    }

    /**
     * Output only. The names of the databases that reference this
     * instance partition. Referencing databases should share the parent instance.
     * The existence of any referencing database prevents the instance partition
     * from being deleted.
     *
     * Generated from protobuf field <code>repeated string referencing_databases = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setReferencingDatabases($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->referencing_databases = $arr;

        return $this;
    }

    /**
     * Output only. The names of the backups that reference this instance
     * partition. Referencing backups should share the parent instance. The
     * existence of any referencing backup prevents the instance partition from
     * being deleted.
     *
     * Generated from protobuf field <code>repeated string referencing_backups = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getReferencingBackups()
    {
        return $this->referencing_backups;
    }

    /**
     * Output only. The names of the backups that reference this instance
     * partition. Referencing backups should share the parent instance. The
     * existence of any referencing backup prevents the instance partition from
     * being deleted.
     *
     * Generated from protobuf field <code>repeated string referencing_backups = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setReferencingBackups($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->referencing_backups = $arr;

        return $this;
    }

    /**
     * Used for optimistic concurrency control as a way
     * to help prevent simultaneous updates of a instance partition from
     * overwriting each other. It is strongly suggested that systems make use of
     * the etag in the read-modify-write cycle to perform instance partition
     * updates in order to avoid race conditions: An etag is returned in the
     * response which contains instance partitions, and systems are expected to
     * put that etag in the request to update instance partitions to ensure that
     * their change will be applied to the same version of the instance partition.
     * If no etag is provided in the call to update instance partition, then the
     * existing instance partition is overwritten blindly.
     *
     * Generated from protobuf field <code>string etag = 12;</code>
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Used for optimistic concurrency control as a way
     * to help prevent simultaneous updates of a instance partition from
     * overwriting each other. It is strongly suggested that systems make use of
     * the etag in the read-modify-write cycle to perform instance partition
     * updates in order to avoid race conditions: An etag is returned in the
     * response which contains instance partitions, and systems are expected to
     * put that etag in the request to update instance partitions to ensure that
     * their change will be applied to the same version of the instance partition.
     * If no etag is provided in the call to update instance partition, then the
     * existing instance partition is overwritten blindly.
     *
     * Generated from protobuf field <code>string etag = 12;</code>
     * @param string $var
     * @return $this
     */
    public function setEtag($var)
    {
        GPBUtil::checkString($var, True);
        $this->etag = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getComputeCapacity()
    {
        return $this->whichOneof("compute_capacity");
    }

}

