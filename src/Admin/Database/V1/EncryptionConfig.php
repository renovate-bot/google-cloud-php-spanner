<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/spanner/admin/database/v1/common.proto

namespace Google\Cloud\Spanner\Admin\Database\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Encryption configuration for a Cloud Spanner database.
 *
 * Generated from protobuf message <code>google.spanner.admin.database.v1.EncryptionConfig</code>
 */
class EncryptionConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * The Cloud KMS key to be used for encrypting and decrypting
     * the database. Values are of the form
     * `projects/<project>/locations/<location>/keyRings/<key_ring>/cryptoKeys/<kms_key_name>`.
     *
     * Generated from protobuf field <code>string kms_key_name = 2 [(.google.api.resource_reference) = {</code>
     */
    private $kms_key_name = '';
    /**
     * Specifies the KMS configuration for the one or more keys used to encrypt
     * the database. Values are of the form
     * `projects/<project>/locations/<location>/keyRings/<key_ring>/cryptoKeys/<kms_key_name>`.
     * The keys referenced by kms_key_names must fully cover all
     * regions of the database instance configuration. Some examples:
     * * For single region database instance configs, specify a single regional
     * location KMS key.
     * * For multi-regional database instance configs of type GOOGLE_MANAGED,
     * either specify a multi-regional location KMS key or multiple regional
     * location KMS keys that cover all regions in the instance config.
     * * For a database instance config of type USER_MANAGED, please specify only
     * regional location KMS keys to cover each region in the instance config.
     * Multi-regional location KMS keys are not supported for USER_MANAGED
     * instance configs.
     *
     * Generated from protobuf field <code>repeated string kms_key_names = 3 [(.google.api.resource_reference) = {</code>
     */
    private $kms_key_names;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $kms_key_name
     *           The Cloud KMS key to be used for encrypting and decrypting
     *           the database. Values are of the form
     *           `projects/<project>/locations/<location>/keyRings/<key_ring>/cryptoKeys/<kms_key_name>`.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $kms_key_names
     *           Specifies the KMS configuration for the one or more keys used to encrypt
     *           the database. Values are of the form
     *           `projects/<project>/locations/<location>/keyRings/<key_ring>/cryptoKeys/<kms_key_name>`.
     *           The keys referenced by kms_key_names must fully cover all
     *           regions of the database instance configuration. Some examples:
     *           * For single region database instance configs, specify a single regional
     *           location KMS key.
     *           * For multi-regional database instance configs of type GOOGLE_MANAGED,
     *           either specify a multi-regional location KMS key or multiple regional
     *           location KMS keys that cover all regions in the instance config.
     *           * For a database instance config of type USER_MANAGED, please specify only
     *           regional location KMS keys to cover each region in the instance config.
     *           Multi-regional location KMS keys are not supported for USER_MANAGED
     *           instance configs.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Spanner\Admin\Database\V1\Common::initOnce();
        parent::__construct($data);
    }

    /**
     * The Cloud KMS key to be used for encrypting and decrypting
     * the database. Values are of the form
     * `projects/<project>/locations/<location>/keyRings/<key_ring>/cryptoKeys/<kms_key_name>`.
     *
     * Generated from protobuf field <code>string kms_key_name = 2 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getKmsKeyName()
    {
        return $this->kms_key_name;
    }

    /**
     * The Cloud KMS key to be used for encrypting and decrypting
     * the database. Values are of the form
     * `projects/<project>/locations/<location>/keyRings/<key_ring>/cryptoKeys/<kms_key_name>`.
     *
     * Generated from protobuf field <code>string kms_key_name = 2 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setKmsKeyName($var)
    {
        GPBUtil::checkString($var, True);
        $this->kms_key_name = $var;

        return $this;
    }

    /**
     * Specifies the KMS configuration for the one or more keys used to encrypt
     * the database. Values are of the form
     * `projects/<project>/locations/<location>/keyRings/<key_ring>/cryptoKeys/<kms_key_name>`.
     * The keys referenced by kms_key_names must fully cover all
     * regions of the database instance configuration. Some examples:
     * * For single region database instance configs, specify a single regional
     * location KMS key.
     * * For multi-regional database instance configs of type GOOGLE_MANAGED,
     * either specify a multi-regional location KMS key or multiple regional
     * location KMS keys that cover all regions in the instance config.
     * * For a database instance config of type USER_MANAGED, please specify only
     * regional location KMS keys to cover each region in the instance config.
     * Multi-regional location KMS keys are not supported for USER_MANAGED
     * instance configs.
     *
     * Generated from protobuf field <code>repeated string kms_key_names = 3 [(.google.api.resource_reference) = {</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getKmsKeyNames()
    {
        return $this->kms_key_names;
    }

    /**
     * Specifies the KMS configuration for the one or more keys used to encrypt
     * the database. Values are of the form
     * `projects/<project>/locations/<location>/keyRings/<key_ring>/cryptoKeys/<kms_key_name>`.
     * The keys referenced by kms_key_names must fully cover all
     * regions of the database instance configuration. Some examples:
     * * For single region database instance configs, specify a single regional
     * location KMS key.
     * * For multi-regional database instance configs of type GOOGLE_MANAGED,
     * either specify a multi-regional location KMS key or multiple regional
     * location KMS keys that cover all regions in the instance config.
     * * For a database instance config of type USER_MANAGED, please specify only
     * regional location KMS keys to cover each region in the instance config.
     * Multi-regional location KMS keys are not supported for USER_MANAGED
     * instance configs.
     *
     * Generated from protobuf field <code>repeated string kms_key_names = 3 [(.google.api.resource_reference) = {</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setKmsKeyNames($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->kms_key_names = $arr;

        return $this;
    }

}

