<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# NO CHECKED-IN PROTOBUF GENCODE
# source: data/user.proto

namespace GPBMetadata\Data;

class User
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            "\x0A\xD6\x01\x0A\x0Fdata/user.proto\x12\x0Ctesting.data\"\x85\x01\x0A\x04User\x12\x0A\x0A\x02id\x18\x01 \x01(\x03\x12\x0C\x0A\x04name\x18\x02 \x01(\x09\x12\x0E\x0A\x06active\x18\x03 \x01(\x08\x12+\x0A\x07address\x18\x04 \x01(\x0B2\x1A.testing.data.User.Address\x1A&\x0A\x07Address\x12\x0C\x0A\x04city\x18\x01 \x01(\x09\x12\x0D\x0A\x05state\x18\x02 \x01(\x09\"%\x0A\x04Book\x12\x0D\x0A\x05title\x18\x01 \x01(\x09\x12\x0E\x0A\x06author\x18\x02 \x01(\x09b\x06proto3"
        , true);

        static::$is_initialized = true;
    }
}

